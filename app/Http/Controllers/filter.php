<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filter extends Controller
{
   public function inputdata($data = ''){


       foreach ($data as $key=>$values){

           $data[$key] = filter_var(str_replace('()','',trim($values)),FILTER_SANITIZE_STRING);
       }

       return $data;
   }
}
