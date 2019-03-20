<?php

namespace App\Http\Controllers;
use App\Poll;
use Illuminate\Http\Request;
use Validator;

class PollController extends Controller
{
    public function index(){
        $polls=Poll::get();
        return response()->json($polls,200);
    }
    public function show($id){
        $poll=Poll::find($id);
        if(is_null($poll)){
            return response()->json($poll,404);
        }
        return response()->json($poll,200);
    }
    public function store(Request $req){
        $rules=[
            'title'=>'required|max:10'
        ];
        $validator=Validator::make($req->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $poll=Poll::create($req->all());
        return response()->json($poll,201);
    }
    public function update(Request $req,Poll $poll){
        $poll->update($req->all());
        return response()->json($poll,200);
    }
    public function destroy(Request $req,Poll $poll){
        $poll->delete();
        return response()->json(null,204);
    }
    public function errors(){
        return response()->json(['payment required'],501);
    }
}
