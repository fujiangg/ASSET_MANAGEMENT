<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    public function index()
    {       
        $setting_title = SettingTitle::first();

        return view('user-profile.index', compact('setting_title'));
    }

    public function updatePersonalInformation(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
            'phone'=>'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);

            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your personal information has been update successfully.']);
            }
        }
    }

    public function changeProfilePicture(Request $request)
    {
        $path = 'users/pictures/';
        $file = $request->file('picture');
        $new_name = 'IMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new picture
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( File::exists(public_path($path.$oldPicture))){
                    File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully.']);
            }
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'old_password'=>[
                'required', function($attribute, $value, $fail){
                    if(!Hash::check($value, Auth::user()->password)){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'new_password'=>'required|min:8|max:30|different:old_password',
            'confirm_password'=>'required|same:new_password',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $update = User::find(Auth::user()->id)->update([
                'password'=>Hash::make($request->new_password),
            ]);

            if(!$update){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your password has been update successfully.']);
            }
        }
    }

    /**
     * EDIT
     * 
     * Show the update profile page.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // public function edit(Request $request, User $user)
    // {
    //     $users = DB::select('select * from users');

    //     return view('user_profile.edit', [
    //         'users' => $users,
    //         'user' => $request->user()
    //     ]);
    // }

    /**

    * UPDATE
    * 
    * Update user's profile
    *
    * @param  Request $request
    * @return \Illuminate\Contracts\Support\Renderable
    */

    // public function update(Request $request, User $user)
    // {
    //     $request->user()->update(
    //         $request->all()
    //     );

    //     return redirect()->route('profiles.edit')
    //                     ->with('success', 'Profile updated successfully');
    // }

    // public function upload(Request $request, User $user)
    // {
    //     if ($request->hasFile('image')) {
    //         $fileName = strtolower($request->file('image')->getClientOriginalName());
    //           $this->deleteOldImage();
    //         $request->image->storeAs('public/images', $fileName);
    //         $user = Auth()->user();
    //         $user->update(['image'=>$fileName]);
    //     }
    //     return redirect()->back()
    //                     ->with('success', 'Image updated successfully');
    // }

    // protected function deleteOldImage()
    // {
    //     if (Storage::exists('public/images/' . auth()->user()->image)) {
    //           Storage::delete('public/images/' . auth()->user()->image);
    //         }
    //     else {
    //         $fileName =  Auth()->user()->image;
    //     }

    //     return redirect()->route('profiles.edit');
    // }
}
