<?php

namespace App\Http\Controllers;

use App\Models\dummyCrud;
use Illuminate\Http\Request;

class DummyCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'dummyCruds';
        $data['q'] = $request->get('q');
        $data['dummyCruds'] = dummyCrud::where('customer_name', 'like', '%' . $data['q'] . '%')->get();
        return view('dummyCrud.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add dummyCrud';
        return view('dummyCrud.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'contact_name' => 'required',
        ]);

        $dummyCrud = new dummyCrud($request->all());
        $dummyCrud->save();
        return redirect('dummyCrud')->with('success', 'customer added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dummyCrud  $dummyCrud
     * @return \Illuminate\Http\Response
     */
    public function show(DummyCrud $dummyCrud)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dummyCrud  $dummyCrud
     * @return \Illuminate\Http\Response
     */
    public function edit(DummyCrud $dummyCrud)
    {
        $data['title'] = 'Edit dummyCrud';
        $data['dummyCrud'] = $dummyCrud;
        return view('dummyCrud.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dummyCrud  $dummyCrud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DummyCrud $dummyCrud)
    {
        $request->validate([
            'customer_name' => 'required',
            'contact_name' => 'required',
        ]);

        $dummyCrud->customer_name = $request->customer_name;
        $dummyCrud->contact_name = $request->contact_name;
        $dummyCrud->address = $request->address;
        $dummyCrud->city = $request->city;
        $dummyCrud->save();
        return redirect('dummyCrud')->with('success', 'customer updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dummyCrud  $dummyCrud
     * @return \Illuminate\Http\Response
     */
    public function destroy(DummyCrud $dummyCrud)
    {
        $dummyCrud->delete();
        return redirect('dummyCrud')->with('success', 'customer deleted successfully');
    }
}