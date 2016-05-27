<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    protected $table="image";
    protected $primaryKey="id";
    protected $fillable=[
    	'image'
    ]; 
}
