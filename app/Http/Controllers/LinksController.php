<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Link as LinkResource;
use App\Model\Link;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LinkResource(Link::all());
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
     *
     */
    public function store(Request $request)
    {
        if ( ! $request->has('url')) {
            return response()->json('the field url is required');
        }

        $data = [
            'url' => $request->get('url')
        ];

        $link = Link::create($data);

        return response()->json([
            'message' => 'Link created'
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $link = Link::findOrFail($id);

        return response()->json([
            'data' => $link
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return
     */
    public function update(Request $request, $id)
    {
        $link = Link::findOrFail($id);

        $data = [
            'url' => $request->get('url')
        ];

        $link->update($data);

        return response()->json([
            'data' => $link
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = Link::findOrFail($id);
        $link->delete();

        return response()->json('link deleted');
    }
}
