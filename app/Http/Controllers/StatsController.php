<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\AccueilService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{

	public function __construct(UserService $userService, AccueilService $accueilService)
	{
        //parent::__construct();
		$this->userService = $userService;
		$this->accueilService = $accueilService;


	}

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
        	$nbusers = $this->userService->countUser();
        	$statsvilles=$this->accueilService->statsParAnnees();

        	return view('backend.stats.index',compact(['nbusers','nbvilles','statsvilles']));
        }
    }
