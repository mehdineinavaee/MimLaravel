<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarafHesabGroupRequest;
use App\Models\TarafHesabGroup;
use Illuminate\Http\Request;

class TarafHesabGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
        $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
        return view('taarife-payeh/taraf-hesab-group.index', compact('categories', 'allCategories'));
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
    public function store(TarafHesabGroupRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        if ($input['parent_id'] == 0) {
            $checkingExsist = TarafHesabGroup::where('title', '=', $request->title)->first();
            if ($checkingExsist === null) {
                TarafHesabGroup::create($input);
                return back();
            } else {
                dd("EXIST");
            }
        } else {
            TarafHesabGroup::create($input);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function show(TarafHesabGroup $tarafHesabGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(TarafHesabGroup $tarafHesabGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarafHesabGroup $tarafHesabGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TarafHesabGroup  $tarafHesabGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarafHesabGroup $tarafHesabGroup)
    {
        //
    }
}
