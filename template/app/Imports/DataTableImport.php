<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\Location;
use App\Models\DataTable;
use App\Models\Manufacturer;
use App\Models\PositionStatus;
use App\Models\DynamicDataTable;
use App\Models\ConfigurationStatus;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataTableImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
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

        // $column_model = new DynamicDataTable();
        // $column_name = $column_model->getFillable();
        // $desired_item_name = $column_name[1];
        // $desired_manufacturer_name = $column_name[2];
        // $desired_serial_number_name = $column_name[3];
        // $desired_configuration_status_name = $column_name[4];
        // $desired_location_name = $column_name[5];
        // $desired_description_name = $column_name[6];
        // $desired_position_status_name = $column_name[7];

        $item_id = $this->getIdFromName($row[$item_column], Item::class);
        $manufacturer_id = $this->getIdFromName($row[$manufacturer_column], Manufacturer::class);
        $configuration_status_id = $this->getIdFromName($row[$configuration_status_column], ConfigurationStatus::class);
        $location_id = $this->getIdFromName($row[$location_column], Location::class);
        $position_status_id = $this->getIdFromName($row[$position_status_column], PositionStatus::class);

        return new DynamicDataTable([
            $item_column => $item_id,
            $manufacturer_column => $manufacturer_id,
            $serial_number_column => $row[$serial_number_column],
            $configuration_status_column => $configuration_status_id,
            $location_column => $location_id,
            $description_column => $row[$description_column],
            $position_status_column => $position_status_id,
            $created_date_column => now(),
        ]);
    }

    private function getIdFromName($name, $modelClass)
    {
        $model = $modelClass::where('name', $name)->first();
        return $model ? $model->id : null;
    }
}
