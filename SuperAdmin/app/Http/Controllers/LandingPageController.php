<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Footer;
use App\Models\Navbar;
use App\Models\AboutTeam;
use App\Models\OurProject;
use App\Models\AboutUsTeam;
use Illuminate\Http\Request;
use App\Models\ContactUsCard1;
use App\Models\ContactUsCard2;
use App\Models\AboutDescription;
use App\Models\AboutUsDescription;
use App\Models\ContactUsSendMessage;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataNavbar = Navbar::all();
        $dataHome = Home::all();
        $dataAboutTeam = AboutUsTeam::all();
        $dataAboutDescription = AboutUsDescription::all();
        $dataProject = OurProject::all();
        $dataContactCard1 = ContactUsCard1::all();
        $dataContactCard2 = ContactUsCard2::all();
        $dataFooter = Footer::all();
        // $dataAbout = About::all();
        return view('landing-page',compact('dataNavbar','dataHome', 'dataAboutTeam','dataAboutDescription','dataProject','dataContactCard1','dataContactCard2','dataFooter'));
    }

    public function copyrightpage()
    {
        $dataFooter = Footer::all();
        $dataNavbar = Navbar::all();
        return view('copyright-page',compact('dataFooter','dataNavbar'));
    }

    public function privacypolicypage()
    {
        $dataFooter = Footer::all();
        $dataNavbar = Navbar::all();
        return view('privacypolicy-page',compact('dataFooter','dataNavbar'));
    }

    public function termsofusepage()
    {
        $dataFooter = Footer::all();
        $dataNavbar = Navbar::all();
        return view('termsofuse-page',compact('dataFooter','dataNavbar'));
    }

    public function projectdetail($id)
{
    $dataNavbar = Navbar::all();
    $dataOurProject = OurProject::find($id);
    return view('projectdetail', compact('dataOurProject', 'dataNavbar'));
}


    // public function dashboard()
    // {
    //     return view('landing-page');
    // }
    // public function store(Request $request)
    // {
    //     $post = new ContactUsSendMessage;
    //     $post->fullname = $request->fullname;
    //     $post->email = $request->email;
    //     $post->phone = $request->phone;
    //     $post->subject = $request->subject;
    //     $post->message = $request->message;
    //     $post->save();
    //     return redirect('landingpage')->with('status', 'Blog Post Form Data Has Been inserted');
    // }

    // public function dashboard()
    // {
    //     return view('landing-page');
    // }
    // public function store(Request $request)
    // {
    //     $post = new ContactUsSendMessage;
    //     $post->fullname = $request->fullname;
    //     $post->email = $request->email;
    //     $post->phone = $request->phone;
    //     $post->subject = $request->subject;
    //     $post->message = $request->message;
    //     $post->save();
    //     return redirect('landingpage')->with('status', 'Blog Post Form Data Has Been inserted');
    // }

//     public function db()
//     {
//         $post = ContactUsSendMessage::all();
//         return view('dashboard',compact('post'));
//         // return view('tabel');
//     }
//      //change status 
//      public function changeStatus($id){
//         $getStatus = ContactUsSendMessage::select('status')->where('id',$id)->first();
//         if($getStatus->status==0){
//             $status = 1;
//         }else{
//             $status = 0;
//         }
//         ContactUsSendMessage::where('id',$id)->update(['status'=>$status]);
//         // Toastr::success('Status Succesfully Changed', 'Success', ["positionClass" => "toast-top","closeButton"]);
//         return redirect()->back();
//     }
//     public function multiDelete(Request $request) 
// {
//     ContactUsSendMessage::whereIn('id', $request->get('selected'))->delete();

//     return response("Selected post(s) deleted successfully.", 200);
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
