<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Utils;       //load helper

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');      //jika belum login maka tidak bisa masuk home
    }

    public function index() {

        $laravel = app();
        $curent_version = $laravel::VERSION;      
        //return "Your Laravel version is " . $laravel::VERSION;
        /* You can also browse to and open file 
          vendor\laravel\framework\src\Illuminate\Foundation\Application.php
         */        
        return view('home', compact('curent_version'));
        
    }

}
