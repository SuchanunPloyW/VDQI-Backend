<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    protected $primaryKey = 'position_id'; //ตัวชี้ column
    protected $table = 'position';     //ตัวชี้table
    protected $guarded = ['position_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;

    /* public function where(){

        return $this->hasOne(Where::class,'where_id','car_where');

    } */
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }
   
}
