<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
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
            $manufacturer_column = array_slice($visible_columns, 2, 1);

            return view('pages.management.manufacturers.create', compact('manufacturer_column'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

            $manufacturer = new Manufacturer;
            $manufacturer->name = $request->name;
            $manufacturer->save();

            session::flash('success-manufacturer', 'Manufacturer added successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Manufacturer added successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($manufacturer_id, Request $request)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $manufacturer = Manufacturer::find($manufacturer_id);
            
            if ($manufacturer == null) {
                return redirect()->route('pages.management.index');
            }

            return view('pages.management.manufacturers.edit', compact('manufacturer'));
        } else {
            return redirect()->back();
        }
    }

    public function update($manufacturer_id, Request $request)
    {
        $manufacturer = Manufacturer::find($manufacturer_id);

        if ($manufacturer == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

            $manufacturer->name = $request->name;
            $manufacturer->save();

            session::flash('success-manufacturer', 'Manufacturer updated successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Manufacturer updated successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($manufacturer_id, Request $request)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $manufacturer = Manufacturer::find($manufacturer_id);

            if ($manufacturer == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }

            $manufacturer->delete();

            session::flash('success-manufacturer', 'Manufacturer deleted successfully.');

            return redirect()->route('pages.management.index');
        } else {
            return redirect()->back();
        }
    }
}
