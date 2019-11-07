<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class userController extends Controller
{
    //


    public function getAll(){

        $user=User::all();
        return response()->json(['users'=>$user],200);

     }
}
