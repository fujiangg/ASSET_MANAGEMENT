<?php

namespace App\Http\Controllers;

use App\Models\SettingTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SettingTitleController extends Controller
{
    public function edit()
    {
        $loggedInUser = Auth::user();
        if ($loggedInUser && in_array($loggedInUser->role_name, [1])) {
            $setting_title = SettingTitle::first();

            return view('settings.index', compact('setting_title'));
        } else {
            return redirect()->back();
        }
    }


    public function update(Request $request)
    {
        $setting_title = SettingTitle::first();

        $setting_title->update([
            'dashboard_name' => $request->input('dashboard_name'),
        ]);

        return redirect()->route('customize-dashboard.edit')
                        ->with('success', 'Dashboard Name Successfully Updated.');
    }
}
