<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Post;

class FrontendController extends Controller
{
   public function index(){
    $all_subjects=Subject::where('status','0')->get();
    return view('frontend.index',compact('all_subjects'));
   }

   public function viewSubjectPost(string $subject_slug){

    $subject = Subject::where('slug',$subject_slug)->where('status','0')->first();
    if($subject){
         $post = Post::where('subject_id',$subject->id)->where('status','0')->paginate(2);
         return view('frontend.post.index',compact('post','subject')); 

    }else{
        return redirect('/');
    }

   }

   public function viewPost(string $subject_slug,string $post_slug){
    
    $subject = Subject::where('slug',$subject_slug)->where('status','0')->first();
    if($subject){
         $post = Post::where('subject_id',$subject->id)->where('slug',$post_slug)->where('status','0')->first();
         $latest_posts= Post::where('subject_id',$subject->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(5);
         return view('frontend.post.view',compact('post','latest_posts')); 

    }else{
        return redirect('/');
    }
       
   }

}
