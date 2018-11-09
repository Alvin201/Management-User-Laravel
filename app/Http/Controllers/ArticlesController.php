<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Request;
use DB;
use App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Session;
use Auth;

class ArticlesController extends Controller {

    public function __construct() {
        //$this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
        //$this->middleware('auth', ['except' => ['index']]);
        $this->middleware('auth');
    }

    public function index() {

        $judul = 'Manage Article';
        $articles = Article::orderBy('published_at','desc')->paginate(10);
        return view('articles.index', compact('articles','judul'));
    }

    public function create() {
        $judul = 'Add Article';
        $provinsi = DB::table("provinsi")->pluck("name","id");
        return view('articles.create', compact('provinsi','judul'));
    }


    public function store(Requests\ArticleRequest $request) {

        $request['users_id'] = Auth::id();
        Article::create($request->all());

        Session::flash('flash_message', 'Article has been created!');
        return redirect('articles');
    }

    public function edit($id) {
        $judul = 'Edit Article';
        $article = Article::where_all($id);

        $provinsi = DB::table("provinsi")->pluck("name","id");
        return view('articles.edit', compact('article','provinsi','judul'));
    }

    public function update($id, Requests\ArticleRequest $request) {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        Session::flash('flash_message', 'Article has been updated!');

        return redirect('articles');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        Session::flash('flash_message', 'Article has been deleted!');
        return redirect('articles');
    }

    public function show($id) {
        $judul = 'Read Article';
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article','judul'));
    }

    public function myformAjax($id){
        $cities = DB::table("kota")
                    ->where("province_id",$id)
                    ->pluck("city","id");
        return json_encode($cities);
    }

    public function myformAjaxKecamatan($id){
        $district = DB::table("kecamatan")
                    ->where("city_id",$id)
                    ->pluck("kecamatan","id");
        return json_encode($district);
    }

}
