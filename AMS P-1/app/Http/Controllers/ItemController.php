<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
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
            $item_column = array_slice($visible_columns, 1, 1);

            return view('pages.management.items.create', compact('setting_title', 'item_column'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // get all data from dynamic_data_table table
        $dynamic_data_table = DynamicDataTable::all();
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $hidden_columns = ['id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);
        $item_column = array_slice($visible_columns, 0, 1);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

            $item = new Item;
            $item->name = $request->name;
            $item->save();

            session::flash('success-item', 'Option added successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Option added successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($item_id, Request $request)
    {
        $setting_title = SettingTitle::first();
        
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $item = Item::find($item_id);
            // get all data from dynamic_data_table table
            $dynamic_data_table = DynamicDataTable::all();
            // get column list of dynamic_data_tables table
            $data_table_column = Schema::getColumnListing('dynamic_data_tables');
            // column didn't show (hidden)
            $hidden_columns = ['id', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            // except hidden columns, display it
            $visible_columns = array_diff($data_table_column, $hidden_columns);
            $item_column = array_slice($visible_columns, 0, 1);
            
            if ($item == null) {
                return redirect()->route('pages.management.index');
            }

            return view('pages.management.items.edit', compact('setting_title', 'item', 'item_column'));
        } else {
            return redirect()->back();
        }
    }

    public function update($item_id, Request $request)
    {
        $item = Item::find($item_id);
        
        if ($item == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->passes()) {

            $item->name = $request->name;
            $item->save();

            session::flash('success-item', 'Option updated successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Option updated successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($item_id, Request $request)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2
        ])) {
            $item = Item::find($item_id);

            if ($item == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }

            $item->delete();

            session::flash('success-item', 'Option deleted successfully.');

            return redirect()->route('pages.management.index');
        } else {
            return redirect()->back();
        }
    }
}
