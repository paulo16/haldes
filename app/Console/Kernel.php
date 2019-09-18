<?php

namespace App\Console;

use App\Demande;
use App\Mail\EtatDemande;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$filePath= "/usr/local/ampps/www/haldesapps/log_cron.txt";
        //une fois l'application mis en place veuillez remplacer cette partie
        //dans le code plus bas
        //$demandes = Demande::where('created_at', '=', Carbon::now()->subDays(10))
        $schedule->call(function () {
            $users = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
                ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->select('personnes.id', 'personnes.nom', 'users.email')
                ->where('demandes.created_at', '>', Carbon::now()->subMinutes(2))
                ->get();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new EtatDemande);
                
            }
        })->when(function () {
            //$demandes = Demande::where('created_at', '=', Carbon::now()->subDays(10))
            $demandes = Demande::where('created_at', '>', Carbon::now()->subMinutes(2))
                ->get();
            if ($demandes) {
                return true;
            } else {
                return false;
            }
        })->everyFiveMinutes();


        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
