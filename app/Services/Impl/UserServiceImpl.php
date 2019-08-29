<?php

namespace App\Services\Impl;

use App\User;
use App\Personne;
use App\Services\UserService;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Jenssegers\Date\Date;

class UserServiceImpl implements UserService
{

	public function listusers(Request $request)
	{
		$columns = array(
			0 => 'id',
			1 => 'nom',
			3 => 'email',
			4 => 'role',
			6 => 'created_at',
			7 => 'action',
		);

		$totalData = User::count();

		$totalFiltered = $totalData;

		$limit = $request->input('length');
		$start = $request->input('start');
		$order = $columns[$request->input('order.0.column')];
		$dir = $request->input('order.0.dir');

		if (empty($request->input('search.value'))) {

			$users = User::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
				->join('roles', 'roles.id', '=', 'role_user.role_id')
				->select(
					'users.id as id',
					'users.name as nom',
					'users.email as email',
					'users.created_at as created_at',
					'roles.name as role'
				)
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();
		} else {
			$search = $request->input('search.value');

			$users = User::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
				->join('roles', 'roles.id', '=', 'role_user.role_id')
				->select(
					'users.id as id',
					'users.name as nom',
					'users.email as email',
					'users.created_at as created_at',
					'roles.name as role'
				)
				->where('users.name', 'LIKE', "%{$search}%")
				->orWhere('users.email', 'LIKE', "%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->get();

			$totalFiltered = User::leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
				->join('roles', 'roles.id', '=', 'role_user.role_id')
				->select(
					'users.id as id',
					'users.name as nom',
					'users.email as email',
					'users.created_at as created_at',
					'roles.name as role'
				)
				->where('users.name', 'LIKE', "%{$search}%")
				->orWhere('users.email', 'LIKE', "%{$search}%")
				->offset($start)
				->limit($limit)
				->orderBy($order, $dir)
				->count();
		}

		$data = array();
		if (!empty($users)) {

			$url = '<a href=":url" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Editer</a>';
			$delete = '<a data-id=":id" class="btn btn-xs btn-danger btn-primary delete"><i class="glyphicon glyphicon-remove"></i>sup</a>';
			foreach ($users as $user) {
				$show = route('users.show', $user->id);
				$edit = route('users.edit', $user->id);
				$del = str_replace(":id", $user->id, $delete);

				$nestedData['id'] = $user->id;
				$nestedData['nom'] = "<a href='{$show}' title='SHOW' >" . $user->nom . "</a>";
				$nestedData['email'] = "<a href='{$show}' title='SHOW' >" . $user->email . "</a>";
				$nestedData['role'] = $user->role;
				$date = new Date($user->created_at);
				$nestedData['created_at'] = $date->format('l j F Y H:i:s');

				$nestedData['action'] = str_replace(":url", $edit, $url) . '&nbsp;' . $del;

				$data[] = $nestedData;
			}
		}

		$json_data = array(
			"draw" => intval($request->input('draw')),
			"recordsTotal" => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data" => $data,
		);

		return $json_data;
	}

	public function update(Request $request, $id)
	{

		//Debugbar::info($request);
		$user = User::find($id);
		$user->name = $request->get('nom') ? $request->get('nom') : '';
		$user->email = $request->get('email') ? $request->get('email') : '';
		$user->password = $request->get('password') ? bcrypt($request->get('password')) : '';

		if ($request->get('role')) {
			$user->roles()->sync($request->get('role'));
		}

		return $user->save();
	}

	public function store(Request $request)
	{
		$datenow      = new \DateTime();
		$user = new User();
		$user->name = $request->get('nom') ? $request->get('nom') : '';
		$user->email = $request->get('email') ? $request->get('email') : '';
		$user->email_verified_at = $datenow;

		$user->password = $request->get('password') ? bcrypt($request->get('password')) : '';
		if ($user->save()) {
			$user->roles()->sync($request->get('role'));
			$personne = Personne::create([
				'nom'            => $user->name,
				'prenom'         => "----",
				'adresse'        => "----",
				'telephone_fixe' => "----",
				'mobile'         => "----",
				'cin'            => "----",
				'user_id'        => $user->id,
			]);
		}

		return $user;
	}

	public function find($id)
	{
		$user = User::find($id);

		return $user;
	}

	public function delete($id)
	{
		$user = User::find($id);
		return $user->delete();
	}

	/**
	 * @return int
	 */

	public function count()
	{
		return User::count();
	}
}
