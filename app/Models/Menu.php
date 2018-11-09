<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model {

	public $table = 'menu';
    protected $primaryKey = 'id';
    public $timestamps  = false;

    protected $fillable = [
        'parent_id', 'nama', 'icon', 'url','segment',
    ];

   
    public function parent()
  {
    return $this->belongsTo('App\Models\Menu', 'parent_id');
  }

  public function children()
  {
    return $this->hasMany('App\Models\Menu', 'parent_id');
  }
    
    





    

}
