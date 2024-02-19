<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth; 

use Intervention\Image\Facades\Image;


class BlogController extends Controller
{
    //
    public function Blogcatagory () 
    {
        $category = BlogCategory::latest()->get();
        return view ('backend.category.blog_category',compact('category'));
    }// End Method 

    public function StoreBlogcatagory (Request $request)
    {
        BlogCategory::insert(
            [
                'category_name' => $request->category_name,
                'category_slug' =>strtolower(str_replace(' ','-',$request->category_name))
            ]
            );

            
         $notification = array(
            'message' => 'Blog Category inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  


    }//End method EditBlogCategory

    public function EditBlogCategory ($id)
    {
        $categories = BlogCategory::find($id);
        return response()->json($categories);
    } // End method 

    public function UpdateBlogCategory(Request $request){

        $cat_id = $request->cat_id;

        BlogCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),
        ]);

        $notification = array(
            'message' => 'BlogCategory Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    }// End Method 

    public function DeleteBlogCategory($id){

        BlogCategory::find($id)->delete();

        $notification = array(
            'message' => 'BlogCategory Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }// End Method 
    ///////////////////////////////////////All blog post method 

    public function AllBlogPost  () 
    {
         $post = BlogPost::latest()->get();
         return view ('backend.post.all_post',compact('post'));
    } // End Method 


    public function AddBlogPost(){
        $blogcat = BlogCategory::latest()->get();
        return view('backend.post.add_post',compact('blogcat'));
    }// End Method 


    public function StoreBlogPost(Request $request){

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,370)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;

        BlogPost::insert([

            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'BlogPost Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notification);

    } // End Method 

    public function EditBlogPost($id){

        $blogcat = BlogCategory::latest()->get();
        $post = BlogPost::find($id);
        return view('backend.post.edit_post',compact('blogcat','post'));

    }// End Method 


    public function UpdateBlogPost(Request $request){

        $post_id = $request->id;

        if($request->file('post_image')){

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,370)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;

        BlogPost::findOrFail($post_id)->update([

            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'BlogPost Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog.post')->with($notification);


        } else {

            //wityhout image 

            BlogPost::findOrFail($post_id)->update([

                'blogcat_id' => $request->blogcat_id,
                'user_id' => Auth::user()->id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ','-',$request->post_title)),
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc, 
                'created_at' => Carbon::now(),
                ]);

                $notification = array(
                    'message' => 'BlogPost Updated Without Image Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->route('all.blog.post')->with($notification);

        } // End Eles 


    }// End Method 

    public function DeleteBlogPost($id){

        $item = BlogPost::findOrFail($id);
        $img = $item->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'BlogPost Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


     }   // End Method 



     public function BlogDetails ( $link ) 
     {
        $blog= BlogPost::Where('post_slug',$link)->first();
        $b_catagory = BlogCategory::latest()->get();
        $lpost = BlogPost::latest()->limit(3)->get();
        return view ('frontend.blog.blog_details',compact('blog','b_catagory','lpost'));
     } //End method 



     public function BlogcatList($id ) 
     {
        $blog =BlogPost::where('blogcat_id',$id)->get();
        $b_catagory = BlogCategory::latest()->get();
        $lpost = BlogPost::latest()->limit(3)->get();
        $namecat = BlogCategory::where('id',$id)->first();
        return view ('frontend.blog.blog_cat_list',compact('blog','b_catagory','lpost','namecat'));
     } //End method

     public function BlogList(){

        $blog = BlogPost::latest()->paginate(3);
        $bcategory = BlogCategory::latest()->get();
        $lpost = BlogPost::latest()->limit(3)->get();

        return view('frontend.blog.blog_all',compact('blog','bcategory','lpost'));
     }//End method 
}
