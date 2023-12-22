<?php

namespace App\Http\Controllers;

use App\Models\AboutUsTeam;
use Illuminate\Http\Request;
use App\Models\AboutUsDescription;

class AboutUsController extends Controller
{
    function layout(){
        
        return view('dashboards.AboutUs.indexaboutus');
    } 

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataAboutDescription = AboutUsDescription::all();
        $dataAboutTeam = AboutUsTeam::all();
        $title = 'Delete User!';$text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('dashboards.AboutUs.dataaboutus',compact('dataAboutDescription','dataAboutTeam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createaboutdescription()
    {
        return view('dashboards.AboutUs.createaboutusdescription');
    }

     /**
     * Show the form for creating a new resource.
     */
    public function createaboutteam()
    {
        return view('dashboards.AboutUs.createaboutusteam');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeaboutdescription(Request $request)
    {

        $dtUpload = new AboutUsDescription;
        
       
        $dtUpload->description = $request->description;
       

        $dtUpload->save();

        return redirect('dataaboutus')->with('success', 'Data Changed Successfully!');


    }

     /**
     * Store a newly created resource in storage.
     */
    public function storeaboutteam(Request $request)
    {
        // Validasi form
        $request->validate([
            'fullname' => 'required',
            'jobposition' => 'required',
            'instagramlink' => 'required',
            'linkedinlink' => 'required',
            'profilepicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'fullname.required' => 'The fullname field is required',
            'jobposition.required' => 'The job positon field is required',
            'instagramlink.required' => 'Instagram link is required.',
            'linkedinlink.required' => 'Linkedin link is required.',
            'profilepicture.required' => 'Profile picture must be uploaded.',
            'profilepicture.image' => 'The file must be an image.',
            'profilepicture.mimes' => 'Image format must be jpeg, png, jpg, gif, or svg.',
        ]);

        // Logika penyimpanan data jika validasi berhasil
        $nm = $request->profilepicture;
        $namaFile = $nm->getClientOriginalName();

        $dtUpload = new AboutUsTeam;
        $dtUpload->profilepicture = $namaFile;
        $dtUpload->fullname = $request->fullname;
        $dtUpload->jobposition = $request->jobposition;
        $dtUpload->instagramlink = $request->instagramlink;
        $dtUpload->linkedinlink = $request->linkedinlink;

        $nm->move(public_path().'/AboutUsImages', $namaFile);
        $dtUpload->save();

        return redirect('dataaboutus')->with('success', 'Data Changed Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // //get post by ID
        // $projectpage = AboutTeam::findOrFail($id);

        // //render view with post
        // return view('dashboards.abouts.showproject', compact('projectpage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editaboutdescription($id)
    {
        $dt = AboutUsDescription::findorfail($id);
        return view('dashboards.AboutUs.editaboutusdescription',compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editaboutteam($id)
    {
        $dt = AboutUsTeam::findorfail($id);
        return view('dashboards.AboutUs.editaboutusteam',compact('dt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateaboutdescription(Request $request, string $id)
    {
        $ubah = AboutUsDescription::findorfail($id);

        $dt = [
            'description' => $request['description'],
            
        ];
        $ubah->update($dt);
       return redirect('dataaboutus')->with('success', 'Data Updated Successfully!');
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateaboutteam(Request $request, string $id)
    {
        $ubah = AboutUsTeam::findorfail($id);

        // Memeriksa apakah ada file gambar yang diunggah
        if ($request->hasFile('profilepicture')) {
            // Validasi form untuk file gambar
            $request->validate([
                'profilepicture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [
                'profilepicture.image' => 'The file must be an image.',
                'profilepicture.mimes' => 'Image format must be jpeg, png, jpg, gif, or svg.',
            ]);
    
            // Proses penyimpanan file gambar
            $nm = $request->profilepicture;
            $namaFile = $nm->getClientOriginalName();
            $nm->move(public_path().'/AboutUsImages', $namaFile);
    
            // Update data dengan file gambar baru
            $dt = [
                'fullname' => $request['fullname'],
                'jobposition' => $request['jobposition'],
                'instagramlink' => $request['instagramlink'],
                'linkedinlink' => $request['linkedinlink'],
                'profilepicture' => $namaFile,
            ];
        } else {
            // Update data tanpa mengubah file gambar
            $dt = [
                'fullname' => $request['fullname'],
                'jobposition' => $request['jobposition'],
                'instagramlink' => $request['instagramlink'],
                'linkedinlink' => $request['linkedinlink'],
            ];
        }
    
        $ubah->update($dt);
        return redirect('dataaboutus')->with('success', 'Data Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroyaboutdescription(string $id)
    {
        $delete = AboutUsDescription::findorfail($id);

        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');

    }
    
     /**
     * Remove the specified resource from storage.
     */
    public function destroyaboutteam(string $id)
    {
        $delete = AboutUsTeam::findorfail($id);

        $file = public_path('/AboutUsImages/').$delete->profilepicture;
        //cek jika ada gambar
        if(file_exists($file)){
            //maka hapus file folder public /img
            @unlink($file);
        }
        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');
    }
    


}
