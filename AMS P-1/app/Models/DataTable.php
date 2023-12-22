<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataTable extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, Userstamps;

    protected $guarded = [];

    protected $fillable = [
        'item_name', 
        'manufacturer_name', 
        'serial_number', 
        'configuration_status_name',
        'location_name',
        'description',
        'position_status_name'
    ];

    public function item(){
        return $this->belongsTo(Item::class, 'item_name');
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class, 'manufacturer_name');
    }

    public function configurationStatus(){
        return $this->belongsTo(ConfigurationStatus::class, 'configuration_status_name');
    }

    public function location(){
        return $this->belongsTo(Location::class, 'location_name');
    }

    public function positionStatus(){
        return $this->belongsTo(PositionStatus::class, 'position_status_name');
    }

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
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]) 
                ->setDescriptionForEvent(fn(string $eventName) => "This item has been {$eventName}")
                ->useLogName('Post');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
