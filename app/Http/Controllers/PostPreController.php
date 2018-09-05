<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostPre;

class PostPreController extends Controller
{
    public function getData(){
        $data = PostPre::where('post_type','page')
            ->take(ENV('TAKE_LIMMIT'))->orderBy('id','DESC')->get();
        return view('post_pre',['data' => $data]);


    }


    public function searchPost(Request $request){
        $data = PostPre::where("post_title","LIKE","%{$request->input('query')}%")
            ->take(ENV('TAKE_LIMMIT'))->orderBy('id','DESC')->get();
        return view('post_pre_ejecute',['data' => $data]);
    }


}
