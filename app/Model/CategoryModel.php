<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table="book_categoris";
    protected $primaryKey="id";
    protected $fillable=[
    	'category_name','description','publication_staus'
    ];
}
