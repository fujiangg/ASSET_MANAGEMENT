<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Location;
use App\Models\DataTable;
use App\Models\TempImage;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\DataTableImage;
use App\Models\PositionStatus;
use App\Imports\DataTableImport;
use App\Models\ConfigurationStatus;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Validator;

class DataTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data_tables = DataTable::all();
      
        return view('pages.data-tables.index', compact('data_tables'));
    }

    public function create()
    {
        $item_names = Item::all();
        $manufacturer_names = Manufacturer::all();
        $configuration_status_names = ConfigurationStatus::all();
        $location_names = Location::all();
        $position_status_names = PositionStatus::all();
        return view('pages.data-tables.create', compact('item_names', 'manufacturer_names', 'configuration_status_names', 'location_names', 'position_status_names'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|exists:items,id',
            'manufacturer_name' => 'required|exists:manufacturers,id',
            'serial_number' => 'max:50',
            'configuration_status_name' => 'required|exists:configuration_statuses,id',
            'location_name' => 'required|exists:locations,id',
            'description' => 'max:255',
            'position_status_name' => 'required|exists:position_statuses,id'
        ]);

        if ($validator->passes()) {

            $data_table = new DataTable;
            $data_table->item_name = $request->item_name;
            $data_table->manufacturer_name = $request->manufacturer_name;
            $data_table->serial_number = $request->serial_number;
            $data_table->configuration_status_name = $request->configuration_status_name;
            $data_table->location_name = $request->location_name;
            $data_table->description = $request->description;
            $data_table->position_status_name = $request->position_status_name;
            $data_table->save();

            if (!empty($request->image_id)){
                $caption = $request->caption;
                foreach ($request->image_id as $key => $imageId) {

                    $tempImage = TempImage::find($imageId);
                    $extArray = explode('.',$tempImage->name);
                    $ext = last($extArray);

                    $data_tableImage = new DataTableImage;
                    $data_tableImage->name = 'NULL';
                    $data_tableImage->data_table_id = $data_table->id;
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

            session::flash('success', 'Data added successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Data added successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($data_table_id, Request $request)
    {
        $data_table = DataTable::find($data_table_id);

        if ($data_table == null) {
            return redirect()->route('pages.data-tables.index');
        }
        
        $data_tableImages = DataTableImage::where('data_table_id',$data_table->id)->get();

        $item_names = Item::all();
        $manufacturer_names = Manufacturer::all();
        $configuration_status_names = ConfigurationStatus::all();
        $location_names = Location::all();
        $position_status_names = PositionStatus::all();
        
        return view('pages.data-tables.edit', compact('data_table', 'data_tableImages', 'item_names', 'manufacturer_names', 'configuration_status_names', 'location_names', 'position_status_names'));
    }

    public function update($data_table_id, Request $request)
    {
        $data_table = DataTable::find($data_table_id);

        if ($data_table == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $validator = Validator::make($request->all(), [
            'item_name' => 'required|exists:items,id',
            'manufacturer_name' => 'required|exists:manufacturers,id',
            'serial_number' => 'max:50',
            'configuration_status_name' => 'required|exists:configuration_statuses,id',
            'location_name' => 'required|exists:locations,id',
            'description' => 'max:255',
            'configuration_status_name' => 'required|exists:configuration_statuses,id'
        ]);

        if ($validator->passes()) {

            $data_table->item_name = $request->item_name;
            $data_table->manufacturer_name = $request->manufacturer_name;
            $data_table->serial_number = $request->serial_number;
            $data_table->configuration_status_name = $request->configuration_status_name;
            $data_table->location_name = $request->location_name;
            $data_table->description = $request->description;
            $data_table->position_status_name = $request->position_status_name;
            $data_table->save();

            if (!empty($request->image_id)){
                $caption = $request->caption;

                foreach ($request->image_id as $key => $imageId) {
                    
                    $data_tableImage = DataTableImage::find($imageId);
                    $data_tableImage->caption = $caption[$key];
                    $data_tableImage->save();

                }
            }

            session::flash('success', 'Data updated successfully.');

            return response()->json([
                'status' => true,
                'message' => 'Data updated successfully.'
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function softDelete($data_table_id, Request $request)
    {
        $data_table = DataTable::find($data_table_id);

        if ($data_table == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $data_table->delete();

        session::flash('success', 'Data deleted successfully.');

        return redirect()->route('pages.data-tables.index');
    }

    public function trashed()
    {
        $data_tables = DataTable::onlyTrashed()->get();
      
        return view('pages.data-tables.recycle-bin', compact('data_tables'));
    }

    public function restore($data_table_id, Request $request)
    {
        $data_table = DataTable::whereId($data_table_id);

        if ($data_table == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $data_table->restore();

        session::flash('success', 'Data restored successfully.');

        return redirect()->route('pages.data-tables.recycle-bin');
    }

    public function forceDelete($data_table_id, Request $request)
    {
        $data_table = DataTable::withTrashed()->find($data_table_id);

        if ($data_table == null) {
            return response()->json([
                'status' => false,
                'notFound' => true
            ]);
        }

        $data_table->forceDelete();

        session::flash('success', 'Data deleted permanently successfully.');

        return redirect()->route('pages.data-tables.recycle-bin');
    }

    public function importexcel(Request $request)
    {
        try {
            $this->validate($request, [
                'file' => 'required|mimes:csv,xls,xlsx',
            ]);
    
            $data = $request->file('file');
    
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
    }
    
    public function show($data_table_id, Request $request)
    {
        $data_table = DataTable::find($data_table_id);
        if ($data_table == null) {
            return redirect()->route('pages.data-tables.index');
        }

        $data_tableImages = DataTableImage::where('data_table_id',$data_table->id)->get();

        $item_names = Item::all();
        $manufacturer_names = Manufacturer::all();
        $configuration_status_names = ConfigurationStatus::all();
        $location_names = Location::all();
        $position_status_names = PositionStatus::all();

        return view('pages.data-tables.show', compact('data_table', 'data_tableImages', 'item_names', 'manufacturer_names', 'configuration_status_names', 'location_names', 'position_status_names'));
    }

    public function log(DataTable $item) {
        return view('pages.data-tables.log', [
            'logs' => Activity::where('subject_type', Item::class)->where('subject_id', $item->id)->latest()->get()
        ]);
    }
}
