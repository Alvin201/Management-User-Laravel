<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Notifiable;
use DB;
use Input;

class User extends Authenticatable {

    public $table = 'users';
    protected $primaryKey = 'users_id';
    public $timestamps  = true;

    protected $fillable = [
        'username', 'email', 'password','role_id','avatar',
    ];

    protected $hidden = [
       'password', 'remember_token',
    ];


    /**
     * Untuk mendapatkan data role yang berelasi dengan user M to M
     */
    public function role(){
        return $this->belongsTo(Role::class, 'role_id'); //->join('roles', 'roles.id', '=', 'users.role_id')
    }

    public static  function havearticle($id){
         return DB::table('users')
            ->crossJoin('articles', 'articles.users_id', '=', 'users.users_id')
            ->where ('users.users_id',$id)
            ->select('*')
            ->paginate(10);
    }

}
