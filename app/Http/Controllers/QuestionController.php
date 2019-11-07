<?php

namespace App\Http\Controllers;
use App\question;


use Illuminate\Http\Request;

class QuestionController extends Controller
{
 
    public function ask(Request $request)
    {
        

         $table = new question;
         
			$table->UID = $request->input('UID');
			$table->question = $request->input('question');
			$table->vote = 0;

            $table->save();


         return response()->json(['question' => $table]);
         
        
    }


    public function upVote(Request $request)
    {
        
        $table = question::where(['QID'=>$request->input('QID')])->first();

        if($table){
            $table->vote=$table->vote+1;
        $table->save();

        }
        
        


         return response()->json(['question' => $table]);
         
        
    }

    public function downVote(Request $request)
    {
        
        $table = question::where(['QID'=>$request->input('QID')])->first();

        if($table){
            $table->vote=$table->vote-1;
            $table->save();
            return response()->json(['question' => $table]);

        }
         
        return response()->json(['message' => 'Something went wrong']);
        
    }
}
