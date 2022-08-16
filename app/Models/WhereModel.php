<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhereModel extends Model
{
    protected $primaryKey = 'where_id'; //ตัวชี้ column
    protected $table = 'where';     //ตัวชี้table
    protected $guarded = ['where_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}
