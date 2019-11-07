<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('getUser', 'userController@getAll');

Route::post('/register', 'userController@register');

Route::post('/login', 'userController@login');
Route::post('/ask', 'QuestionController@ask');
Route::post('/upVote', 'QuestionController@upVote');
Route::post('/downVote', 'QuestionController@downVote');
Route::post('/getQuestions', 'QuestionController@getAll');
Route::post('/answer', 'AnswerController@answer');
Route::post('/getAnswers', 'AnswerController@getAnswers');