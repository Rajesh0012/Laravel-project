<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mymodel;
use App\filter;

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

        if($data){
            $dbModel = new mymodel();
            $dbModel->name = $data['name'];
            $dbModel->email = $data['email'];
            $dbModel->phone = $data['phone'];
            $dbModel->date_created = date('Y-m-d h:i:s');
            $dbModel->save();
        }
        return view('myview');

    }


}
