<?php

namespace App\Http\Controllers;
use App\Events\CommentAdded;
use Auth;

use Illuminate\Http\Request;
use App\answer;
use App\User;


class AnswerController extends Controller
{
    //
    public function answer(Request $request)
    {
        

         $table = new answer;
			$table->UID = $request->input('UID');
         
			$table->QID = $request->input('QID');
			$table->answer = $request->input('answer');
			$table->votes = 0;

            $table->save();

         //   $user=auth()->user();


            event(new CommentAdded($request->input('answer'),$user));


         return response()->json(['answer' => $table]);
         
        
    }

    public function getAnswers(Request $request)
    {
        
        $table = answer::where(['QID'=>$request->input('QID')])->get();
         return response()->json(['answers' => $table]);
         
        
    }
}
