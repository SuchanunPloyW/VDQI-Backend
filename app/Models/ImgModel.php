<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgModel extends Model
{
    protected $primaryKey = 'img_id'; //ตัวชี้ column
    protected $table = 'image_db';     //ตัวชี้table
    protected $guarded = ['img_id'];  //post
    public $timestamps = false; // no timestamps
    use HasFactory;
}