<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class TestmonialController extends Controller
{
    //
    public function AllTestimonial() 
    {
        $testimonial = Testimonial::latest()->get();
        return view ('backend.testimonial.alltestimonial',compact('testimonial'));
    }//end method
    public function AddTestimonial () 
    {
        return view ('backend.testimonial.add_testimonial');
    } //End MeThod

    public function StoreTestimonial(Request $request) 
    {
        $image = $request->file("image");
        $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(50,50)->save('upload/testimonial/'.$name_gen);
        $save_url="upload/testimonial/".$name_gen;

        Testimonial::insert([
            "name"=> $request->name,
            'city'=>$request->city,
            "message"=> $request->message,
            'image'=>$save_url,
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Testimonial  Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notification);
    }// End method 

    public function EditTestimonial ($id) 
    {
        $testimonial = Testimonial::find($id);
        return view ('backend.testimonial.edit_testimonial',compact('testimonial'));
    } // End method 



    public function UpdateTestimonial (Request $request) 
    {
        $testimonial_id =$request->id;

        if ($request->file('image')){ // update withe image

            $image = $request->file("image");
            $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(50,50)->save('upload/testimonial_id/'.$name_gen);
            $save_url="upload/testimonial_id/".$name_gen;
    
            Testimonial::findOrFail( $testimonial_id)->update([
                "name"=> $request->name,
                'image'=>$save_url,
                "city"=> $request->city,
                'message'=>$request->message,
                'updated_at'=>Carbon::now(),
    
            ]);
           
         
        }else { // update without image
            Testimonial::findOrFail( $testimonial_id)->update([
                "name"=> $request->name,
                "city"=> $request->city,
                'message'=>$request->message,
                'updated_at'=>Carbon::now(),
    
            ]);
        } //End Else
        $notification = array(
            'message' => 'Testimonial Update  Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.testimonial')->with($notification);

    }//End Method 

    public function DeleteTestimonial ($id ) 
    {
        $item = Testimonial::findOrFail($id);
        $img = $item->Image;
        unlink($img);

        Testimonial::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End method 
}
