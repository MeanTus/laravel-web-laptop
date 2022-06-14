<?php

namespace App\Http\Controllers;

use App\Models\CPU;
use Illuminate\Http\Request;

class CPUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cpu = CPU::query()
            ->select('*', 'cpu.id as cpu_id')
            ->get();
        return view('admin.list.list-cpu', ['list_cpu' => $cpu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-edit.add-edit-cpu', ['cpu' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CPU::query()->create($request->except('_token'));
        return redirect()->route('admin.cpu')->with('success', 'Thêm CPU thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function show(CPU $cPU)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function edit(CPU $cPU)
    {
        return view('admin.add-edit.add-edit-cpu', ['cpu' => $cPU]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CPU $cPU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function destroy(CPU $cPU)
    {
        //
    }
}
