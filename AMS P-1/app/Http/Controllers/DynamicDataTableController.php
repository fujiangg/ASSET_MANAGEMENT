<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Location;
use App\Models\TempImage;
use App\Models\Manufacturer;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\DataTableImage;
use App\Models\PositionStatus;
use App\Imports\DataTableImport;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\DB;
use App\Models\ConfigurationStatus;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Validator;

class DynamicDataTableController extends Controller
{
    // Function for initialize middleware
    public function __construct()
    {
        // Only authenticated user can access content of this controller
        $this->middleware('auth');
    }
    
    // Function to display the Asset Management data
    public function index()
    {
        // get dashboard name
        $setting_title = SettingTitle::first();
        // get logged user data 
        $loggedInUser = Auth::user();
        // get all data from dynamic_data_table table
        $dynamic_data_table = DynamicDataTable::all();
        // get column list of dynamic_data_tables table
        $data_table_column = Schema::getColumnListing('dynamic_data_tables');
        // set hidden column
        $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_by'];
        // except hidden columns, display it
        $visible_columns = array_diff($data_table_column, $hidden_columns);

        // get name of each column
        // $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);
        // $deleted_at_column = array_slice($visible_columns, 9, 1);

        // $hidden_new_columns = array_merge($hidden_columns, $id_column, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column, $deleted);
        // $visible_new_columns = array_diff($data_table_column, $hidden_new_columns);
        // $visible = array_diff($visible_columns, $hidden_new_columns);
        
        // Fetching data rows of dynamic_data_table table
        $data = DynamicDataTable::select($visible_columns)->get()->toArray();
        // $new_data = DynamicDataTable::select($visible_new_columns)->get()->toArray();
      
        return view('dynamic-table.index', compact('setting_title', 'loggedInUser','dynamic_data_table', 'data_table_column', 'visible_columns', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column', 'data'));
    }
    
    // Function to sync table of data_table_columns_table with dynamic_data_table when there's new column created
    public function columnSync()
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            // get data only on column_name row became array
            $data_table_columns = DB::table('data_table_columns')->pluck('column_name')->toArray();
        
            // If DB have table, allow to sync
            // IF DB doesn't have table, return error message
            if (Schema::hasTable('dynamic_data_tables')) {
                // get column list of dynamic_data_tables table
                $existing_columns = Schema::getColumnListing('dynamic_data_tables');
                // column didn't show (hidden)
                $hidden_columns = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
                // except hidden columns, display it
                $visible_columns = array_diff($existing_columns, $hidden_columns);

                // get name of each column
                $id_column = array_slice($visible_columns, 0, 1)[0];
                $item_column = array_slice($visible_columns, 1, 1)[0];
                $manufacturer_column = array_slice($visible_columns, 2, 1)[0];
                $serial_number_column = array_slice($visible_columns, 3, 1)[0];
                $configuration_status_column = array_slice($visible_columns, 4, 1)[0];
                $location_column = array_slice($visible_columns, 5, 1)[0];
                $description_column = array_slice($visible_columns, 6, 1)[0];
                $position_status_column = array_slice($visible_columns, 7, 1)[0];
                $created_date_column = array_slice($visible_columns, 8, 1)[0];
                $updated_date_column = array_slice($visible_columns, 9, 1)[0];

                // display column
                $columns_to_preserve = [$hidden_columns, $id_column, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column, $updated_date_column];

                $columns_to_add = array_diff($data_table_columns, $existing_columns);
                $columns_to_delete = array_diff($visible_columns, $data_table_columns);

                // Add New Column
                Schema::table('dynamic_data_tables', function (Blueprint $table) use ($columns_to_add) {
                    foreach ($columns_to_add as $column) {
                        $table->string($column)->nullable();
                    }
                });

                // Delete columns that are not in $data_table_columns and not in $columnsToPreserve
                Schema::table('dynamic_data_tables', function (Blueprint $table) use ($columns_to_delete, $columns_to_preserve) {
                    foreach ($columns_to_delete as $column) {
                        if (!in_array($column, $columns_to_preserve)) {
                            $table->dropColumn($column);
                        }
                    }
                });    
                
                return redirect()->route('dynamic-table.index')
                                ->with('success', 'Kolom di tabel Asset List berhasil disinkronkan.');
            }
            return redirect()->route('dynamic-table.index')
                            ->with('error', 'Tabel Asset List tidak ditemukan.');
        } else {
            return redirect()->back();
        }
    }

