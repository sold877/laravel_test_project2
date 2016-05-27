<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CategoryModel;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class CategoryController extends Controller
{
	public function index()  
	{
        if (Auth::check()) {
            $result=DB::table('book_categoris')->get();
            return view("adminpanel.view_category")->with('data',$result);
        }
        return Redirect::to('login');
		
	}

    public function create()
    {
        if (Auth::check()) {
    	   return view('adminpanel.add_book_category');
        }
        return Redirect::to('login');
    }

    public function store(Request $request) 
    {
        if (Auth::check()) {
    	     //$data1=$request->all();
           $data= [
                    'category_name'=>$request->input('category_name'),
                    'description'=>$request->input('description'),
                    'publication_staus'=>$request->input('publication_staus')
                ];
                //echo '<pre>';print_r($data);die();
            $validation=Validator::make($data,array( 
                    'category_name'=>'required|min:2|max:50',
                    'description'=>'required',
                    'publication_staus'=>'required|numeric'
                ));
            if($validation->fails())
            {
                return Redirect::to('category_form')->withErrors($validation);
                //return view('adminpanel.add_book_category')->withErrors($validation);
            }else{
                //DB::table('book_categoris')->insert($data);
                CategoryModel::create($data);
                \Session::flash('success','Data Saved Successfully');
                return Redirect::to('category_form');
            }
        }
        return Redirect::to('login');
    }

    public function edit($id)
    {
        if(Auth::check()){
            //$data=CategoryModel::find($id);  // it works
            $data=DB::table("book_categoris")->where('id',$id)->first();
            if(!empty($data))
            {
                return view('adminpanel.edit_category',compact('data'));
            }
        }else{
            return Redirect::to('login');
        }
    }

    public function update(Request $request){
        if (Auth::check()) {
            $data= [
                    'category_name'=>$request->input('category_name'),
                    'description'=>$request->input('description'),
                    'publication_staus'=>$request->input('publication_staus')
                ];
            $id=$request->input('id');
            $validation=Validator::make($request->all(),
                [
                    'category_name'=>'required|min:2|max:50',
                    'description'=>'required',
                    'publication_staus'=>'required|numeric'
                ]
                );
            if($validation->fails())
            {
                return redirect()->back()->withErrors($validation)->with('id', $id);
            }else{
                //--------------it work ----------------------
                /*$datax=CategoryModel::find($id);
                $datax->update($data);*/
                DB::table('book_categoris')->where('id',$id)->update($data);
                return Redirect::to('category_view')->with('success','Data update Successfully');
            }
        }else{
            return Redirect::to('login');
        }
    }

    public function delete($id){
        if (Auth::check()) {
            $result=DB::table('book_categoris')->where('id',$id)->delete();
            if(!empty($result)){
                \Session::flash('success','Data deleted');
            }
            return Redirect::to('category_view');
        }else{
            return Redirect::to('login');
        }
    }
}
