<?php

namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PositionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function dataTable(){
        return $this->hasMany(DynamicDataTable::class);
    }
    public function dataTables(){
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

        return $this->hasMany(DynamicDataTable::class, $position_status_column);
    }

}
