<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarafHesabGroupRequest;
use App\Models\TarafHesabGroup;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class TarafHesabGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function fetchData()
    // {
    //     $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
    //     $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
    //     return view('taarife-payeh/taraf-hesab-group.index', compact('categories', 'allCategories'));
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('taraf_hesab_group')) {
            $categories = TarafHesabGroup::where('parent_id', '=', 0)->orderBy('title', 'asc')->get();
            $allCategories = TarafHesabGroup::orderBy('title', 'asc')->get();
            return view('taarife-payeh/taraf-hesab-group.index', compact('categories', 'allCategories'));
        } else {
            return abort(401);
        }
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
        if (Gate::allows('taraf_hesab_group')) {
            // $input = $request->all();
            // $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

            // if ($input['parent_id'] == 0) {
            //     $checkingExsist = TarafHesabGroup::where('title', '=', $request->title)->first();
            //     if ($checkingExsist === null) {
            //         TarafHesabGroup::create($input);
            //         return back();
            //     } else {
            //         dd("EXIST");
            //     }
            // } else {
            //     TarafHesabGroup::create($input);
            //     return back();
            // }

            $taraf_hesab_group = new TarafHesabGroup();
            $taraf_hesab_group->title = $request->input('title');
            $taraf_hesab_group->parent_id = empty($request->input('parent_id')) ? 0 : $request->input('parent_id');

            if ($taraf_hesab_group->parent_id == 0) {
                $checkingExsist = TarafHesabGroup::where('title', '=', $request->title)->first();
                if ($checkingExsist === null) {
                    $taraf_hesab_group->save();
                    return response()->json([
                        'status' => 200,
                        'message' => 'داده جدید ذخیره شد',
                    ]);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => 'داده مورد نظر موجود است',
                    ]);
                }
            } else {
                $taraf_hesab_group->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'داده جدید ذخیره شد',
                ]);
            }
        } else {
            return abort(401);
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
