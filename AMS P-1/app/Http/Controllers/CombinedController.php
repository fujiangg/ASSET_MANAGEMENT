<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\Manufacturer;
use App\Models\SettingTitle;
use App\Models\PositionStatus;
use App\Models\DynamicDataTable;
use App\Models\ConfigurationStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class CombinedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting_title = SettingTitle::first();
        
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {

            $configuration_statuses = ConfigurationStatus::all();
            $items = Item::all();
            $locations = Location::all();
            $manufacturers = Manufacturer::all();
            $position_statuses = PositionStatus::all();

            // get all data from dynamic_data_table table
            $dynamic_data_table = DynamicDataTable::all();
            // get column list of dynamic_data_tables table
            $data_table_column = Schema::getColumnListing('dynamic_data_tables');
            // column didn't show (hidden)
            $hidden_columns = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            // except hidden columns, display it
            $visible_columns = array_diff($data_table_column, $hidden_columns);
            $item_column = array_slice($visible_columns, 1, 1);
            $manufacturer_column = array_slice($visible_columns, 2, 1);
            $configuration_status_column = array_slice($visible_columns, 4, 1);
            $location_column = array_slice($visible_columns, 5, 1);
            $position_status_column = array_slice($visible_columns, 7, 1);

            return view('pages.management.index', compact('setting_title', 'configuration_statuses', 'items', 'locations', 'manufacturers', 'position_statuses', 'item_column', 'manufacturer_column', 'configuration_status_column', 'location_column', 'position_status_column',));
        } else {
            return redirect()->back();
        }
    }
}