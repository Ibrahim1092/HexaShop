<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        return "hello from category controller";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Categories::create($request->all());
        return redirect()->route('admin/showcategory')->with('Message','New Category Added');
    }
    public function show($id)
    {
        $category = Categories::where('id',$id)->first();
        return view('Dashboard.category.show',compact('category'));
    }
    public function edit($id)
    {
        $category = Categories::where('id',$id)->first();
        return view('Dashboard.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Categories::where('id',$id)->update($request->all());
        return redirect()->route('admin/showcategory')->with('Update','The Category Has Been Edited');

    }
    public function destroy(Categories $categories , $id)
    {
        $categories->where('id',$id)->delete();
        return redirect()->route('admin/showcategory')->with('Deleted','The Category Has Been Deleted');
    }
}
