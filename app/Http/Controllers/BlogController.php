<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    public function index(){
      $blog = Blog::all();
      if($blog){
        return response()->json($blog,200);
      }else{
          $response = [ "status" => false];
          return response()->json($response,400);
      }
    }
    public function show($id){
      $blog = Blog::find($id);
      if ($blog) {
         return response()->json($blog,200);
       }else{
         $response = [ "status" => false];
         return response()->json($response,400);
      }
    }
    public function post(Request $request){
      if ($request->has('title','content')) {
          $save = Blog::create($request->all());
          if ($save) {
             $response = [ "status" => true,"data" => $request->all()];
             return response()->json($response,201);
           }else{
             $response = [ "status" => false];
             return response()->json($response,400);
          }
      }else{
        $response = [ "status" => false];
         return response()->json($response,400);
      }
    }
    public function update(Request $request,$id){
      $blog = Blog::find($id);
      $blog->update($request->all());

      if ($blog) {
         $response = [ "status" => true];
         return response()->json($response,201);
       }else{
         $response = [ "status" => false];
         return response()->json($response,400);
      }
    }
    public function delete($id){
       $blog = Blog::destroy($id);
       $response = [ "status" => true];
       return response()->json($response,202);

    }
}
