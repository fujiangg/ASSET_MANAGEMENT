<?php

namespace App\Http\Controllers;

use App\Models\PortalLogin;
use Illuminate\Http\Request;

class PortalLoginController extends Controller
{
    function layout(){
        
        return view('dashboards.PortalLogin.indexportallogin');
    } 

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataPortalLogin = PortalLogin::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dashboards.PortalLogin.dataportallogin',compact('dataPortalLogin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.PortalLogin.createportallogin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         // Validasi form
         $request->validate([
            'projectname' => 'required',
            'projectlink' => 'required',
            
        ], [
            'projectname.required' => 'The project name field is required.',
            'projectlink.required' => 'The project link field is required.',
        ]);

        $dtUpload = new PortalLogin;
        
        $dtUpload->projectname = $request->projectname;
        $dtUpload->projectlink = $request->projectlink;

        $dtUpload->save();

        return redirect('dataportallogin')->with('success', 'Data Changed Successfully!');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // //get post by ID
        // $projectpage = PortalLogin::findOrFail($id);

        // //render view with post
        // return view('dashboards.portallogin.showproject', compact('projectpage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dt = PortalLogin::findorfail($id);
        return view('dashboards.PortalLogin.editportallogin',compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = PortalLogin::findorfail($id);

        $dt = [
            'projectname' => $request['projectname'],
            'projectlink' => $request['projectlink'],

        ];
        $ubah->update($dt);
        return redirect('dataportallogin')->with('success', 'Data Updated Successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PortalLogin::findorfail($id);

        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');

    }
    


}
