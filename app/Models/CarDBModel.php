<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDBModel extends Model
{
    protected $primaryKey = 'car_id'; //ตัวชี้ column
    protected $table = 'car_db';     //ตัวชี้table
    protected $guarded = ['car_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;

    public function car_status(){
        return $this->belongsTo('App\Models\StatusModel','car_status')
                    ->select(['status_id','car_status']); 
    }

    public function posit_id(){
        return $this->belongsTo('App\Models\PositDBModel','posit_id')
                    ->select([
                        'posit_id',
                        'line',
                        'posit',
                       
                        'sort',
                        'car_status'
                        
                    ]); 
                    
                 
    }
    public function car_where(){
        return $this->belongsTo('App\Models\WhereModel','car_where')
                    ->select(['where_id','car_where']); 
    }

    public function person(){
        return $this->belongsTo('App\Models\User','person')
                    ->select(['id','fullname','lastname']); 
    }

    
}