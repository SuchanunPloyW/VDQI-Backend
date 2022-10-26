<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositDBModel extends Model
{
    protected $primaryKey = 'posit_id'; //ตัวชี้ column
    protected $table = 'posit_db';     //ตัวชี้table
    protected $guarded = ['posit_id'];  //post
    public $timestamps = false;
    use HasFactory;
    
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }
    
    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    }
    public function car_id(){
        return $this->belongsTo('App\Models\CarModel','car_id')
                    ->select([
                        'car_id' ,
                        'car_chassis',]);          
    }
}