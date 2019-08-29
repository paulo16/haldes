<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AccueilService;
use App\Services\UserService;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 */
class AdminController extends Controller {

	public function __construct(UserService $userService, AccueilService $accueilService) {
		//parent::__construct();
		$this->userService = $userService;
		$this->accueilService = $accueilService;

	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		$users = $this->userService->count();
		return view('backend.index', compact(['users', 'etudiants',
			'etablissements', 'filieres', 'statsvilles']));
	}

}
