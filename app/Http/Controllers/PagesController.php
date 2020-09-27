<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Post;
use App\User;

use App\Role;
use App\Like;

use DB;
class PagesController extends Controller
{
    public function posts(){
        $posts = Post::all();
        return view ('content.posts',compact('posts'));
    }

    public function post(Post $post){
        // $post = DB::table('posts')->find($id);
        return view ('content.post',compact('post'));
    }

    public function store(Request $request){

        $this->validate(request(),

        [
            'title   '=> 'required',
            'body    '=> 'required',
            'url     '=> 'image|mimes:jpg,jpeg,gif,png|max:2048'
        ]

        );

        $img_name = time() . '.' .$request->url->getClientOriginalExtension();
        $post = new Post();
        $post ->title = request ('title');
        $post ->body = request ('body');
        $post ->url =  $img_name;

        $post -> save();


        $request ->url ->move(public_path('uploades'),$img_name);
        return redirect('/posts');



    }


    public function category($name){

        $cat   = DB::table('categories')->where('name' , $name)->value('id');
        $posts = DB::table('posts')->where('category_id' , $cat)->get();
        return view ('content.category',compact('posts'));
    }


    public function admin(){
        $users = User::all();
        return view('content.admin',compact('users'));
    }


    public function editor(){
        return view('content.editor');
    }



    public function addRole(Request $request){

        //حتى نستدعي اليوزر
        $user =User::where('email',$request['email'])->first();
        $user ->roles()->detach();

        if($request['role_user'])
        {
            $user->roles()->attach(Role::where('name','User')->first());
        }

        if($request['role_editor'])
        {
            $user->roles()->attach(Role::where('name','editor')->first());
        }

        if($request['role_admin'])
        {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }

        return redirect()->back();


    }

    public function accessDenied (){
        return view('content.access_denied');
    }

    public function like(Request $request){

        $like_s = $request->like_s;
        $post_id = $request->post_id;

        $like = DB::table('likes')
        ->where('post_id', $post_id)
        ->where('user_id', Auth::user()->id)
        ->first();

        if(!like)
        {
            $new_like = new Like;
            $new_like->post_id = $post_id;
            $new_like->user_id = Auth::user()->id;
            $new_like->like = 1;
            $new_like->save();

            $is_like = 1;

        }
        elseif ($like->like ==1)
        {
            Db::table('likes')
            ->where('post_id',$post_id)
            ->where('user_id', Auth::user()->id)
            ->delete();

            $is_like = 0;

        }
        elseif  ($like->like ==0)
        {
            Db::table('likes')
            ->where('post_id',$post_id)
            ->where('user_id', Auth::user()->id)
            ->update(['like' => 1] );
            $is_like = 1;
        }

        $response = array(
            'is_like' => $is_like,
        );
          return response()->json($response, 200);

    }
}


// Post::create([
//     'title'  => request ('title'),
//     'body'  => request ('body'),
//     'url'  => request ('url')
// ]);
