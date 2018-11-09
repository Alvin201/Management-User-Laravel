<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
class Article extends Model {

    protected $table = 'articles';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'users_id',
        'provinsi_id',
        'city_id',
        'district_id',
    ];
    protected $dates = ['published_at'];

    /**
     * Untuk mendapatkan data users yang berelasi dengan article M to M
     */
    public function user(){
        return $this->belongsTo(User::class, 'users_id'); //->join('User', 'User.id', '=', 'articles.users_id')
    }

    public static  function where_all($id){
        $fields = (['kota.id AS city_id', 'kota.city AS city_name',
                    'provinsi.id AS provinsi_id', 'provinsi.name AS provinsi_name',
                    'articles.id AS id_articles', 'articles.title AS title', 'articles.body AS body',
                    'articles.published_at AS published_at',
                    'kecamatan.id AS district_id', 'kecamatan.kecamatan AS district_name'
                  ]);

         return DB::table('articles')
            ->crossJoin('provinsi', 'provinsi.id', '=', 'articles.provinsi_id')
            ->crossJoin('kota', 'kota.id', '=', 'articles.city_id')
            ->crossJoin('kecamatan', 'kecamatan.id', '=', 'articles.district_id')
            ->where ('articles.id',$id)
            ->select($fields)
            ->get();
    }




}
