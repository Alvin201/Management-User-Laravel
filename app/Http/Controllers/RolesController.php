<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Role;   
use Request;
use DB; 
use App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Session;

class RolesController extends Controller {
 
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $judul = 'Manage Roles';
        $roles = Role::show();
        return view('roles.index', compact('roles','judul'));
    }

    public function create() {
        $judul = 'Add Roles';
        return view('roles.create', compact('judul'));
    }

       public function store(Requests\RoleRequest $request) {
        Role::create($request->all());
        Session::flash('flash_message', 'Roles has been created!');
        return redirect('roles');
    }

    public function edit($id) {
        $judul = 'Edit Roles';
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role','judul'));
    }

    public function update($id, Requests\RoleRequest $request) {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        Session::flash('flash_message', 'Roles has been updated!');
        return redirect('roles');
    }

    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        Session::flash('flash_message', 'Roles has been deleted!');
        return redirect('roles');
    }

}
