<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Role extends Model {

	public $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps  = false;

    protected $fillable = [
        'name_role'
    ];

    public static  function show(){
         return DB::table('roles')
            ->orderBy('roles.id','asc')
            ->select('*')
             ->paginate(10);
    }










}
