<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required'
        ]);
        $class = Types::create($request->all());
        return redirect()->route('admin/showclass')->with('Message','New Class Added');
    }
    public function show($id)
    {
        $class = Types::where('id',$id)->first();
        return view('Dashboard.Class.show',compact('class'));
    }
    public function edit($id)
    {
        $class = Types::where('id',$id)->first();
        return view('Dashboard.class.edit',compact('class'));
    }
    public function update(Request $request, $id)
    {
        $class = Types::where('id',$id)->update($request->all());
        return redirect()->route('admin/showclass')->with('Update','The Class Has Been Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Types $types , $id)
    {
        $types->where('id',$id)->delete();
        return redirect()->route('admin/showclass')->with('Deleted','The Class Has Been Deleted');
    }
}
