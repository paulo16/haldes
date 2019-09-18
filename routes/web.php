<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use App\Demande;
use Illuminate\Support\Carbon;

Route::get('crontest/', function () {
    $users = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
    ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
    ->select('personnes.id', 'personnes.nom', 'users.email')
    ->where('demandes.created_at', '>', Carbon::now()->subMinutes(2))
    ->get();
    return $users;
});

Route::get('lang/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('frontend.home');
})->name('accueil');

Auth::routes();

Route::get('contact/index', 'ContactController@index')->name('contact.index');

Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    Route::get('profil/index', 'ProfilController@index')->name('profil.index');
    Route::get('profil/{id}/edit', 'ProfilController@edit')->name('profil.edit');
    Route::post('profil/update/{id}', 'ProfilController@update')->name('profil.update');
});

Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    Route::resource('halde', 'HaldeController');

    Route::get('demande/lastdemandemois', 'DemandeController@lastdemande')->name('demandes.lastdemandemois');
    Route::get('demande/infodemandeur', 'DemandeController@infodemandeur')->name('demandes.infodemandeur');

    Route::post('demande/annuler/{id}', 'DemandeController@annuler')->name('demandes.annuler');
    Route::get('demande/datahaldes-frontend', 'DemandeController@datahaldesfrontend')->name('demandes.datahaldesfrontend');
    Route::get('demande/datademandes-frontend', 'DemandeController@datademandes')->name('demandes.datademandes');
    Route::get('pdf/engagement-pdf/{id}', 'DemandeController@pdfengagement')->name('engagement-pdf');
    Route::get('pdf/pieces-pdf/{id}', 'DemandeController@pdfpieces')->name('pieces-pdf');
    Route::resource('demande', 'DemandeController');
});

Route::get('/test-email', function () {
    Notification::route('mail', 'polo-55f80e@inbox.mailtrap.io')->notify(new VerifyEmail());
    return 'Sent';
});
//gestion-utilisateurs
Route::get('users/dashboard', 'AdminController@index')->middleware(['web', 'auth'])->name('ADMIN');

Route::group(['prefix' => 'gestion-utilisateurs', 'middleware' => ['web', 'auth']], function () {
    //Route::get('dashboard"', 'AdminController@index')->name('ADMIN');
    Route::post('users/delete/{id}', 'UserController@delete')->name('users.delete');
    Route::get('users/data', 'UserController@data')->name('users.data');
    Route::resource('users', 'UserController');
});


Route::group(['prefix' => 'haldes', 'middleware' => ['web', 'auth', 'verified']], function () {
    //Haldes
    Route::post('haldes/delete/{id}', 'HaldeController@delete')->name('haldes.delete');
    Route::get('haldes/data', 'HaldeController@datahaldesbackend')->name('haldes.data');
    Route::get('haldes/datahistorique/{id}', 'HaldeController@datahistorique')->name('haldes.datahistorique');
    Route::resource('haldes', 'HaldeController');
});


Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    //substance
    Route::post('substanceexploitees/delete/{id}', 'SubstanceexploiteeController@delete')->name('substanceexploitees.delete');
    Route::get('substanceexploitees/data', 'SubstanceexploiteeController@data')->name('substanceexploitees.data');
    Route::resource('substanceexploitees', 'SubstanceexploiteeController');
});

Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    //Import Excel
    Route::get('excel/importExport', 'ExcelcsvController@importExport')->name('importexcel.show');
    Route::get('excel/downloadExcel/{type}', 'ExcelcsvController@downloadExcel')->name('importexcel.download');
    Route::post('excel/importExcel', 'ExcelcsvController@importExcel')->name('importexcel.import');
});


Route::group(['middleware' => ['web', 'auth', 'verified']], function () {
    //Import Excel
    Route::get('groupes/{id}/edit', 'GroupeController@edit')->name('groupes.edit');
    Route::post('groupes/update/{id}', 'GroupeController@update')->name('groupes.update');
    Route::get('groupes/list', 'GroupeController@index')->name('groupes.index');
    Route::post('groupes/delete/{id}', 'GroupeController@delete')->name('groupes.delete');
    Route::get('groupes/data', 'GroupeController@data')->name('groupes.data');
    Route::post('groupes/publier/{id}', 'GroupeController@publier')->name('groupes.publier');
});
