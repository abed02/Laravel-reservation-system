<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\BookArea;
use App\Models\MultiImages;
use App\Models\Room;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;



class RoomTypeController extends Controller
{
    //
    public function RoomTypeList(){
    $allData = Room::OrderBy('id','desc')->get();
    return view('backend.allroom.roomtype.view_roomtype',compact('allData'));

    }//End Method 

    public function AddRoomType(){
        return view('backend.allroom.roomtype.add_roomtype');

    }

    public function RoomTypeStore(Request $request){

        $validatedData  = $request->validate([


        ]);

        
       

        if($request->file('image')){
            $file = $request->file('photo');
            @unlink(public_path('upload/rooming/'.$request->image));
            $filename = date('YmdHi').$file->getClientOriginalName();  
            $file->move(public_path('upload/admin_images'),$filename);
            $data['iamge'] = $filename;
    
        }
    $newRoomId = DB::table('rooms')->insertGetId([

        
    'roomtype' => $request->roomtype,
    'total_adult' => $request->total_adult,
    'total_child' => $request->total_child,
    'image' =>$data['iamge'],
    'price' => $request->price,
    'size' => $request->size,
    'discount' => $request->discount,
    'room_capacity' => $request->room_capacity,
    'view' => $request->view,
    'bed_style' => $request->bed_style,
    'short_desc' => $request->short_desc,
    'description' => $request->description,
    'status' => 1,
    ]);

   

    $roomExists  = Room::where('id' ,$newRoomId)->exists();

    if ($roomExists) {
        $selectedFacilities = $request->input('facility_name', []);

        foreach ($selectedFacilities as $facilityName) {
            DB::table('facilities')->insert([
                'rooms_id' => $newRoomId,
                'facility_name' => $facilityName,
            ]);
        }

        $files = $request->multi_image;

        if( !empty($files)){
            $subimage = MultiImages::where('rooms_id',$newRoomId)->get()->toArray();
            MultiImages::where('rooms_id',$newRoomId)->delete();
        }

        if(!empty($files)){

            foreach($files as $file){
                $imgName = date('YmdHi').$file->getClientOriginalName();
                $file->move('upload/rooming/multi_img/',$imgName);
                $subimage['multi_image'] = $imgName;

            $subimage = new MultiImages();
            $subimage->rooms_id = $newRoomId;
            $subimage->multi_image = $imgName;
            $subimage->save();

            }
        }

      
    //Edn if 

    } else {
        $notification = array(
            'message' => 'Room facilities  NOt  Inserted  Successfully',
            'alert-type' => 'error'
        );
         return redirect()->route('room.type.list')->with($notification);
    }
      


   

    $notification = array(
        'message' => 'Room type Inserted  Successfully',
        'alert-type' => 'success'
    );
     return redirect()->route('room.type.list')->with($notification);
    }


}
