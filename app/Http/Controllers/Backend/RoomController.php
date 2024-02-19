<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Facility;
use App\Models\MultiImages;
use App\Models\RoomNumber;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class RoomController extends Controller
{
    //
    public function EditRoom($id ){
        $basic_facility =Facility::where('rooms_id',$id)->get();
        $mutiimgs =MultiImages::where('rooms_id',$id)->get();
        //to access the roomNumber table 
        $all_room_number = RoomNumber::where('rooms_id',$id)->get();
        $editData = Room::find($id);
        return view("backend.allroom.rooms.edit_rooms", compact('editData','basic_facility','mutiimgs','all_room_number'));

    } 
    public function UpdateRoom(Request $request ,$id) {
        $room  = Room::find($id);
        $room->roomtype ; //= $room->roomtype_id
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;
        $room->room_capacity = $request->room_capacity;
        $room->price = $request->price;

        $room->size = $request->size;
        $room->view = $request->view;
        $room->bed_style = $request->bed_style;
        $room->discount = $request->discount;
        $room->short_desc = $request->short_desc;
        $room->description = $request->description; 
        $room->status = 1; 

        /// Update Single Image 

        if($request->file('image')){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,850)->save('upload/rooming/'.$name_gen);
        $room['image'] = $name_gen; 
        }

        $room->save();
            ///update for Facility table 
            if($request->facility_name == null){
                $notification = array(
                    'message' => 'Sorry !! Not Any Basic Item Select',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }else{
                Facility::where('rooms_id',$id)->delete();
                $facilites = count($request->facility_name) ;

                for($i =0 ; $i <$facilites; $i++){
                    $fcount = new  Facility();

                    $fcount->rooms_id = $room->id;
                    $fcount->facility_name =$request->facility_name[$i];
                    $fcount->save();

                }//End FOr 


            }//End else

        //Update muti image

            if($room->save()){
                $files = $request->multi_image;

                if( !empty($files)){
                    $subimage = MultiImages::where('rooms_id',$id)->get()->toArray();
                    MultiImages::where('rooms_id',$id)->delete();
                }

                if(!empty($files)){

                    foreach($files as $file){
                        $imgName = date('YmdHi').$file->getClientOriginalName();
                        $file->move('upload/rooming/multi_img/',$imgName);
                        $subimage['multi_image'] = $imgName;

                    $subimage = new MultiImages();
                    $subimage->rooms_id = $room->id;
                    $subimage->multi_image = $imgName;
                    $subimage->save();

                    }
                }
            }//Edn if 

            $notification = array(
                'message' => 'Room Updated Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 


    }//End method 

    public function MultiImageDelete($id){
        $deletedData = MultiImages::where('id',$id)->first();

        if($deletedData){
            $imagePath = $deletedData->multi_image;
            //check if the file exists before unlink
            if (file_exists($imagePath)){
                unlink($imagePath);
                echo'image deleted';
            }else{
                echo 'image doesnot exist ';
            }
            //Delete recoard from the data base 
            MultiImages::where('id',$id)->delete();
        }
        $notification = array(
            'message' => 'Multi image Deleted suucc',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }//End Method  

    // stoe The room number bassed on room type and room 
    public function StoreRoomNumber(Request $request , $id){
        $data= new RoomNumber ();
        $data->rooms_id = $id;
        $data->room_no = $request->room_no;
        $data->status = $request->status;
        $data->timestamps = false; // Disable timestamps for this specific instance

        $data->save();

        $notification = array(
            'message' => 'Room Number Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }//End Method 

    public function EditRoomNumber($id){
        $editroomno = RoomNumber::find($id); 
        return view('Backend.allroom.rooms.edit_room_no',compact('editroomno'));

    }//End mthod 

    public function UpdateRoomNumber(Request $request , $id){
        $data =RoomNumber::find($id);
        $data->room_no = $request->room_no;
        $data->status = $request->status;
        $data->timestamps = false;
        $data->save();

        $notification = array(
            'message' => 'Room Number Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('room.type.list')->with($notification); 


    }//End Method 
    public function DeleteRoomNumber($id){
        $data = RoomNumber::find($id)->delete();
        if($data){
                $notification = array(
                    'message' => 'Room Number Deleted  Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification); 

            }
    }//End Method 

    public function DeleteRoom(Request $request,$id) {
        //delete room type 
        $room = Room::find($id);

        if (file_exists('upload/rooming/'.$room->image) AND ! empty($room->image)) {
            @unlink('upload/rooming/'.$room->image);
         }
 
         $subimage = MultiImages::where('rooms_id',$room->id)->get()->toArray();
         if (!empty($subimage)) {
             foreach ($subimage as $value) {
                if (!empty($value)) {
                @unlink('upload/rooming/multi_img/'.$value['multi_image']);
                }
             }
         }

         MultiImages::where('rooms_id',$room->id)->delete();
         Facility::where('rooms_id',$room->id)->delete();
         RoomNumber::where('rooms_id',$room->id)->delete();
         $room->delete();


         $notification = array(
            'message' => 'Room Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);  



    }//end Method 
}
