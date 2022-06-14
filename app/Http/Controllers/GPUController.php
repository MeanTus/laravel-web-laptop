<?php

namespace App\Http\Controllers;

use App\Models\GPU;
use Illuminate\Http\Request;

class GPUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gpu = GPU::query()
            ->select('*', 'gpu.id as gpu_id')
            ->get();
        return view('admin.list.list-gpu', ['list_gpu' => $gpu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-edit.add-edit-gpu', ['gpu' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GPU::query()->create($request->except('_token'));
        return redirect()->route('admin.gpu')->with('success', 'Thêm GPU thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function show(GPU $gPU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function edit(GPU $gPU)
    {
        return view('admin.add-edit.add-edit-gpu', ['gpu' => $gPU]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GPU $gPU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GPU  $gPU
     * @return \Illuminate\Http\Response
     */
    public function destroy(GPU $gPU)
    {
        //
    }
}
