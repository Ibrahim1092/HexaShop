<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::latest()->paginate(1);
        return view('Dashboard.AboutUs.index',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.AboutUs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'limage' => 'required|image',
            'about_us' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'behance' => 'required',
            'slocation' => 'required',
            'whours' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $image = null;
        if($file = $request->file('limage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'About_Us/Images/';
            $image = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        $about = About::create([
            'left_image' => $image,
            'about_us' => $request->about_us,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'behance' => $request->behance,
            'store_location' => $request->slocation,
            'work_hours' =>  $request->whours ,
            'phone' =>  $request->phone ,
            'email' =>  $request->email ,
        ]);
        return redirect()->route('admin/aboutus');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::where('id',$id)->first();
        return view('Dashboard.AboutUs.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , $id)
    {
        $request->validate([
            'limage' => 'required|image',
            'about_us' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'behance' => 'required',
            'slocation' => 'required',
            'whours' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $image = null;
        if($file = $request->file('limage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'About_Us/Images/';
            $image = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        $about = About::where('id',$id)->update([
            'left_image' => $image,
            'about_us' => $request->about_us,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'behance' => $request->behance,
            'store_location' => $request->slocation,
            'work_hours' =>  $request->whours ,
            'phone' =>  $request->phone ,
            'email' =>  $request->email ,
        ]);
        return redirect()->route('admin/aboutus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
