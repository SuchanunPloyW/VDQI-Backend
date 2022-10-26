<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryModel extends Model
{
    protected $primaryKey = 'his_id'; //ตัวชี้ column
    protected $table = 'history_db';     //ตัวชี้table
    protected $guarded = ['his_id'];  //post
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
    
}