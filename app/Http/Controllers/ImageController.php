<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $upload = '';
        if($request->image) {
            $upload = $request->image->store('test');
            echo 'uploaded';
        };

        /* CREATE THE NEW COMPANY */
        $image = new Image(
            [
                'image' => $upload,
                'company_id' => (is_numeric($request->company_id)) ? $request->company_id : null,
                'asset_id' => (is_numeric($request->asset_id)) ? $request->asset_id : null,
                'account_id' => (is_numeric($request->account_id)) ? $request->account_id : null,
                'tenant_id' => (is_numeric($request->tenant_id)) ? $request->tenant_id : null,
                'status_id' => (is_numeric($request->status_id)) ? $request->status_id : null,
            ]
        );

        /* SAVE THE NEW COMPANY TO DATABASE */
        $image->save();
        if (!$image->save()) {
            session()->flash('message', 'Contact Manager. ERROR: Image did not save');
        } else {
            session()->flash('message', 'Image Uploaded Successfully');
        }
        return redirect('/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
