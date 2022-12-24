<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserBusinessProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }
}
