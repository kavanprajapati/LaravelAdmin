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
        $data = Member::orderby('id','desc')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('checkbox', function ($data) {
            return '<input type="checkbox" class="sub_chk" data-id="'.$data->id.'">';
        })
        ->addColumn('action', function ($data) {
            return '<a href="members/'.$data->id.'" data-id="'.$data->id.'" data-text="member" title="View"><i class="glyphicon glyphicon-eye-open"></i></a> &nbsp;&nbsp;&nbsp;
            <a href="members/'.$data->id.'/edit" data-id="'.$data->id.'" data-text="member" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp;&nbsp;
            <a href="javascript:void(0)" class="single_delete" data-id="'.$data->id.'" data-text="member" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
        })
        ->removeColumn('password')
        ->rawColumns(['checkbox','action'])
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
        return $request->post();
    }

    public function Iactive(Request $request, Member $member)
    {
        //
    }

    public function deleteAll(Request $request, Member $member)
    {
        //
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
