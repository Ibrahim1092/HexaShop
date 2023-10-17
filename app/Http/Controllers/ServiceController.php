<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::all();
        return view('Dashboard.Services.index',compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.Services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $service = Service::create([
            'Title' => $request->title,
            'Description' => $request->description
        ]);
        return redirect()->route('admin/showservice');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::where('id',$id)->first();
        return view('Dashboard.Services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'Title' => 'required',
            'Description' => 'required'
        ]);
        $service = Service::where('id',$id)->update([
            'Title' => $request->Title,
            'Description' => $request->Description
        ]);
        return redirect()->route('admin/showservice');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service , $id)
    {
        $service->where('id',$id)->delete();
        return redirect()->route('admin/showservice');

    }
}
