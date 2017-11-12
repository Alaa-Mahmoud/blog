<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{

    public function getBlogIndex(){
           $posts=Post::paginate(5);
          foreach ($posts as $post){
              $post->body = $this->shortenText($post->body , 20);
          }
        return view('frontend.blog.index',compact('posts'));
    }

    public function getPostIndex(){
        $posts = Post::paginate(5);

        return view('admin.blog.index',compact('posts'));
    }


    public function getSinglePost($post_id){
       $post=Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail'=>'post not found']);
        }

        return view('frontend.blog.single',compact('post'));
    }
    public function getSinglePostAdmin($post_id){
        $post=Post::find($post_id);
        if(!$post){
            return redirect()->route('blog.index')->with(['fail'=>'post not found']);
        }

        return view('admin.blog.single',compact('post'));
    }


    public function getCreatePost(){
        $categories = Category::all();
        return view('admin.blog.create_post',compact('categories'));
    }


     public function PostCreatePost(Request $request){
         $this->validate($request,[
             'title'=>'required |max:120 |unique:posts',
             'author'=>'required|max:80',
             'body'=>'required'
         ]);

         $post = new Post();

         $post->title=$request->get('title');
         $post->author=$request->get('author');
         $post->category=$request->get('category');
         $post->body=$request->get('body');
         $post->save();

          //Attaching some Categories


         return redirect()->route('admin.index')->with(['success'=>'Post Successfully created']);
     }

      public  function getUpdatePost($post_id){
          $post=Post::find($post_id);
          if(!$post){
              return redirect()->route('blog.index')->with(['fail'=>'post not found']);
          }
           return view('admin.blog.edit_post',compact('post'));
      }

      public function postUpdatePost(Request $request ,$post_id){
          $this->validate($request,[
             'title'=>'required|max:120',
              'author'=>'required|max:80',
              'body'=>'required'
          ]);

          $post =Post::find($post_id);
          $post->title=$request->title;
          $post->author=$request->author;
          $post->category=$request->get('category');
          $post->body=$request->body;
          $post->update();

          return redirect()->route('admin.index')->with(['success'=>'Updated Successfully']);
      }

    public function getDeletePost($post_id){
        $post=Post::find($post_id);

        if(!$post){
            return redirect()->route('blog.index')->with(['fail'=>'post not found']);
        }
          $post->delete();
        return redirect()->route('admin.index')->with(['success'=>'Deleted Successfully']);
    }

     public function shortenText($text , $words_count){
          if(str_word_count($text ,0) > $words_count){
              $words = str_word_count($text , 2);
              $pos   = array_keys($words);
              $text  = substr($text , 0 , $pos[$words_count]).'.....';
         }
           return $text;
     }
}