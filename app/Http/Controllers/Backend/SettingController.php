<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StmpSetting; 
use App\Models\SiteSetting; 
use Intervention\Image\Facades\Image;


class SettingController extends Controller
{
    //
    public function SmtpSetting () 
    {
        $smtp = StmpSetting::find(1);
        return view ('backend.setting.smtp_update',compact('smtp'));
    }//End Method 

    public function SmtpUpdate (Request $request){
        $stmp_id =$request->id;
      StmpSetting::find($stmp_id)->update (
        [
            'mailer' =>$request->mailer,
            'host'   =>$request->host,
            'port'   =>$request->port,
            'username'=> $request->username,
            'password' => $request->password,
            'encryption'=>$request->encryption,
            'from_address' =>$request->from_address
        ]
        );

        $notification = array(
            'message' => 'smtp setting updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }// End method 
    //  /////////////////////////////////////////////////// Site setting 

    
    public function SiteSetting(){

        $site = SiteSetting::find(1);
        return view('backend.site.site_update',compact('site'));

    }// End Method 

    public function SiteUpdate(Request $request){

        $site_id = $request->id;

        if($request->file('logo')){

            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(110,44)->save('upload/site/'.$name_gen);
            $save_url = 'upload/site/'.$name_gen;

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'facbook' => $request->facebook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright,
                'logo' => $save_url, 
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        } else {

            SiteSetting::findOrFail($site_id)->update([

                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'facbook' => $request->facbook,
                'twitter' => $request->twitter,
                'copyright' => $request->copyright, 
            ]);

            $notification = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

        } // End Eles 


    }// End Method 

}
