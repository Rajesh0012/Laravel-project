<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\mymodel;
use Session;
class mycontroller extends Controller
{
   function index(){

return view('myview');
   }
   function insert(Request $request)
   {

    $mymodel=new mymodel();
    $mymodel->name=$request->name1;
    $mymodel->email=$request->email;
    $mymodel->phone=$request->phone;
    $mymodel->date_created=date('Y-m-d h:i:s');
    $mymodel->save();
       Session::flash('success', 'Thank You For submit!');

     return  redirect('controller');
   }
}
