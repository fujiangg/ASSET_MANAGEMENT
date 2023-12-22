<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude'
    ];

    public function dataTable(){
        return $this->hasMany(DynamicDataTable::class, 'location');
    }

    public function dataTables(){
        // $table = $this->getTable();
        // $columns = Schema::getColumnListing($table);
        // $excludedColumns = ['created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        // $visible_columns = array_diff($columns, $excludedColumns);
        // $item_column = array_slice($visible_columns, 1, 1);
        // $manufacturer_column = array_slice($visible_columns, 2, 1);
        // $serial_number_column = array_slice($visible_columns, 3, 1);
        // $configuration_status_column = array_slice($visible_columns, 4, 1);
        // $location_column = array_slice($visible_columns, 5, 1);
        // $description_column = array_slice($visible_columns, 6, 1);
        // $position_status_column = array_slice($visible_columns, 7, 1);
        // $fillablecolumns = array_diff($visible_columns, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $description_column, $position_status_column);

        // // Find the first fillable column after exclusion
        // $location_column = null;
        // foreach ($fillablecolumns as $column) {
        //     $location_column = $column;
        //     break;
        // }

        $columns = Schema::getColumnListing('dynamic_data_tables');
        $excludedColumns = ['updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($columns, $excludedColumns);

        $item_column = $visible_columns[1];
        $manufacturer_column = $visible_columns[2];
        $serial_number_column = $visible_columns[3];
        $configuration_status_column = $visible_columns[4];
        $location_column = $visible_columns[5];
        $description_column = $visible_columns[6];
        $position_status_column = $visible_columns[7];
        $created_date_column = $visible_columns[8];

        return $this->hasMany(DynamicDataTable::class, $location_column);
    }
}
