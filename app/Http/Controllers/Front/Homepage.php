<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Post;

class Homepage extends Controller
{
    public function index(){


        $data['posts'] =Post::orderBy('created_at','DESC')->get();
        //print_r(Post::all()); die;

        $data['categories'] = Category::inRandomOrder()->get();
        //print_r(Category::all()); die;
        return view('frontend.homepage',$data);
    }

    public function create_post(){

        return view('home.create_post');
    }

    public function user_post(Request $request){


        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'post_category' => 'required',
        ],[
            'title.required' => 'Başlık alanı zorunlu!',
            'content.required' => 'İçerik alanı zorunlu!',
            'post_category.required' => 'Kategori alanı zorunlu!',
        ]);



        $post = new Post();
        $post->title = $request->title;
        $image = $request->image;
        $post->content = $request->content;
        $post->category_id=$request->post_category;

         if($image){
             $imagename = time().'.'.$image->getClientOriginalExtension();
             $request->image->move('postimage', $imagename);
             $post->image=$imagename;
         }
        $post->save();


        return redirect()->back()->with('success','Post ekleme işlemi başarılı!');
    }
}
