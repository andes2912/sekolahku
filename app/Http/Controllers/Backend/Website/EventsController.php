<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use ErrorException;
use Session;
use Str;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Events::all();
        return view('backend.website.content.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.content.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        try {
            $image = $request->file('thumbnail');
            $nama_image = time()."_".$image->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/event';
            $image->storeAs($tujuan_upload,$nama_image);

            // Create Slug
            $slug = Str::slug($request->title);

            $event = new Events;
            $event->title       = $request->title;
            $event->slug        = $slug;
            $event->desc        = $request->desc;
            $event->content     = $request->content;
            $event->thumbnail   = $nama_image;
            $event->acara       = $request->acara;
            $event->lokasi      = $request->lokasi;
            $event->save();

            Session::flash('success','Event Berhasil ditambah !');
            return redirect()->route('backend-event.index');
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
        $event = Events::find($id);
        return view('backend.website.content.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        try {
            if ($request->thumbnail) {
                $image = $request->file('thumbnail');
                $nama_image = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/event';
                $image->storeAs($tujuan_upload,$nama_image);
            }
            $event = Events::find($id);
            $event->title       = $request->title;
            $event->desc        = $request->desc;
            $event->content     = $request->content;
            $event->thumbnail   = $nama_image ?? $event->thumbnail;
            $event->acara       = $request->acara ?? $event->acara;
            $event->is_Active   = $request->is_Active;
            $event->lokasi      = $request->lokasi;
            $event->save();

            Session::flash('success','Event Berhasil diupdate !');
            return redirect()->route('backend-event.index');
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
