<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'product' => 'required'
        ]);
        // $images = $request->file('image');
        $image = array();
        if($file = $request->file('image')){
            foreach($file as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = 'Products/Images/';
                $image_url = $uploade_path.$image_full_name;
                $file->move($uploade_path,$image_full_name);
                $image[] = $image_url;
            }
        }
        // $newimage = time().$image->getClientOriginalName();
        // $image->move('Products/Images' , $newimage);
        // $newimage = Storage::putFile('newimage', new File('Products/Images/newimage'));
        $description = $request->product;
        $item = Product::where('english_name',$description)->first();
        $image = Images::create([
            'image' => implode('|', $image),
            'product_id' => $item->id
        ]);
        return redirect()->route('admin/showimage');
    }

    /**
     * Display the specified resource.
     */
    public function show(Images $images , $id)
    {
        $image = $images::where('id',$id)->first();
        $productid = $image->product_id;
        return view('Dashboard.Image.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Images $images , $id)
    {
        $product = Product::all();
        $image = Images::where('id',$id)->first();
        return view('Dashboard.Image.edit',compact('product'))->with('image',$image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Images $images , $id)
    {
        $request->validate([
            'image' => 'required',
            'product' => 'required'
        ]);
        $images = array();
        if($file = $request->file('image')){
            foreach($file as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = 'Products/Images/';
                $image_url = $uploade_path.$image_full_name;
                $file->move($uploade_path,$image_full_name);
                $images[] = $image_url;
            }
        }
        // $newimage = time().$image->getClientOriginalName();
        // $image->move('Products/Images' , $newimage);
        // $newimage = Storage::putFile('newimage', new File('Products/Images/newimage'));
        $description = $request->product;
        $item = Product::where('english_name',$description)->first();
        $image = Images::where('id',$id)->update([
            'image' => implode('|', $images),
            'product_id' => $item->id
        ]);
        return redirect()->route('admin/showimage');
        // $image = $request->image;
        // $newimage = time().$image->getClientOriginalName();
        // $image->move('Products/Images' , $newimage);
        // // $newimage = Storage::putFile('newimage', new File('Products/Images/newimage'));
        // $description = $request->product;
        // $item = Product::where('english_name',$description)->first();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Images $images , $id)
    {
        $images::where('id',$id)->delete();
        return redirect()->back();
    }
}
