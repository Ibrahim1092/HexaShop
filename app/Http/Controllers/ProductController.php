<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categories;
use App\Models\Types;
use App\Models\Homepage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'ename' => 'required',
            'aname' => 'required',
            'englishd' => 'required',
            'arabicd' => 'required',
            'price' => 'required',
            'category' => 'required',
            'class' => 'required'
        ]);
        $image = array();
        if($file = $request->file('image')){
            foreach($file as $file)
            {
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = 'Products/Images/';
                $image_url = $uploade_path.$image_full_name;
                $file->move($uploade_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $category_id = Categories::where('name',$request->category)->first();
        $class_id = Types::where('type',$request->class)->first();
        $product_id = Product::create([
            'images' => implode('|',$image),
            'english_name' => $request->ename,
            'arabic_name' => $request->aname,
            'english_description' => $request->englishd,
            'arabic_description' => $request->arabicd,
            'price' => $request->price,
            'slug' => str_slug($request->ename),
            'category_id' => $category_id->id,
            'class_id' => $class_id->id
        ]);
        // $notification = Product::where('id',12)->first();
        // return $notification->images;
        return redirect()->route('admin/show')->with('Message','New Product added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product , $slug)
    {
        $product = Product::Where('slug',$slug)->first();
        return view('Dashboard.Product.show',compact('product'));
    }
    public function edit(Product $product , $slug)
    {
        $product = Product::where('slug',$slug)->first();
        $category = Categories::all();
        $class = Types::all();
        return view('Dashboard.Product.edit',compact('product'))->with('category',$category)->with('class',$class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'image' => 'required',
            'englishn' => 'required',
            'arabicn' => 'required',
            'englishd' => 'required',
            'arabicd' => 'required',
            'price' => 'required',
            'category' => 'required',
            'class' => 'required'
        ]);
        $image = array();
        if($file = $request->file('image')){
            foreach($file as $file)
            {
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = 'Products/Images/';
                $image_url = $uploade_path.$image_full_name;
                $file->move($uploade_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        $category_id = Categories::where('name',$request->category)->first();
        $class_id = Types::where('type',$request->class)->first();
        $product = Product::where('slug',$slug)->update([
            'images' => implode('|',$image),
            'english_name' => $request->englishn,
            'arabic_name' => $request->arabicn,
            'english_description' => $request->englishd,
            'arabic_description' => $request->arabicd,
            'price' => $request->price,
            'category_id' => $category_id->id,
            'class_id' => $class_id->id
        ]);
        return redirect()->route('admin/show')->with('Update','The Product Has Been Edited');
    }
    public function Trashed(Product $product,$id)
    {
        $product->find($id)->delete();
        return redirect()->route('admin/show')->with('Trashed','The Product Has Been Moved To Trash Bin');
    }
    public function trashbin(Product $product)
    {
        $trashed = Product::onlyTrashed()->get();
        return view('Dashboard.Product.TrashBin',compact('trashed'));
    }
    public function destroy(Product $product,$id)
    {
        $product->where('id',$id)->forceDelete();
        return redirect()->back();
    }
    public function restore(Product $product,$id)
    {
        $product->withTrashed()->where('id',$id)->restore();
        return redirect()->back();
    }

}
