<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MobileDashboardController extends Controller
{
    public function index()
    {
        return view('mobile.dashboard.index');
    }

    public function transaction()
    {
        return view('mobile.transaction.index');
    }

    public function notification()
    {
        return view('mobile.notification.index');
    }

    public function setting()
    {
        return view('mobile.setting.index');
    }
}
