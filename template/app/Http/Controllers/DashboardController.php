<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\DataTable;
use App\Models\Manufacturer;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\PositionStatus;
use App\Models\DynamicDataTable;
use App\Models\ConfigurationStatus;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting_title = SettingTitle::first();

        // get total from all assets and each of category option
        $all_assets = number_format(DynamicDataTable::count(), 0, '.', '.');
        $items = Item::with('dataTables')->get();
        $manufacturers = Manufacturer::with('dataTables')->get();
        $configuration_statuses = ConfigurationStatus::with('dataTables')->get();
        $locations = Location::with('dataTables')->get();
        $position_statuses = PositionStatus::with('dataTables')->get();

        // get all data from dynamic_data_table table
        $dynamic_data_table = DynamicDataTable::all();
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $deleted = DynamicDataTable::whereNull('deleted_at')->get()->toArray();
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        // $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        // $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        // $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        // $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        return view('pages.dashboard', compact('setting_title', 'all_assets', 'items', 'manufacturers', 'configuration_statuses', 'locations', 'position_statuses', 'item_column', 'manufacturer_column', 'configuration_status_column', 'location_column', 'position_status_column'));
    }

    public function getItem($item_id)
    {
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        // array convertion
        $item_status = reset($item_column);

        $data = DynamicDataTable::select($visible_columns)->get()->toArray();
        $item_tables = DynamicDataTable::where($item_status, $item_id)->get();

        return view('dynamic-table.filter-results.item', compact('item_tables', 'data_table_column', 'visible_columns', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column'));
    }

    public function getManufacturer($manufacturer_id)
    {
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        // array convertion
        $manufacturer_status = reset($manufacturer_column);

        $data = DynamicDataTable::select($visible_columns)->get()->toArray();
        $manufacturer_tables = DynamicDataTable::where($manufacturer_status, $manufacturer_id)->get();

        return view('dynamic-table.filter-results.manufacturer', compact('manufacturer_tables', 'data_table_column', 'visible_columns', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column'));
    }

    public function getConfigurationStatus($configuration_status_id)
    {
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        $configuration_status = reset($configuration_status_column);

        $data = DynamicDataTable::select($visible_columns)->get()->toArray();
        // get configuration status data from dynamic_data_table table
        $configuration_tables = DynamicDataTable::where($configuration_status, $configuration_status_id)->get();

        return view('dynamic-table.filter-results.configuration-status', compact('configuration_tables', 'data_table_column', 'visible_columns', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column'));
    }

    public function getLocation($location_id)
    {
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        $location = reset($location_column);

        // get location data from dynamic_data_table table
        $location_tables = DynamicDataTable::where($location, $location_id)->get();

        return view('dynamic-table.filter-results.location', compact('location_tables', 'data_table_column', 'visible_columns', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column'));
    }

    public function getPositionStatus($position_status_id)
    {
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // column didn't show (hidden)
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        $position_status = reset($position_status_column);

        $data = DynamicDataTable::select($visible_columns)->get()->toArray();
        // get position status data from dynamic_data_table table
        $position_status_tables = DynamicDataTable::where($position_status, $position_status_id)->get();

        return view('dynamic-table.filter-results.position-status', compact('position_status_tables', 'data_table_column', 'visible_columns', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column',));
    }

}
