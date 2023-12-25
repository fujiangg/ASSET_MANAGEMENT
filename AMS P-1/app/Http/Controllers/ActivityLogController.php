<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataTable;
use App\Models\ActivityLog;
use App\Models\SettingTitle;
use Illuminate\Http\Request;
use App\Models\DynamicDataTable;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $setting_title = SettingTitle::first();
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $users = User::latest()->get();
            $datatable = DynamicDataTable::onlyTrashed()->paginate(10);
            // $logactivities = LogActivity::oldest()->simplePaginate(5);
            $logactivities = ActivityLog::with('users')->orderBy('id', 'DESC')->simplePaginate(5);

                return view('activity-log.index',compact('setting_title', 'logactivities', 'users', 'datatable'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        } else {
            return redirect()->back();
        }
    }

    /**
     * CREATE
     */
    public function create()
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            return view('pages.data-tables.create');
        } else {
            return redirect()->back();
        }
    }

    /**
     * STORE
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'configuration_status_name' => 'required',
        ]);
      
        ActivityLog::create($request->all());
       
        return redirect()->route('pages.data-tables.index')
                        ->with('success','Item add successfully.');
    }

    /**
     * SHOW
     */
    public function show(ActivityLog $item)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            return view('pages.data-tables.show',compact('item'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * EDIT
     */
    public function edit(ActivityLog $item)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            return view('pages.data-tables.edit',compact('item'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * UPDATE
     */
    public function update(Request $request, ActivityLog $item)
    {
        $request->validate([
            'item_name' => 'required',
            'configuration_status_name' => 'required',
        ]);
      
        $item->update($request->all());
      
        return redirect()->route('pages.data-tables.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * DESTROY
     */
    public function destroy(ActivityLog $item)
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1, 2])) {
            $item->delete();
        
            return redirect()->route('pages.data-tables.index')
                            ->with('success','Item deleted successfully');
        } else {
            return redirect()->back();
        }                
    }

    public function log(ActivityLog $logactivity) {
        return view('activity-log.index', [
            'logs' => Activity::where('subject_type', ActivityLog::class)->where('subject_id', $logactivity->id)->latest()->get()
        ]); 
    }
}
