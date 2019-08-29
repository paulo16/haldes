<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function __construct(UserService $userService) {
		$this->middleware('web');
		$this->middleware('auth');

		$this->userService = $userService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('backend.users.list');
	}

	public function data(Request $request) {
		return $this->userService->listusers($request);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$roles = Role::select()->orderBy('name', 'asc') ->get() ->toArray();
        //dd($pays);

		return view('backend.users.add',compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$this->validate($request, [
			'nom' => 'required',
			'email' => 'email|unique:users',
			'password' => 'required|confirmed',
			'password_confirmation'=>'required',
			'role' => 'required'
		]);

		return $this->userService->store($request)? redirect()->route('users.index'): redirect()->route('users.create');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function show($id) {
		$user = $this->userService->find($id);
		$roles=$user->roles->pluck('name')->toArray();
		$role= $roles? $roles[0] :"";


		return view('backend.users.profil', compact(['user', 'role']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$user= $this->userService->find($id);
		$roles = Role::select()->orderBy('name', 'asc') ->get() ->toArray();
        //dd($pays);

		return view('backend.users.edit',compact('user','roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//dd($request);
		$this->validate($request, [
			'nom' => 'required',
			'email' => 'email|unique:users',
			'password' => 'required|confirmed',
			'password_confirmation'=>'required',
			'role' => 'required',
		]);

		if($this->userService->update($request, $id)) {
			return redirect(route('users.show',$id));
		}
		return redirect()->back();
	}

	/**
     * Show the form for editing the specified resource.
     *     
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

	public function delete(Request $request,$id)
	{
		return  response()->json($this->destroy($id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		return $this->userService->delete($id);
	}

}
