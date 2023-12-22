<?php

namespace App\Http\Controllers;

use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\PositionStatus;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PositionStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            $position_status_column = array_slice($visible_columns, 7, 1);

            return view('pages.management.position-statuses.create', compact('setting_title', 'position_status_column'));
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

            $position_status = new PositionStatus;
            $position_status->name = $request->name;
            $position_status->save();

            session::flash('success-position-status', 'Position Status added successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Position Status added successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($position_status_id, Request $request)
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $position_status = PositionStatus::find($position_status_id);
            
            if ($position_status == null) {
                return redirect()->route('pages.management.index');
            }

            return view('pages.management.position-statuses.edit', compact('setting_title', 'position_status'));
        } else {
            return redirect()->back();
        }
    }

    public function update($position_status_id, Request $request)
    {
        $position_status = PositionStatus::find($position_status_id);

        if ($position_status == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

            $position_status->name = $request->name;
            $position_status->save();

            session::flash('success-position-status', 'Position Status updated successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Position Status updated successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($position_status_id, Request $request)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $position_status = PositionStatus::find($position_status_id);

            if ($position_status == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }

            $position_status->delete();

            session::flash('success-position-status', 'Position Status deleted successfully.');

            return redirect()->route('pages.management.index');
        } else {
            return redirect()->back();
        }
    }
}