    // Function to add new data aset
    public function create()
    {
        // Get dashboard name
        $setting_title = SettingTitle::first();
        // Get logged user data
        $loggedInUser = Auth::user();

        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            // Get data from option table
            $item_names = Item::all();
            $manufacturer_names = Manufacturer::all();
            $configuration_status_names = ConfigurationStatus::all();
            $location_names = Location::all();
            $position_status_names = PositionStatus::all();
            // Get data from dynamic_data_table
            $dynamic_data_table = DynamicDataTable::all();

            // Get column listing from visible column on dynamic_data_table
            $list_column = Schema::getColumnListing('dynamic_data_tables');
            $hidden_columns = ['Updated Date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            $visible_columns = array_diff($list_column, $hidden_columns);
            // Get column name from dynamic_data_table
            // $id_column = array_slice($visible_columns, 0, 1);
            $item_column = array_slice($visible_columns, 1, 1);
            $manufacturer_column = array_slice($visible_columns, 2, 1);
            $serial_number_column = array_slice($visible_columns, 3, 1);
            $configuration_status_column = array_slice($visible_columns, 4, 1);
            $location_column = array_slice($visible_columns, 5, 1);
            $description_column = array_slice($visible_columns, 6, 1);
            $position_status_column = array_slice($visible_columns, 7, 1);
            // $created_date_column = array_slice($visible_columns, 8, 1);
            // $updated_date_column = array_slice($visible_columns, 9, 1);

            // $data_new_column = DB::table('data_table_columns')->pluck('column_name')->toArray();
            // $hidden_new_columns = array_merge($hidden_columns, $id_column, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column, $updated_date_column);
            // $visible_new_columns = array_diff($list_column, $hidden_new_columns);

            return view('dynamic-table.create', compact('setting_title', 'loggedInUser', 'item_names', 'manufacturer_names', 'configuration_status_names', 'location_names', 'position_status_names', 'dynamic_data_table', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column'));
        } else {
            return redirect()->back();
        }
    }

    // Function to saved created data
    public function store(Request $request)
    {
        // Get column listing from visible column on dynamic_data_table
        $list_column = Schema::getColumnListing('dynamic_data_tables');
        $hidden_columns = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($list_column, $hidden_columns);
        // Get column name from dynamic_data_table
        // $id_column = array_slice($visible_columns, 0, 1)[0];
        $item_column = array_slice($visible_columns, 1, 1)[0];
        $manufacturer_column = array_slice($visible_columns, 2, 1)[0];
        $serial_number_column = array_slice($visible_columns, 3, 1)[0];
        $configuration_status_column = array_slice($visible_columns, 4, 1)[0];
        $location_column = array_slice($visible_columns, 5, 1)[0];
        $description_column = array_slice($visible_columns, 6, 1)[0];
        $position_status_column = array_slice($visible_columns, 7, 1)[0];
        // $created_date_column = array_slice($visible_columns, 8, 1)[0];
        // $updated_date_column = array_slice($visible_columns, 9, 1)[0];

        // $hidden_new_columns = array_merge($hidden_columns, [$id_column,$item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column, $updated_date_column]);
        // $visible_new_columns = array_diff($list_column, $hidden_new_columns);

        // Setting rules for each fillable column 
        $rules = [
            $item_column => 'required|exists:items,id',
            $manufacturer_column => 'required|exists:manufacturers,id',
            $serial_number_column => 'max:50',
            $configuration_status_column => 'required|exists:configuration_statuses,id',
            $location_column => 'required|exists:locations,id',
            $description_column => 'max:255',
            $position_status_column => 'required|exists:position_statuses,id',
        ];

        // Ensure $visible_new_columns is an array
        // if (!is_array($visible_new_columns)) {
        //     // If it's a string, convert it to an array with a single element
        //     $visible_new_columns = [$visible_new_columns];
        // }

        // foreach ($visible_new_columns as $column) {
        //     $rules[$column] = 'max:255';
        // }

        // Creating the validators
        $validators = Validator::make($request->all(), $rules);

        if ($validators->passes()) {
            $data_table = new DynamicDataTable;
            foreach ($rules as $field => $rule) {
                // Check if the field exists in the request before assigning
                if ($request->has($field)) {
                    $data_table->{$field} = $request->{$field};
                }
            }
            // Save data
            $data_table->save();

            if (!empty($request->image_id)){
                $caption = $request->caption;
                foreach ($request->image_id as $key => $imageId) {

                    $tempImage = TempImage::find($imageId);
                    $extArray = explode('.',$tempImage->name);
                    $ext = last($extArray);

                    $data_tableImage = new DataTableImage;
                    $data_tableImage->name = 'NULL';
                    $data_tableImage->dynamic_data_table_id = $data_table->id;
                    $data_tableImage->caption = $caption[$key];
                    $data_tableImage->save();

                    $newImageName = $data_tableImage->id.'.'.$ext;
                    $data_tableImage->name = $newImageName;
                    $data_tableImage->save();

                    // First Thumbnail
                    $sourcePath = public_path('uploads/temp/'.$tempImage->name);
                    $destPath = public_path('uploads/data_tables/small/'.$newImageName);
                    $img = Image::make($sourcePath);
                    $img->fit(350,300);
                    $img->save($destPath);

                    // Second Thumbnail
                    $sourcePath = public_path('uploads/temp/'.$tempImage->name);
                    $destPath = public_path('uploads/data_tables/large/'.$newImageName);
                    $img = Image::make($sourcePath);
                    $img->resize(1200, null, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($destPath);
                }
            }
            session::flash('success', 'Data created successfully.');
        } else {
            session::flash('error', 'Record not found.');
        }
        return redirect()->route('dynamic-table.index')
                        ->with('success', 'Data created successfully');
    }

    // Function to edit existing data
    public function edit($id, Request $request)
    {
        // Get dashboard name
        $setting_title = SettingTitle::first();
        // Get logged user data
        $loggedInUser = Auth::user();

        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            // Get data from option table
            $item_names = Item::all();
            $manufacturer_names = Manufacturer::all();
            $configuration_status_names = ConfigurationStatus::all();
            $location_names = Location::all();
            $position_status_names = PositionStatus::all();
            // find id data
            $dynamic_data_table = DynamicDataTable::find($id);

            // Get column listing from visible column on dynamic_data_table
            $list_column = Schema::getColumnListing('dynamic_data_tables');
            $hidden_columns = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            $visible_columns = array_diff($list_column, $hidden_columns);
            // Get column name from dynamic_data_table
            $id_column = array_slice($visible_columns, 0, 1);
            $item_column = array_slice($visible_columns, 1, 1);
            $manufacturer_column = array_slice($visible_columns, 2, 1);
            $serial_number_column = array_slice($visible_columns, 3, 1);
            $configuration_status_column = array_slice($visible_columns, 4, 1);
            $location_column = array_slice($visible_columns, 5, 1);
            $description_column = array_slice($visible_columns, 6, 1);
            $position_status_column = array_slice($visible_columns, 7, 1);
            $created_date_column = array_slice($visible_columns, 8, 1);
            $updated_date_column = array_slice($visible_columns, 9, 1);

            // $hidden_new_columns = array_merge($hidden_columns, $id_column, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column, $updated_date_column);
            // $visible_new_columns = array_diff($list_column, $hidden_new_columns);

            if ($dynamic_data_table == null) {
                return redirect()->route('dynamic-table.index');
            }

            // Get data image
            $dynamic_data_table_images = DataTableImage::where('dynamic_data_table_id', $dynamic_data_table->id)->get();

            return view('dynamic-table.edit', compact('setting_title', 'loggedInUser', 'item_names', 'manufacturer_names', 'configuration_status_names', 'location_names', 'position_status_names', 'dynamic_data_table', 'id_column', 'item_column', 'manufacturer_column', 'serial_number_column','configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column', 'updated_date_column', 'dynamic_data_table_images'));
        } else {
            return redirect()->back();
        }
    }

    // Function to save the edit changes
    public function update($id, Request $request)
    {
        // Find id data
        $dynamic_data_table = DynamicDataTable::find($id);
        // Get column listing from visible column on dynamic_data_table
        $list_column = Schema::getColumnListing('dynamic_data_tables');
        $hidden_columns = ['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($list_column, $hidden_columns);
        // Get column name from dynamic_data_table
        // $id_column = array_slice($visible_columns, 0, 1)[0];
        $item_column = array_slice($visible_columns, 1, 1)[0];
        $manufacturer_column = array_slice($visible_columns, 2, 1)[0];
        $serial_number_column = array_slice($visible_columns, 3, 1)[0];
        $configuration_status_column = array_slice($visible_columns, 4, 1)[0];
        $location_column = array_slice($visible_columns, 5, 1)[0];
        $description_column = array_slice($visible_columns, 6, 1)[0];
        $position_status_column = array_slice($visible_columns, 7, 1)[0];
        // $created_date_column = array_slice($visible_columns, 8, 1)[0];
        // $updated_date_column = array_slice($visible_columns, 9, 1)[0];

        // $hidden_new_columns = array_merge($hidden_columns, [$id_column,$item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column, $updated_date_column]);
        // $visible_new_columns = array_diff($list_column, $hidden_new_columns);

        if ($dynamic_data_table == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        // Setting rules for each fillable column 
        $rules = [
            $item_column => 'required|exists:items,id',
            $manufacturer_column => 'required|exists:manufacturers,id',
            $serial_number_column => 'max:50',
            $configuration_status_column => 'required|exists:configuration_statuses,id',
            $location_column => 'required|exists:locations,id',
            $description_column => 'max:255',
            $position_status_column => 'required|exists:position_statuses,id',
        ];

        // foreach ($visible_new_columns as $column) {
        //     $rules[$column] = 'max:255';
        // }

        // Creating the validator
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $dynamic_data_table = DynamicDataTable::find($id);
        
            if ($dynamic_data_table) {
                foreach ($rules as $field => $rule) {
                    // Check if the field exists in the request before assigning
                    if ($request->has($field)) {
                        $dynamic_data_table->{$field} = $request->{$field};
                    }
                }
                // Save data
                $dynamic_data_table->save();

                if (!empty($request->image_id)){
                    $caption = $request->caption;
    
                    foreach ($request->image_id as $key => $imageId) {
                        
                        $data_tableImage = DataTableImage::find($imageId);
                        $data_tableImage->caption = $caption[$key];
                        $data_tableImage->save();
    
                    }
                }
                session::flash('success', 'Data updated successfully.');
            } else {
                session::flash('error', 'Record not found.');
            }
            return redirect()->route('dynamic-table.index')
                            ->with('success', 'Data updated successfully');
        } 
    }
    
    // Function to show detail data
    public function show($id, Request $request)
    {
        // Get dashboard name
        $setting_title = SettingTitle::first();
        // get logged user data 
        $loggedInUser = Auth::user();

        // Get data from option table
        $item_names = Item::all();
        $manufacturer_names = Manufacturer::all();
        $configuration_status_names = ConfigurationStatus::all();
        $location_names = Location::all();
        $position_status_names = PositionStatus::all();
        // find id data
        $dynamic_data_table = DynamicDataTable::find($id);

        // Get column listing from visible column on dynamic_data_table
        $list_column = Schema::getColumnListing('dynamic_data_tables');
        $hidden_columns = ['Updated Date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($list_column, $hidden_columns);
        // Get column name from dynamic_data_table
        $id_column = array_slice($visible_columns, 0, 1);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $created_date_column = array_slice($visible_columns, 8, 1);

        if ($dynamic_data_table == null) {
            return redirect()->route('dynamic-table.index');
        }

        // Get data image
        $dynamic_data_table_images = DataTableImage::where('dynamic_data_table_id',$dynamic_data_table->id)->get();

        return view('dynamic-table.show', compact('setting_title', 'loggedInUser', 'item_names', 'manufacturer_names', 'configuration_status_names', 'location_names', 'position_status_names', 'dynamic_data_table', 'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column', 'dynamic_data_table_images'));
    }

    public function softDelete($id, Request $request)
    {
        // get logged user data 
        $loggedInUser = Auth::user();

        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $dynamic_data_table = DynamicDataTable::find($id);
            if ($dynamic_data_table == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }
            // Delete data
            $dynamic_data_table->delete();

            return redirect()->route('dynamic-table.index')
                            ->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back();
        }       
    }

    public function trashed()
    {
        // Get dashboard name
        $setting_title = SettingTitle::first();
        // get logged user data 
        $loggedInUser = Auth::user();

        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            // get all data from dynamic_data_table table
            $dynamic_data_table = DynamicDataTable::onlyTrashed()->get();
            // get column list of dynamic_data_tables table
            $data_table_column = Schema::getColumnListing('dynamic_data_tables');
            // hidden column
            $hidden_columns = ['updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            // except hidden columns, display it
            $visible_columns = array_diff($data_table_column, $hidden_columns);

            // get name of each column
            // $id_column = array_slice($visible_columns, 0, 1);
            $item_column = array_slice($visible_columns, 1, 1);
            $manufacturer_column = array_slice($visible_columns, 2, 1);
            $serial_number_column = array_slice($visible_columns, 3, 1);
            $configuration_status_column = array_slice($visible_columns, 4, 1);
            $location_column = array_slice($visible_columns, 5, 1);
            $description_column = array_slice($visible_columns, 6, 1);
            $position_status_column = array_slice($visible_columns, 7, 1);
            $created_date_column = array_slice($visible_columns, 8, 1);

            // $hidden_new_columns = array_merge($hidden_columns, $id_column, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column, $created_date_column);
            // $visible_new_columns = array_diff($data_table_column, $hidden_new_columns);
            // $visible = array_diff($visible_columns, $hidden_new_columns);

            return view('dynamic-table.recycleBin', compact('setting_title', 'loggedInUser', 'dynamic_data_table',  'item_column', 'manufacturer_column', 'serial_number_column', 'configuration_status_column', 'location_column', 'description_column', 'position_status_column', 'created_date_column'));
        } else {
            return redirect()->back();
        }
    }

    // Function to restore deleted data
    public function restore($id, Request $request)
    {
        // get logged user data 
        $loggedInUser = Auth::user();
        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $dynamic_data_table = DynamicDataTable::whereId($id);
            if ($dynamic_data_table == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }
            // Restore data
            $dynamic_data_table->restore();
            session::flash('success', 'Data restored successfully.');

            return redirect()->route('dynamic-table.recycle-bin');
        } else {
            return redirect()->back();
        }
    }

    // Function to delete permanently
    public function forceDelete($id, Request $request)
    {
        // Get logged data user
        $loggedInUser = Auth::user();
        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $dynamic_data_table = DynamicDataTable::withTrashed()->find($id);
            if ($dynamic_data_table == null) {
                return response()->json([
                    'status' => false,
                    'notFound' => true
                ]);
            }
            // Delete permanently
            $dynamic_data_table->forceDelete();
            session::flash('success', 'Data deleted permanently successfully.');

            return redirect()->route('dynamic-table.recycle-bin');
        } else {
            return redirect()->back();
        }
    }


    // Function to import data from excel file
    public function importexcel(Request $request)
    {
        // Get logged user data
        $loggedInUser = Auth::user();
        
        // If user is Superadmin and Admin run this function
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            try {
                // Validasi data type
                $this->validate($request, [
                    'file' => 'required|mimes:csv,xls,xlsx',
                ]);
        
                $data = $request->file('file');
        
                // Set name of files
                $dataname = time() . '.' . $data->getClientOriginalExtension();
                $data->move('imports', $dataname);
        
                Excel::import(new DataTableImport, public_path('/imports/' . $dataname));
        
                $successMessage = 'Data imported successfully.';
                if ($request->expectsJson()) {
                    return response()->json([
                        'status' => true,
                        'message' => $successMessage,
                    ]);
                } else {
                    session::flash('success', $successMessage);
                    return redirect()->back();
                }
            } catch (\Exception $e) {
                $errorMessage = 'Failed to import data.';
                if ($request->expectsJson()) {
                    return response()->json([
                        'status' => false,
                        'message' => $errorMessage,
                    ]);
                } else {
                    session::flash('error', $errorMessage);
                    return redirect()->back();
                }
            }
        } else {
            return redirect()->back();
        }
    }

    // Function to record history / log user action to dynamic_data_table 
    public function log(DynamicDataTable $dynamic_data_table) {
        return view('activity-log.log', [
            'logs' => Activity::where('subject_type', Item::class)->where('subject_id', $dynamic_data_table->id)->latest()->get()
        ]);
    }
}