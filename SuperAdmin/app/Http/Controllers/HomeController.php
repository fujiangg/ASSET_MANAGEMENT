<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    function layout(){
        
        return view('dashboards.Home.indexhome');
    } 

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $dataHome = Home::all();
        return view('dashboards.Home.datahome',compact('dataHome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.Home.createhome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'websiteimage'    => 'required',
            'websitelogo'  => 'required',
            'greetingsword'  => 'required',
            'websitedescription'      => 'required', 
        ]);

        Home::create([
            'websiteimage'    => $request->websiteimage,
            'websitelogo'  => $request->websitelogo,
            'greetingsword'  => $request->greetingsword,
            'websitedescription'      => $request->websitedescription,
           
        ]);

        $message = Home::create($request->all());
        if($request->hasFile('websiteimage')) {
            $request->file('websiteimage')->move('HomeImages/',$request->file('websiteimage')->getClientOriginalName());
            $message->websiteimage = $request->file('websiteimage')->getClientOriginalName();
            $message->save();
        }

        if($request->hasFile('websitelogo')) {
            $request->file('websitelogo')->move('HomeImages/',$request->file('websitelogo')->getClientOriginalName());
            $message->websiteimage = $request->file('websitelogo')->getClientOriginalName();
            $message->save();
        }
        return redirect('datahome')->with('success', 'Data Changed Successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dt = Home::findorfail($id);
        return view('dashboards.Home.edithome',compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi form untuk file gambar
    $request->validate([
        'websiteimage' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'websitelogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ], [
        'websiteimage.image' => 'The file must be an image.',
        'websiteimage.mimes' => 'Image format must be jpeg, png, jpg, gif, or svg.',
        'websitelogo.image' => 'The file must be an image.',
        'websitelogo.mimes' => 'Image format must be jpeg, png, jpg, gif, or svg.',
    ]);


    $this->validate($request, [
        'greetingsword' => 'required',
        'websitedescription' => 'required',
    ]);

    $message = Home::find($id);
    $message->greetingsword = $request->greetingsword;
    $message->websitedescription = $request->websitedescription;

     // Check if a new image file is uploaded
     if ($request->hasFile('websiteimage')) {
        $request->validate([
            'websiteimage' => 'required',
        ]);

        $request->file('websiteimage')->move('HomeImages/', $request->file('websiteimage')->getClientOriginalName());
        $message->websiteimage = $request->file('websiteimage')->getClientOriginalName();
    }

    // Check if a new logo file is uploaded
    if ($request->hasFile('websitelogo')) {
        $request->validate([
            'websitelogo' => 'required',
        ]);

        $request->file('websitelogo')->move('HomeImages/', $request->file('websitelogo')->getClientOriginalName());
        $message->websitelogo = $request->file('websitelogo')->getClientOriginalName();
    }

    $message->save();

    return redirect('datahome')->with('success', 'Data Updated Successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Home::findorfail($id);

        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');


    }

    
}