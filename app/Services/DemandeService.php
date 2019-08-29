<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 *Intefaces des Users
 **/

interface DemandeService {

	public function listdemandes(Request $request);

	public function count();

}
