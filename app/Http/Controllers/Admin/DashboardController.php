<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $passwords = UserPassword::where('id', $user->id)->first();
        return view('admin.dashboard', compact('user', 'passwords'));
    }
}
