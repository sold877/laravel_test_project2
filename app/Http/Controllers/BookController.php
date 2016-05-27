<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\CategoryModel;
use App\Model\BookModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use File;
class BookController extends Controller 
{
	public function index() 
	{
        if (Auth::check()) {
           $allBook=BookModel::all();
           $category=CategoryModel::all();
		  return view('adminpanel.view_book',compact('category'))->with('data',$allBook);
        }
        return Redirect::to('login');
	}

    public function create()
    {
        if (Auth::check()) {
            $category=DB::table('book_categoris')->where('publication_staus',1)->get();
    	   return view('adminpanel.add_book',compact('category'));
        }
        return Redirect::to('login');
    }

    public function store(Request $request)
    {
        //echo '<pre>';print_r($request->all());die();
        if (Auth::check()) {
            $data=$request->all();
    	   $validation=Validator::make($request->all(),[ 
                    'book_name'=>'required|max:100|min:2',
                    'publication_status'=>'required|numeric',
                    'book_category_id'=>'required|numeric',
                    'book_description'=>'required',
                    'book_writter'=>'required|max:100|min:2',
                    'book_edition'=>'required|max:100|min:2',
                    'book_publisher'=>'required|max:100|min:2',
                    'book_quantity'=>'required|numeric',
                    'book_image'=>'required|mimes:jpeg,jpg,png,gif|required|max:1000',
                    'book_pdf'=>'required|mimes:pdf|required|max:2000'
                ]
            );
           if($validation->fails()){
                return Redirect::to('book_form')->withErrors($validation);
                //$category=DB::table('book_categoris')->where('publication_staus',1)->get();
                //return view('adminpanel.add_book',compact('category'))->withErrors($validation);
           }else{
                $image=$request->file('book_image');
                $pdf=$request->file('book_pdf');
                $path='upload/logo';
                $imagename=str_random(6) . '_' . $image->getClientOriginalName();
                $uploadimage=$image->move($path,$imagename);
                $pdfname=str_random(6) . '_' . $pdf->getClientOriginalName();
                $uploadpdf=$pdf->move($path,$pdfname);
                if($uploadimage && $uploadpdf)
                {
                    $data['book_image']=$imagename;
                    $data['book_pdf']=$pdfname;
                    BookModel::create($data);
                }
               
               return Redirect::to('book_form')->with('success','data saved'); 
           }
        }
        return Redirect::to('login');
    }

    public function edit($id)
    {
        if(Auth::check()){
            // $book_by_id=DB::table("book")->select('book.*','book_categoris.category_name')
            // ->join('book_categoris','book_categoris.id','=','book.book_category_id')
            // ->where('book.id',$id)->get();
            $book_by_id=DB::table('book')->where('id',$id)->first();
             //$category=CategoryModel::all();
             $category = CategoryModel::lists('category_name', 'id');
            if(!empty($book_by_id)){
                return view('adminpanel.edit_book',compact('category'))->with('data',$book_by_id);
            }else{
               return Redirect::to('book_view')->with('errormessage','No data Available');
            }

        }else{
           return  Rediredt::to('login');
        }
    }

    public function update(Request $request){
        if(Auth::check())
        {
                    $id=$request->input('id');
                    $data=$request->all();
                    //$data=BookModel::find($id);
                    //echo '<pre>';print_r($data['book_image']);die();
                    $validation=Validator::make($data,[ 
                    'book_name'=>'required|max:100|min:2',
                    'publication_status'=>'required|numeric',
                    'book_category_id'=>'required|numeric',
                    'book_description'=>'required',
                    'book_writter'=>'required|max:100|min:2',
                    'book_edition'=>'required|max:100|min:2',
                    'book_publisher'=>'required|max:100|min:2',
                    'book_quantity'=>'required|numeric',
                ]);
                    if ($validation->fails()) {
                        return Redirect::to('edit_book/'.$id)->withErrors($validation);
                        //return redirect()->back()->withErrors($validation)->with('id',$id);
                    }else{
                        $imagename="";
                        $uploadimage="";
                        $pdfname="";
                        $uploadpdf="";
                        $exist=BookModel::find($id);
                        $image=$request->file('book_image');
                        $pdf=$request->file('book_pdf');
                        $path='upload/logo';
                        if($request->hasFile('book_image')){
                            $fileValidation=Validator::make(['book_image'=>$image],[
                                'book_image'=>'required|mimes:jpeg,jpg,png,gif|max:1000'
                            ]);
                            if ($fileValidation->fails()) {
                                return Redirect::to('edit_book/'.$id)->withErrors($fileValidation);
                            }
                            $imagename=str_random(6) . '_' . $image->getClientOriginalName();
                            $uploadimage=$image->move($path,$imagename);
                        }else{
                            $imagename=$exist['book_image'];
                        }
                         if($request->hasFile('book_pdf')){
                            $fileValidation=Validator::make(['book_pdf'=>$pdf],[
                                'book_pdf'=>'required|mimes:pdf|max:2000'
                            ]);
                            if ($fileValidation->fails()) {
                                return Redirect::to('edit_book/'.$id)->withErrors($fileValidation);
                            }
                            $pdfname=str_random(6) . '_' . $pdf->getClientOriginalName();
                            $uploadpdf=$pdf->move($path,$pdfname);
                        }else{
                            $pdfname=$exist['book_pdf'] ;
                        }
                        
                        if($uploadimage)
                        {
                            File::delete(public_path('upload/logo').'/'.$exist['book_image']);
                        }
                        if($uploadpdf){
                            File::delete(public_path('upload/logo').'/'.$exist['book_pdf']);
                        }
                        $updatadata=$request->only('book_name','publication_status','book_category_id','book_description','book_writter','book_edition','book_publisher','book_quantity');
                        $updatadata['book_pdf']=$pdfname;
                        $updatadata['book_image']=$imagename;
                        $exist->update($updatadata);
                       return Redirect::to('book_view')->with('success','data saved');
                    }
        }else{
           return Redirect::to('login');
        }
       
    }

    public function delete($id)
    {
        if (Auth::check()) {
            if (!empty($id)) {
                $data=BookModel::find($id);
                File::delete(public_path('upload/logo').'/'.$data['book_image']);
                File::delete(public_path('upload/logo').'/'.$data['book_pdf']);
                $data->delete();
                return Redirect::to('book_view')->with('success','Data Successfully Deleted');
            }else{
                return Redirect::to('book_view')->with('errormessage',"Id Is not valid");
            }
        }else{
            return Redirect::to('login');
        }
    }
}
