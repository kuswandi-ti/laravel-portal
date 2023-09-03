<?php

namespace App\Http\Controllers\Mobile;

use App\Models\Dues;
use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileDashboardController extends Controller
{
    public function index()
    {
        $announs = Announcement::where('area_id', getLoggedUser()->area->id)
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $notpaid_dues = Dues::where([
            ['user_id', getLoggedUser()->id],
        ])
            ->sum('dues_amount');

        return view('mobile.dashboard.index', compact('announs', 'notpaid_dues'));
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

    public function showAnnouncement(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('mobile.dashboard.show_announcement', compact('announcement'));
    }
}
