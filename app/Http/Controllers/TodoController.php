<?php

namespace App\Http\Controllers;

use App\Http\Lib\AjaxResponse;
use App\Todo;
use Illuminate\Http\Request;
use JWTAuth;

class TodoController extends Controller
{
    public function index(Request $request){
        $rsp = new AjaxResponse();

        try{
            $user = JWTAuth::parseToken()->authenticate();
            $todoList = Todo::where('user_id', '=', $user->id)->get();

            return $this->successResponse($todoList);

        }catch(\Exception $e){
            return $this->errorResponse(500, $e->getMessage());
        }
    }

    public function store(Request $request){

        $user = JWTAuth::parseToken()->authenticate();
        $user or die('invalid user');

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->user_id = $user->id;
        $todo->date = $request->date;
        $todo->type = $request->type;

        $todo->save();

        return $this->successResponse($todo);
    }
}
