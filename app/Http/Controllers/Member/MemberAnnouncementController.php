<?php

namespace App\Http\Controllers\Member;

use DomDocument;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\MemberAnnouncementStoreRequest;
use App\Http\Requests\Member\MemberAnnouncementUpdateRequest;

class MemberAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.announcement.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberAnnouncementStoreRequest $request)
    {
        $announcement = new Announcement();

        $dom = new DomDocument();
        $dom->loadHtml($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $image_file = $dom->getElementsByTagName('img');

        foreach($image_file as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $image_data = base64_decode($data);
            $directory = config('common.path_storage') . "/images/announcements/";
            if(!is_dir($directory)) {
                mkdir($directory, 0777);
            }
            $image_name = "/images/announcements/announcements_" . date('Ymdhis').$item.'.png';
            $path = config('common.path_storage') . $image_name;
            file_put_contents($path, $image_data);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $announcement->title = $request->title;
        $announcement->body = $content;
        $announcement->area_id = getLoggedUserAreaId();
        $announcement->created_by = getLoggedUser()->name;
        $announcement->status = 1;
        $announcement->save();

        return redirect()->route('member.announcement.index')->with('success', __('admin.Created announcement successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('member.announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberAnnouncementUpdateRequest $request, string $id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->update([
            'title' => $request->title,
            'body' => $request->body,
            'updated_by' => getLoggedUser()->name,
        ]);

        return redirect()->route('member.announcement.index')->with('success', __('admin.Updated announcement successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $announcement = Announcement::findOrFail($id);

            $announcement->status = 0;
            $announcement->deleted_at = saveDateTimeNow();
            $announcement->deleted_by = getLoggedUser()->name;
            $announcement->save();

            return response([
                'status' => 'success',
                'message' => __('admin.Deleted announcement successfully')
            ]);
        } catch (\Throwable $th) {
            return response([
                'status' => 'error',
                'message' => __('admin.Deleted announcement is error')
            ]);
        }
    }

    public function restore($id)
    {
        $announcement = Announcement::findOrFail($id);

        $announcement->status = 1;
        $announcement->restored_at = saveDateTimeNow();
        $announcement->restored_by = getLoggedUser()->name;
        $announcement->save();

        return redirect()->route('member.announcement.index')->with('success', __('admin.Restore announcement successfully'));
    }

    public function data(Request $request)
    {
        $query = Announcement::where('area_id', getLoggedUser()->area->id)->orderBy('created_at', 'DESC');

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('status', function ($query) {
                return '<div class="badge badge-' . setStatusBadge($query->status) . '">' . setStatusText($query->status) . '</div>';
            })
            ->addColumn('action', function ($query) {
                if ($query->status == 1) {
                    return '
                        <a href="' . route('member.announcement.edit', $query->id) . '" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="' . route('member.announcement.destroy', $query->id) . '" class="btn btn-danger btn-sm delete_item">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    ';
                } else {
                    return '
                        <a href="' . route('member.announcement.restore', $query->id) . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="' . __('admin.Restore to Active') . '">
                            <i class="fas fa-undo"></i>
                        </a>
                    ';
                }
            })
            ->rawColumns(['action'])
            ->escapeColumns([])
            ->make(true);
    }
}
