<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
	protected $table="book";
	protected $primaryKey="id";
    protected $fillable=array('book_category_id' ,'book_name','book_description','book_writter',
    			'book_edition','book_publisher','book_quantity','book_pdf','book_image',
    			'publication_status');
}
