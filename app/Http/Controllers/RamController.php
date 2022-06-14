<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use Illuminate\Http\Request;

class RamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ram = Ram::query()
            ->select('*', 'ram.id as ram_id')
            ->get();
        return view('admin.list.list-ram', ['list_ram' => $ram]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-edit.add-edit-ram', [
            'ram' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ram::query()->create($request->except('_token'));
        return redirect()->route('admin.ram')->with('success', "Thêm Ram thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function show(Ram $ram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function edit(Ram $ram)
    {
        return view('admin.add-edit.add-edit-ram', [
            'ram' => $ram
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ram $ram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ram  $ram
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ram $ram)
    {
        //
    }
}
