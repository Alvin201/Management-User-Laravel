<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Article;
use App\Models\Role;
use App\Http\Requests;

use Validator;
use Utils;
use Request;
use Input;
use Image;
use Session;
use DB;
use Excel;



class UsersController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($perPage = 5)
    {
        Request::session()->put('search', Request::has('search') ? Request::get('search') : (Request::session()->has('search') ? Request::session()->get('search') : ''));

         Request::session()->put('pagination_items',  Request::has('pagination_items') ?  Request::get('pagination_items') : (Request::session()->has('pagination_items') ?  Request::session()->get('pagination_items') : -1));


        Request::session()->put('field', Request::has('field') ? Request::get('field') : (Request::session()->has('field') ? Request::session()->get('field') : 'email'));
        
        Request::session()->put('sort', Request::has('sort') ? Request::get('sort') : (Request::session()->has('sort') ? Request::session()->get('sort') : 'asc'));
        
         $users = new User(); 
        if (Request::session()->get('username') != -1)
            $users = User::where('username', 'LIKE', '%' . Request::session()->get('search') . '%')
                            ->orWhere('email', 'LIKE', '%' .Request::session()->get('search') . '%')
                ->orderBy(Request::session()->get('field'), Request::session()->get('sort'))
                ->skip($perPage) //5
                ->take($perPage) //5
                ->paginate(Request::session()->get('pagination_items'));
       
    //     return view('users.index', ['users' => $users]);  

        if (Request::ajax())
            return view('users.index', compact('users'));
        else
           return view('users.index', compact('users'));      
    }


/*---------------------------------------------------------------------------------------*/
    public function create() {
        $judul = 'Add User';
        $role = Role::pluck('name_role','id');
        return view('users.create', compact('role','judul'));
    }

    public function store(Requests\UsersRequest $request) {
        $request['password'] = bcrypt($request['password']);
        $do = new User($request->all());
        $gambar = $request->file('avatar');

        if($gambar != ""){  //jika gambar tidak kosong
        $namaFile = time().'.'.$gambar->getClientOriginalName();
        $request->file('avatar')->move('avatar', $namaFile);
        $do->avatar = $namaFile;

        }else{
        $do->save;
        }

        if($do->save()){
            Session::flash('flash_message', 'User has been created!');
            return redirect('users');
        }
    }
/*---------------------------------------------------------------------------------------*/
    public function show($id) {
        $judul = 'Read User';
        $user = User::findOrFail($id);
        return view('users.show', compact('user','judul'));
    }
/*---------------------------------------------------------------------------------------*/
    public function destroy($id) {
        $user = User::findOrFail($id);

        $file= $user->avatar;
        $filename = public_path().'/avatar/'.$file;
        \File::delete($filename);
        $user->delete();

        Session::flash('flash_message', 'User has been deleted!');
        return redirect('users');
    }

    /*public function destroyAll(){
    $rules = $this->rules_check();
    $validator = Validator::make(Request::all(), $rules);
    $checked = Request::input('checked');

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else {
        User::destroy($checked);
        Session::flash('flash_message', 'User has been deleted!');
        return redirect('users');
        }
    }

    public function rules_check(){
        return [
            'checked' => 'required',
        ];
    }*/

 
/*---------------------------------------------------------------------------------------*/
    public function edit($id) {
        $judul = 'Edit User';
        $user = User::findOrFail($id);
        $role = Role::pluck('name_role','id');
        return view('users.edit', compact('user','role','judul'));
    }


    private function rules_update($users_id) {
        return [
            'username' => 'required|min:3|max:15',
            'email' => 'required|email|max:45|unique:users,email, '.$users_id.',users_id',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $rules = $this->rules_update($user->users_id);
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

            if (Request::hasFile('avatar')){

                $file= $user->avatar;
                $filename = public_path().'/avatar/'.$file;
                \File::delete($filename);

                $file = Request::file('avatar');
                $name   =  time().'.'.$file->getClientOriginalName();
                $user->avatar = $name;
                $file->move(public_path().'/avatar/', $name);

                  $user->username = Request::input('username');
                  $user->email = Request::input('email');
                  $user->role_id = Request::input('role_id');
                  $user->save();
            }else{
                  $user->username = Request::input('username');
                  $user->email = Request::input('email');
                  $user->role_id = Request::input('role_id');
                  $user->save();
            }
        Session::flash('flash_message', 'User has been updated!');
        return redirect('users');

    }
/*---------------------------------------------------------------------------------------*/
    public function reset_password($id) {

        $judul = 'Reset Password User';
        $user = User::findOrFail($id);
        return view('users.reset_password', compact('user','judul'));
    }

    private function rules_password() {
        return [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];
    }

    public function update_password($id) {
        $user = User::findOrFail($id);
        $rules = $this->rules_password();
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else {
           $password = bcrypt(Request::get('password'));
           $user->update(['password' => $password]);

           Session::flash('flash_message', 'Password has been reseted!');
           return redirect('users');

        }
    }

/*---------------------------------------------------------------------------------------*/
    public function users_article($id) {
        $judul = 'User Article';
        $users = User::findOrFail($id);
        $articles = User::havearticle($id);
        return view('users.detail', compact('articles','users','judul'));
    }

/*------------------------------------------------------------------------------*/
      public function downloadExcel($type){
          $data = User::get()->toArray();
          return Excel::create('user', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
                {
              $sheet->fromArray($data);
                });
          })->download($type);
      }

      public function importExcel(){
            if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();

            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                $insert[] = ['users_id' => $value->users_id, 'username' => $value->username,'email' => $value->email,
                             'password' => $value->password, 'remember_token' => $value->remember_token,
                             'created_at' => $value->created_at, 'updated_at' => $value->updated_at,
                             'role_id' => $value->role_id, 'avatar' => $value->avatar
                            ];
                      }
                if(!empty($insert)){
                    DB::table('users')->insert($insert);
                    Session::flash('flash_message', 'Import Success!');
                }
              }
            }
            Session::flash('error_message', 'Please Upload File Database');
            return redirect('users');
          }


}
