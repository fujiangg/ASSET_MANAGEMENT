<?php

namespace App\Http\Controllers;

use App\Models\DataTableImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class DataTableImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request){
        if(!empty($request->image)) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();

            $data_tableImage = new DataTableImage();
            $data_tableImage->name = 'NULL';
            $data_tableImage->dynamic_data_table_id = $request->dynamic_data_table_id;
            $data_tableImage->save();

            $imageName = $data_tableImage->id.'.'.$ext;

            $data_tableImage->name = $imageName;
            $data_tableImage->save();

            // First Thumbnail
            $sourcePath = $image->getPathName();
            $destPath = public_path('uploads/data_tables/small/'.$imageName);
            $img = Image::make($sourcePath);
            $img->fit(350,300);
            $img->save($destPath);

            // Second Thumbnail
            $destPath = public_path('uploads/data_tables/large/'.$imageName);
            $img = Image::make($sourcePath);
            $img->resize(1200, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destPath);

            return response()->json([
                'status' => true,
                'image_id' => $data_tableImage->id,
                'name' => $imageName,
                'imagePath' => asset('uploads/data_tables/small/'.$imageName)
            ]);
        }
    }
    
    public function destroy($image_id, Request $request){
        $image = DataTableImage::find($image_id);

        if (empty($image)) {
            session::flash('error', 'Image not found.');
            return response()->json([
                'status' => false
            ]);
        }

        File::delete(public_path('uploads/data_tables/small/'.$image->name));
        File::delete(public_path('uploads/data_tables/large/'.$image->name));

        $image->delete();

        session::flash('success', 'Image deleted successfully.');

        return response()->json([
            'status' => true
        ]);
    }
}
