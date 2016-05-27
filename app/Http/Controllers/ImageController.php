<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use File;
use App\Model\ImageModel;
use DB;
class ImageController extends Controller
{
    public function index(){ 
    	if(Auth::check()){
    		$allImage=ImageModel::all();
    		return view("adminpanel.add_slide_image")->with('data',$allImage);
    	}else{
    		Redirect::to('login'); 
    	}
    	
    }

    public function Create(Request $request){
    	if(Auth::check()){
    		$allInput=$request->only('file');
            $count=count($allInput['file']);
            //echo $count;die();
    		for($i=0;$i<$count;$i++){
    			$image=$request->file('file');
                $image=$image[$i];
                //echo "<pre>"; print_r($image);die();
    			$path="upload/gellary";
    			$imageName=str_random(6).'_'.$image->getClientOriginalName();
    			$uploadImage=$image->move($path,$imageName);
    			if ($uploadImage) {
    				$data['image']=$imageName;
    				$execution=ImageModel::create($data);
    				if (!empty($execution)) {
    					echo "Data saved";
    				}

    			}
    		}
            return Redirect::to('image_form');

    	}else{
    		return Redirct::to('login');
    	}
    }

    public function Edit($id){
        if(Auth::check())
        {
            $image=DB::table('image')->where('id',$id)->first();

            if (!empty($image)) {
                return view('adminpanel.edit_image',compact('image'));
            }
            return Redirect::to('image_form');
        }else{
            return Redirect::to('login');
        }
    	
    }

    public function Update(Request $request){
        $id=$request->input('id');
        $imagename="";
        $uploadimage="";
        $exist=ImageModel::find($id);
        $image=$request->file('file');
        $path='upload/gellary';
        if($request->hasFile('file')){
            $imagename=str_random(6) . '_' . $image->getClientOriginalName();
            $uploadimage=$image->move($path,$imagename);
        }else{
            $imagename=$exist['image'];
        }
        if($uploadimage)
        {
            File::delete(public_path('upload/gellary').'/'.$exist['image']);
        }
        $updatadata['image']=$imagename;
        $exist->update($updatadata);
        return Redirect::to('image_form')->with('success','Data Updated');

    }

    public function Delete($id){
    	if(Auth::check()){
    		$image=DB::table('image')->where('id',$id)->first();
    		File::delete(public_path('upload/gellary')."/".$image->image);
    		$delete_execution=DB::table('image')->where('id',$id)->delete();
    		if ($delete_execution) {
    			return Redirect::to('image_form')->with('success','Data Deleted Successfully');
    		}
    		return Redirect::to('image_form');
    	}else{
    		return Redirct::to('login');
    	}
    }
}
