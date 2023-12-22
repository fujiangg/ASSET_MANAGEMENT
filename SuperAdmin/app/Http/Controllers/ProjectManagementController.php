<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserManagement;
use App\Models\ProjectManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProjectManagementController extends Controller
{
    function db(){
        
        return view('dashboards.ProjectManagement.indexprojectmanagement');
    } 

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataPms = ProjectManagement::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboards.ProjectManagement.dataprojectmanagement',compact('dataPms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.ProjectManagement.createprojectmanagement');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'projectname' => 'required',
            'projectuser' => 'required',
            'projectdeadline' => 'required',
            
        ], [
            'projectname.required' => 'The project name field is required.',
            'projectuser.required' => 'The project user field is required.',
            'projectdeadline.required' => 'The project deadline field is required.',
        ]);

         // Logika untuk membuat ID proyek secara otomatis
        $project_id = 'PROJ_' . date('YmdHis');

        $projectname = $request->projectname;
        $projectuser = $request->projectuser;
        $projectdeadline = $request->projectdeadline;

        // $q = new ProjectManagement;
        // $q->project_id = $project_id;
        // $q->projectname = $projectname;
        // $q->projectuser = $projectuser;
        // $q->projectdeadline = $projectdeadline;
        // $q->save();

        // return redirect('dataprojectmanagement')->with('success', 'Data Changed Successfully!');

        $new_project = DB::table('project_management')->insertGetId([
            'project_id' => $project_id,
            'projectname' => $projectname,
            'projectuser' => $projectuser,
            'projectdeadline' => $projectdeadline,
        ]);

        if ($new_project) {
            // clone dashboard
            $sourceFolder = 'F:\project-laravel\Dashboard\template';
            $destination = 'F:\project-laravel\Dashboard';
            $name = $request->input('projectname');
            $destinationFolder = $destination . '/' . $name;

            if (File::isDirectory($sourceFolder)) {
                // Check if the source folder exists
                if (!File::isDirectory($destinationFolder)) {
                    // Create the destination folder if it doesn't exist
                    File::makeDirectory($destinationFolder, 0755, true); // Change permissions as needed

                    // Copy the contents recursively
                    File::copyDirectory($sourceFolder, $destinationFolder);

                    Session::flash('success', 'Folder "' . $name . '" created successfully!');
                    return redirect()->route('dataprojectmanagement')->with('success','Project created successfully.');;
                } else {
                    Session::flash('error', 'Folder "' . $name . '" already exists!');
                    return redirect()->route('dataprojectmanagement')->with('error','Folder already exists!');;
                }
            } else {
                Session::flash('error', 'Source folder does not exist!');
                return redirect()->route('dataprojectmanagement')->with('success','Source folder does not exists!');;
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // //get post by ID
        // $pmspage = ProjectManagement::findOrFail($id);

        // //render view with post
        // return view('dashboards.dataprojectmanagement.showpms', compact('pmspage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dt = ProjectManagement::findorfail($id);
        return view('dashboards.ProjectManagement.editprojectmanagement',compact('dt'));
    }

   /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = ProjectManagement::findorfail($id);

        $dt = [
            'project_id' => $request['project_id'],
            'projectname' => $request['projectname'],
            'projectuser' => $request['projectuser'],
            'projectdeadline' => $request['projectdeadline'],

        ];
        $ubah->update($dt);
        return redirect('dataprojectmanagement')->with('success', 'Data Changed Successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ProjectManagement::findorfail($id);

        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');

    }


}

