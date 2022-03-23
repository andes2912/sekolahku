<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\VideoRequest;
use ErrorException;
use Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::all();
        return view('backend.website.content.video.index', compact('video'));
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
    public function store(VideoRequest $request)
    {
        try {
            if ($request->is_active == '0') {
                $video = Video::where('is_active','0')->update([
                    'is_active' => '1'
                ]);
            }

            $video = new Video;
            $video->title       = $request->title;
            $video->desc        = $request->desc;
            $video->url         = $request->url;
            $video->is_active   = $request->is_active;
            $video->save();

            Session::flash('success','Video Berhasil ditambah !');
            return redirect()->route('backend-video.index');
        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        return view('backend.website.content.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if ($request->is_active == '0') {
                $video = Video::where('is_active','0')->update([
                    'is_active' => '1'
                ]);
            }

            $video = Video::find($id);
            $video->title       = $request->title ?? $video->title;
            $video->desc        = $request->desc ?? $video->desc;
            $video->url         = $request->url ?? $video->url;
            $video->is_active   = $request->is_active;
            $video->save();

            Session::flash('success','Video Berhasil diupdate !');
            return redirect()->route('backend-video.index');
        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
