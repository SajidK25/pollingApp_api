<?php

namespace App\Http\Controllers;
use App\Poll;
use Illuminate\Http\Request;

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
}
