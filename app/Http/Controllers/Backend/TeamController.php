<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\BookArea;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    //  
    public function AllTeam(){
        $team = Team::latest()->get();
        return view("backend.team.all_team",compact("team"));
    }//End method 

    public function AddMember(){  
        return view("backend.team.add_member");

    }//End method 

    public function StoreTeam(Request $request) {
        $image = $request->file("image");
        $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(550,670)->save('upload/team/'.$name_gen);
        $save_url="upload/team/".$name_gen;

        Team::insert([
            "name"=> $request->name,
            'image'=>$save_url,
            "Postion"=> $request->postion,
            'facbook'=>$request->facbook,
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Team Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }//End method 

    public function EditTeam($id) {
        $team = Team::findOrFail($id);
        return view('backend.team.edit_team',compact('team'));
    }//end Method
    
    public function UpdateTeam (Request $request) {
        $team_id =$request->id;

        if ($request->file('image')){ // update withe image

            $image = $request->file("image");
            $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
            Image::make($image)->resize(550,670)->save('upload/team/'.$name_gen);
            $save_url="upload/team/".$name_gen;
    
            Team::findOrFail( $team_id)->update([
                "name"=> $request->name,
                'image'=>$save_url,
                "Postion"=> $request->postion,
                'facbook'=>$request->facbook,
                'updated_at'=>Carbon::now(),
    
            ]);
           
         
        }else { // update without image
            Team::findOrFail( $team_id)->update([
                "name"=> $request->name,
                "Postion"=> $request->postion,
                'facbook'=>$request->facbook,
                'updated_at'=>Carbon::now(),
    
            ]);
        } //End Else
        $notification = array(
            'message' => 'Team Update Inserted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->route('all.team')->with($notification);
    }//End method 

    public function DeleteTeam ($id){ //52
        $row = Team::findOrFail($id);

        $img= $row->image;
        unlink($img); //delete image from fiald
        $row->delete();
        $notification = array(
            'message' => 'Team Deleted Successfully',
            'alert-type' => 'success'
        );


        return redirect()->back()->with($notification);
    }
   // =======================================book ARea all function ========================


   public function BookArea(){
    $book =BookArea::find(1);
    return view('backend.bookarea.book_area',compact('book'));
    
   }

   public function BookAreaUpdate(Request $request){
    $book_id = $request->id;

    if ($request->file('image')){ // update withe image

        $image = $request->file("image");
        $name_gen = hexdec(uniqid()) .'.'. $image->getClientOriginalExtension();
        Image::make($image)->resize(1000,1000)->save('upload/bookarea/'.$name_gen);
        $save_url="upload/bookarea/".$name_gen;

        BookArea::findOrFail(  $book_id)->update([
            "short_title"=> $request->short_title,
            'main_title'=>$request->main_title,
            "short_desc"=> $request->short_desc,
            'url_link'=>$request->url_link,
            'image'=> $save_url

        ]);
       
     
    }else { // update without image
        BookArea::findOrFail(  $book_id)->update([
            "short_title"=> $request->short_title,
            'main_title'=>$request->main_title,
            "short_desc"=> $request->short_desc,
            'url_link'=>$request->url_link,
          


        ]);
    } //End Else
    $notification = array(
        'message' =>' Book Area Updated Successfully',
        'alert-type' => 'success'
    );


    return redirect()->back()->with($notification);

   }
    

}
