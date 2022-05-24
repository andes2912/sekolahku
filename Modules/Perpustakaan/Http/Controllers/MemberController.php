<?php

namespace Modules\Perpustakaan\Http\Controllers;

use App\Helpers\GlobalHelpers;
use App\Models\User;
use ErrorException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Perpustakaan\Entities\Member;
use Modules\Perpustakaan\Http\Requests\MemberRequest;

class MemberController extends Controller
{
    use GlobalHelpers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
      $user = User::doesnthave('member')->where('role','Murid')->where('status','Aktif')->get();
      $member = Member::all();
      return view('perpustakaan::backend.member.index', compact('user','member'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('perpustakaan::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(MemberRequest $request)
    {
      try {
        $user = User::where('id', $request->user_id)->first();
        $member = new Member;
        $member->member_code = $this->generateNumber($member,'M');
        $member->user_id  = $request->user_id;
        $member->name     = $user->name;
        $member->save();

        $member->member_code = $this->generateNumber($member,'M');
        $member->save();

        Session::flash('success','Member berhasil ditambah.');
        return back();

      } catch (\ErrorException $e) {
        throw new ErrorException($e->getMessage());
      }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('perpustakaan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('perpustakaan::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
