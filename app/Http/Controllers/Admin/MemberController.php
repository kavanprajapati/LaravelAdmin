<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.members.index');
    }

    public function view()
    {
        $data = Member::where('status', '!=', '2')->orderby('id', 'desc')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" name="sub_chk" class="sub_chk" data-id="' . $data->id . '">';
            })
            ->addColumn('action', function ($data) {
                return '<a href="members/' . $data->id . '" data-id="' . $data->id . '" data-text="member" title="View"><i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;&nbsp;&nbsp;

                <a href="members/' . $data->id . '/edit" data-id="' . $data->id . '" data-text="member" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp;&nbsp;

                <a href="javascript:void(0)" class="single_delete" data-id="' . $data->id . '" data-text="member" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
            })
            ->addColumn('status', function ($data) {
                if ($data->status == 1) {
                    $statuslabel = '<span class="badge badge-success status-label">Active</span>';
                } else {
                    $statuslabel = '<span class="badge badge-warning status-label">Inactive</span>';
                }
                return $statuslabel;
            })
            ->removeColumn('password')
            ->rawColumns(['checkbox', 'status', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    public function Active(Request $request, Member $member)
    {
        $ids = explode(",", $request->ids);
        $isActiated = Member::whereIn('id', $ids)->update(['status' => 1]);
        if (!empty($isActiated)) {
            return response()->json(['responseStatus' => 1]);
        } else {
            return response()->json(['responseStatus' => 0]);
        }
    }

    public function Inactive(Request $request, Member $member)
    {
        $ids = explode(",", $request->ids);
        $isInactiated = Member::whereIn('id', $ids)->update(['status' => 0]);
        if (!empty($isInactiated)) {
            return response()->json(['responseStatus' => 1]);
        } else {
            return response()->json(['responseStatus' => 0]);
        }
    }

    public function deleteAll(Request $request, Member $member)
    {
        $ids = explode(",", $request->ids);
        $isDeleted = Member::whereIn('id', $ids)->update(['status' => 2]);
        if (!empty($isDeleted)) {
            return response()->json(['responseStatus' => 1]);
        } else {
            return response()->json(['responseStatus' => 0]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
