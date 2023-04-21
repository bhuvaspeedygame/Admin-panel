<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return view('admin.user_profile',compact('profile'));
    }

    public function edit(Request $request)
    {
        $profile_data = Profile::first();
        if(!empty($profile_data))
        {
            $image = public_path().'/profile_images/'.$request->hidden_image;
            $logo = public_path().'/profile_images/'.$request->hidden_logo;

            if(!empty($image)){
                File::delete($image);
            }
            if(!empty($logo)){
                File::delete($logo);
            }

            $profile = Profile::find($profile_data->id);

            if($file = $request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/profile_images' ;
                $file->move($destinationPath,$fileName);
                $profile->image = $fileName;
            }

            if($file = $request->hasFile('company_logo')) {

                $file = $request->file('company_logo') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/profile_images' ;
                $file->move($destinationPath,$fileName);
                $profile->company_logo = $fileName;
            }

            $profile->name = $request->name;
            $profile->about = $request->about;
            $profile->company = $request->company;
            $profile->job = $request->job;
            $profile->country = $request->country;
            $profile->address = $request->address;
            $profile->phone = $request->phone;
            $profile->email = $request->email;
            $profile->twitter = $request->twitter;
            $profile->facebook = $request->facebook ;
            $profile->instagram = $request->instagram ;
            $profile->linkedin = $request->linkedin;
            $profile->update();
        }
        else
        {
            $image = public_path().'/profile_images/'.$request->hidden_image;
            $logo = public_path().'/profile_images/'.$request->hidden_logo;

            if(!empty($image)){
                File::delete($image);
            }
            if(!empty($logo)){
                File::delete($logo);
            }

            $profile = new Profile();
            if($file = $request->hasFile('image')) {

                $file = $request->file('image') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/profile_images' ;
                $file->move($destinationPath,$fileName);
                    $profile->image = $fileName;
            }
            if($file = $request->hasFile('company_logo')) {

                $file = $request->file('company_logo') ;
                $fileName = $file->getClientOriginalName() ;
                $destinationPath = public_path().'/profile_images' ;
                $file->move($destinationPath,$fileName);
                    $profile->company_logo = $fileName;
            }

            $profile->name = $request->name;
            $profile->about = $request->about;
            $profile->company = $request->company;
            $profile->job = $request->job;
            $profile->country = $request->country;
            $profile->address = $request->address;
            $profile->phone = $request->phone;
            $profile->email = $request->email;
            $profile->twitter = $request->twitter;
            $profile->facebook = $request->facebook ;
            $profile->instagram = $request->instagram ;
            $profile->linkedin = $request->linkedin;
            $profile->save();
        }
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", "Password changed successfully!");
    }

}
