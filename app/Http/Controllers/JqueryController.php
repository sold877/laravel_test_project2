<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\CategoryModel;


class JqueryController extends Controller
{
    public function index(){
    	return view('JqueryTesting.add_book_category');
    }

    public function save(Request $request){
    	 print_r($request->all());die();
    }

    public function take(){
    	//$postId=Input::all();
    	//echo $postId['id'];
    	echo "hi";
    }
} 
