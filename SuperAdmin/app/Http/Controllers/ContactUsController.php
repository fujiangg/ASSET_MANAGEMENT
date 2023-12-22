<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUsCard1;
use App\Models\ContactUsCard2;



class ContactUsController extends Controller
{
    function db(){
        
        return view('dashboards.ContactUs.indexcontactus');
    } 

    /**
     * Display a listing of the resource
     */
    public function index(Request $request)
    {
        $dataContactCard1 = ContactUsCard1::all();
        $dataContactCard2 = ContactUsCard2::all();
        return view('dashboards.ContactUs.datacontactus',compact('dataContactCard1','dataContactCard2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboards.ContactUs.createcontactuscard1');
    }
    

        /**
     * Show the form for creating a new resource.
     */
    public function createcard2()
    {
        return view('dashboards.ContactUs.createcontactcard2');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $dtUpload = new ContactUsCard1;
        
        $dtUpload->cardtitle = $request->cardtitle;
        $dtUpload->carddescription = $request->carddescription;
        $dtUpload->day = $request->day;
        $dtUpload->time = $request->time;
        $dtUpload->phonenumber = $request->phonenumber;
        $dtUpload->emailaddress = $request->emailaddress;
        $dtUpload->locationaddress = $request->locationaddress;
        $dtUpload->facebooklink = $request->facebooklink;
        $dtUpload->twitterlink = $request->twitterlink;
        $dtUpload->instagramlink = $request->instagramlink;
        $dtUpload->linkedinlink = $request->linkedinlink;

        
        $dtUpload->save();

        return redirect('datacontactus')->with('success', 'Data Changed Successfully!');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function storecard2(Request $request)
    {

        $dtUpload = new ContactUsCard2;
        
        $dtUpload->cardtitle = $request->cardtitle;
        $dtUpload->carddescription = $request->carddescription;

        
        $dtUpload->save();

        return redirect('datacontactus')->with('success', 'Data Updated Successfully!');


    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // //get post by ID
        // $projectpage = ContactUsCard1::findOrFail($id);

        // //render view with post
        // return view('dashboards.contacts.showproject', compact('projectpage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dt = ContactUsCard1::findorfail($id);
        return view('dashboards.ContactUs.editcontactuscard1',compact('dt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editcard2($id)
    {
        $dt = ContactUsCard2::findorfail($id);
        return view('dashboards.ContactUs.editcontactuscard2',compact('dt'));
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ubah = ContactUsCard1::findorfail($id);

        $dt = [
            'cardtitle' => $request['cardtitle'],
            'carddescription' => $request['carddescription'],
            'day' => $request['day'],
            'time' => $request['time'],
            'phonenumber' => $request['phonenumber'],
            'emailaddress' => $request['emailaddress'],
            'locationaddress' => $request['locationaddress'],
            'facebooklink' => $request['facebooklink'],
            'twitterlink' => $request['twitterlink'],
            'instagramlink' => $request['instagramlink'],
            'linkedinlink' => $request['linkedinlink'],

        ];
        $ubah->update($dt);
        return redirect('datacontactus')->with('success', 'Data Updated Successfully!');
        
    }

     /**
     * Update the specified resource in storage.
     */
    public function updatecard2(Request $request, string $id)
    {
        $ubah = ContactUsCard2::findorfail($id);

        $dt = [
            'cardtitle' => $request['cardtitle'],
            'carddescription' => $request['carddescription'],
            
        ];
        $ubah->update($dt);
        return redirect('datacontactus')->with('success', 'Data Updated Successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ContactUsCard2::findorfail($id);
        
        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroycard2(string $id)
    {
        $delete = ContactUsCard2::findorfail($id);
        //hapus data di database
        $delete->delete();
        return back()->with('info','Data Deleted Successfully');

    }
    


}
