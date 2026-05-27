<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'store_name' => ['required', 'string', 'max:255'],
            'store_email' => ['required', 'email', 'max:255'],
            'currency' => ['required', 'string', 'max:10'],
            'timezone' => ['required', 'string', 'max:50'],
        ]);

        Session::flash('success', 'Settings saved successfully.');

        return back();
    }
}
