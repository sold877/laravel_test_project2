<?php

namespace App\Http\Controllers\Userpanel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class MainContentController extends Controller
{
    public function index(){
    	$allBook=DB::table('book')->get();
    	return view('userpanel.maincontent')->with('data',$allBook); 
    } 

    public function book_details($id)
    {
    	$bookById=DB::table('book')->where('id',$id)->where('publication_status',1)->first();
    	return view('userpanel.book_details')->with('data',$bookById);
    }

    public function read_book($id){
        $bookById=DB::table('book')->where('id',$id)->where('publication_status',1)->first();
        return view('userpanel.book_read',compact('bookById'));

    }

    public function download_book($id){
         $bookById=DB::table('book')->where('id',$id)->where('publication_status',1)->first();
        $file_path = public_path('upload/logo').'/'.$bookById->book_pdf;
        return response()->download($file_path);
    }
}
