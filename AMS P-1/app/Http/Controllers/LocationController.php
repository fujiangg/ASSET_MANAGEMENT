<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function marker()
    {
        $locations = Location::all();

        $locationsData = [];
        foreach ($locations as $location) {
            $totalAssets = number_format($location->dataTables->count(), 0, '.', '.');
            
            $locationsData[] = [
                'id' => $location->id,
                'name' => $location->name,
                'address' => $location->address,
                'latitude' => $location->latitude,
                'longitude' => $location->longitude,
                'totalAssets' => $totalAssets,
            ];
        }

        return response()->json($locationsData);
    }

    public function create()
    {
        $setting_title = SettingTitle::first();
        
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            // get all data from dynamic_data_table table
            $dynamic_data_table = DynamicDataTable::all();
            // get column list of dynamic_data_tables table
            $data_table_column = Schema::getColumnListing('dynamic_data_tables');
            // column didn't show (hidden)
            $hidden_columns = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            // except hidden columns, display it
            $visible_columns = array_diff($data_table_column, $hidden_columns);
            $location_column = array_slice($visible_columns, 5, 1);

            return view('pages.management.locations.create', compact('setting_title', 'location_column'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|string|max:25',
            'longitude' => 'required|string|max:25'
        ]);

        if ($validator->passes()) {

            $location = new Location();
            $location->name = $request->name;
            $location->address = $request->address;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->save();

            session::flash('success-location', 'Location added successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Location added successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($location_id, Request $request)
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $location = Location::find($location_id);
            
            if ($location == null) {
                return redirect()->route('pages.management.index');
            }

            return view('pages.management.locations.edit',compact('setting_title', 'location'));
        } else {
            return redirect()->back();
        }
    }

    public function update($location_id, Request $request)
    {
        $location = Location::find($location_id);

        if ($location == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|string|max:25',
            'longitude' => 'required|string|max:25'
        ]);

        if ($validator->passes()) {

            $location->name = $request->name;
            $location->address = $request->address;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->save();

            session::flash('success-location', 'Location updated successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Location updated successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($location_id, Request $request)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $location = Location::find($location_id);

            if ($location == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }

            $location->delete();

            session::flash('success-location', 'Location deleted successfully.');

            return redirect()->route('pages.management.index');
        } else {
            return redirect()->back();
        }
    }
}
