<?php

namespace App\Http\Controllers;

use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\DataTableColumn;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DataTableColumnController extends Controller
{
    public function index()
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            // get column list of dynamic_data_tables table
            $columns_name = Schema::getColumnListing('dynamic_data_tables');
            // column didn't show (hidden)
            $hidden_columns = ['id', 'Updated At', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
            // except hidden columns, display it
            $visible_columns = array_diff($columns_name, $hidden_columns);
            // display column on table start 0-8st column
            $display_columns = array_slice($visible_columns, 0, 8);
            
            // get data from data_table_columns table which is as a new column name at dynamic_data_tables table
            $columns_name_from_table = DataTableColumn::all();

            return view('dynamic-table.column-management.index', compact('setting_title', 'columns_name', 'visible_columns', 'display_columns', 'columns_name_from_table'));
        } else {
            return redirect()->back();
        }
    }

    public function addColumnName()
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            // get data from data_table_columns table which is as a new column name at dynamic_data_tables table
            $data_table_column = DataTableColumn::all();
            // get data only form column_name row
            $column_name = $data_table_column->pluck('column_name')->toArray();

            return view('dynamic-table.column.add', compact('setting_title', 'column_name'));
        } else {
            return redirect()->back();
        }
    }

    public function saveColumnName(Request $request)
    {
        // save inputted column_name to table 
        $data_table_column = new DataTableColumn();
        $data_table_column->column_name = $request->input('column_name');
        $data_table_column->save();

        return redirect()->route('dynamic-table.column-management.index')
                        ->with('success', 'New Column Created Successfully. Sync with Asset List Table Please..');
    }

    public function edit($selected_column)
    {
        $setting_title = SettingTitle::first();
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            // Fetch the specific data based on the selected_column
            $column_data = DynamicDataTable::select($selected_column)->get();

            return view('dynamic-table.column.edit', compact('setting_title', 'selected_column', 'column_data'));
        } else {
            return redirect()->back();
        }
    }

    public function editNewColumn($id)
    {
        $setting_title = SettingTitle::first();

        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            // Fetch the specific data based on the ID
            $column_data = DataTableColumn::find($id);

            return view('dynamic-table.column-management.edit', compact('setting_title', 'column_data'));
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $selected_column)
    {
        // hold new_column_name request
        $new_column_name = $request->input('new_column_name');
    
        // Lakukan pemrosesan pada $new_column_name sebelum mengubah nama kolom di database
        // Mengonversi teks menjadi huruf kecil
        $formatted_new_column_name = strtolower($new_column_name);
        // Mengganti spasi dengan underscore (_)
        $formatted_new_column_name = str_replace(' ', '_', $formatted_new_column_name);

        // Rename the column in the database using raw SQL
        $table = 'dynamic_data_tables';
        $query = "ALTER TABLE $table CHANGE `$selected_column` `$formatted_new_column_name` VARCHAR(255)";        
        DB::statement($query);
        
        return redirect()->route('dynamic-table.column-management.index')
                        ->with('success', 'Column updated successfully!');
    }

    public function updateNewColumn(Request $request, $id) 
    {
        // Find the specific data based on the ID
        $column_data = DataTableColumn::find($id);
    
        // Update the column data based on user input
        $column_data->column_name = $request->input('column_name');    
        $column_data->save();
    
        return redirect()->route('dynamic-table.column-management.index')
                        ->with('success', 'Column updated successfully!');
    }

    public function destroy($selected_column)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            // Drop the column from the dynamic_data_tables table based on selected_column
            Schema::table('dynamic_data_tables', function (Blueprint $table) use ($selected_column) {
                $table->dropColumn($selected_column);
            });

            return redirect()->route('dynamic-table.column-management.index')
                            ->with('success', 'Column deleted successfully!');
        } else {
            return redirect()->back();
        }       
    }

    public function destroyNewColumn($id) 
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            // Find the specific data based on the ID
            $column_data = DataTableColumn::find($id);
        
            // If the data exists on the table, delete it
            // If the data doesn't exists, return error message
            if ($column_data) {
                $column_data->delete();
                return redirect()->route('dynamic-table.column-management.index')
                                ->with('success', 'Column deleted successfully!');
            } else {
                return redirect()->route('dynamic-table.column-management.index')
                                ->with('error', 'Column not found');
            }
        } else {
            return redirect()->back();
        }
    }
    
    
}
