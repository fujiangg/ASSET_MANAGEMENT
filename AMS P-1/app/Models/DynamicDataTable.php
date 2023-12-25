<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DynamicDataTable extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, Userstamps;

    protected $table = 'dynamic_data_tables';
    
    protected $guarded = [];

    protected $fillable = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable = $this->getFillableColumns();
    }

    protected function getFillableColumns()
    {
        $table = $this->getTable();
        $columns = Schema::getColumnListing($table);

        $excludedColumns = ['id', 'created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $fillablecolumns = array_diff($columns, $excludedColumns);

        return $fillablecolumns;
    }

    public function item(){
        $table = $this->getTable();
        $columns = Schema::getColumnListing($table);
        $excludedColumns = ['created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($columns, $excludedColumns);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $fillablecolumns = array_diff($visible_columns, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column);       

        // Find the first fillable column after exclusion
        $item_column = null;
        foreach ($fillablecolumns as $column) {
            $item_column = $column;
            break;
        }

        return $this->belongsTo(Item::class, $item_column);
    }

    public function manufacturer(){
        $table = $this->getTable();
        $columns = Schema::getColumnListing($table);
        $excludedColumns = ['created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($columns, $excludedColumns);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $fillablecolumns = array_diff($visible_columns, $item_column, $serial_number_column, $configuration_status_column, $location_column, $description_column, $position_status_column);

        // Find the first fillable column after exclusion
        $manufacturer_column = null;
        foreach ($fillablecolumns as $column) {
            $manufacturer_column = $column;
            break;
        }

        return $this->belongsTo(Manufacturer::class, $manufacturer_column);
    }

    public function configuration_status(){
        $table = $this->getTable();
        $columns = Schema::getColumnListing($table);
        $excludedColumns = ['created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($columns, $excludedColumns);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $fillablecolumns = array_diff($visible_columns, $item_column, $manufacturer_column, $serial_number_column, $location_column, $description_column, $position_status_column);

        // Find the first fillable column after exclusion
        $configuration_status_column = null;
        foreach ($fillablecolumns as $column) {
            $configuration_status_column = $column;
            break;
        }

        return $this->belongsTo(ConfigurationStatus::class, $configuration_status_column);
    }

    public function location(){
        $table = $this->getTable();
        $columns = Schema::getColumnListing($table);
        $excludedColumns = ['created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($columns, $excludedColumns);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $fillablecolumns = array_diff($visible_columns, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $description_column, $position_status_column);

        // Find the first fillable column after exclusion
        $location_column = null;
        foreach ($fillablecolumns as $column) {
            $location_column = $column;
            break;
        }

        return $this->belongsTo(Location::class, $location_column);
    }

    public function positionStatus(){
        $table = $this->getTable();
        $columns = Schema::getColumnListing($table);
        $excludedColumns = ['created_date', 'updated_date', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];
        $visible_columns = array_diff($columns, $excludedColumns);
        $item_column = array_slice($visible_columns, 1, 1);
        $manufacturer_column = array_slice($visible_columns, 2, 1);
        $serial_number_column = array_slice($visible_columns, 3, 1);
        $configuration_status_column = array_slice($visible_columns, 4, 1);
        $location_column = array_slice($visible_columns, 5, 1);
        $description_column = array_slice($visible_columns, 6, 1);
        $position_status_column = array_slice($visible_columns, 7, 1);
        $fillablecolumns = array_diff($visible_columns, $item_column, $manufacturer_column, $serial_number_column, $configuration_status_column, $location_column, $description_column);

        // Find the first fillable column after exclusion
        $position_status_column = null;
        foreach ($fillablecolumns as $column) {
            $position_status_column = $column;
            break;
        }

        return $this->belongsTo(PositionStatus::class, $position_status_column);
    }

    protected $dates = ['deleted_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly([
                    'item', 
                    'manufacturer', 
                    'serial_number', 
                    'configuration_status',
                    'location',
                    'description',
                    'position_status',
                    'deleted_date'
                ]) 
                ->setDescriptionForEvent(fn(string $eventName) => "This item has been {$eventName}")
                ->useLogName('Post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
