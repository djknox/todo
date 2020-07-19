<?php

namespace App\Http\Controllers;

use App\Item;
use App\Group;
use App\Http\Requests\ItemStoreRequest;

class ItemController extends Controller
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
     * Store a newly created item and relate to the group.
     *
     * @param  \App\Group  $group
     * @param  \App\Http\Requests\ItemStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Group $group, ItemStoreRequest $request)
    {
        $group->items()->create([
            'description' => $request->input('description'),
        ]);

        $group->load('items');

        return response()->json([
            'group'   => $group,
            'message' => 'Item added!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ItemStoreRequest  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemStoreRequest $request, Item $item)
    {
        $item->update([
            'completed' => $request->input('completed'),
        ]);

        return response()->json([
            'group'   => $item->group,
            'message' => 'Item completed!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json([
            'group'   => $item->group,
            'message' => 'Item deleted!'
        ], 200);
    }
}
