<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 
use App\Models\Comment;


class commentController extends Controller
{

    public function StoreComment (Request $request){

    Comment::insert([
        'user_id' => $request->user_id,
        'post_id' => $request->post_id,
        'message' => $request->message,
        'created_at' => Carbon::now(),
    ]);

    $notification = array(
        'message' => 'Comment Added Successfully Admin will approved',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 

  }//End Method 


  // for admin dashboard 

  public function AllComment ()
    {
        $comments = Comment::latest()->get();
        return view ('backend.comment.all_comment',compact('comments'));
    } // End method 


    public function UpdateCommentStatus (Request $request) 
    {
        $commentId = $request->input('comment_id');
        $isChecked = $request->input('is_checked',0);

        $comment = Comment::find($commentId);
        if ($comment) {
           $comment->status = $isChecked;
           $comment->save(); 
        }

        return response()->json(['message' => 'Comment Status Updated Successfully']);

    }  // End method 
}
