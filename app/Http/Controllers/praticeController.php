<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use App\mymodel;
use App\filter;
use Session;
class praticeController extends Controller
{
    public function filterdata($data = ''){


        foreach ($data as $key=>$values){

            $data[$key] = filter_var(str_replace('()','',trim($values)),FILTER_SANITIZE_STRING);
        }

        return $data;
    }

    public function add(Request $request){


        $input = $request->input();

        $data = $this->filterdata($input);
        $file=$request->file('img');

        $destinationPath = 'images';

        if($data){
            $dbModel = new mymodel();
            $dbModel->image = 'http://localhost/laravel/images/'.$file->getClientOriginalName();
            $dbModel->name = $data['name'];
            $dbModel->email = $data['email'];
            $dbModel->phone = $data['phone'];
            $dbModel->date_created = date('Y-m-d h:i:s');
            $file->move($destinationPath,$file->getClientOriginalName());
            $dbModel->save();
        }
        return view('myview');

    }

    public function getdata(){

       // $data['list'] = mymodel::all();
        $data['list'] = DB::table('mymodels')->paginate(8);

        return view('listing',$data);
    }

    public function update(Request $req)
    { $data = [];
        $id = $req->input('id');
        if(!empty($id)){
            $data['edit'] = DB::table('mymodels')->where('id',$id)->first();
            if(count($data['edit'])<1){
                return  redirect('list');
            }
        }else{

        }
        if($req->input('submit')){

            DB::table('mymodels')->where('id',$id)
            ->update(['name'=>trim($req->input('name')),
                'email'=>trim($req->input('email')),
                'phone'=>trim($req->input('phone')),
                'updated_date'=>date('Y-m-d h:i:s')
                ]);

            Session::flash('updation_success',trans('message.updated'));
            return redirect('list');
        }

        return view('myview',$data);

    }

    public function delete(Request $req){
        if($req->ajax()){

            $id = $req->input('id');
            DB::table('mymodels')->where('id',$id)->delete();
            echo 'deleted';
        }else{

            return FALSE;
        }


    }

}
