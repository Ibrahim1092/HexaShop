<?php

namespace App\Http\Controllers;

use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $home = Homepage::latest()->paginate(1);
        return view('Dashboard.HomePage.index',compact('home'));
    }
    public function edit($id)
    {
        $home = Homepage::where('id',$id)->first();
        // $home = Homepage::latest()->paginate(1);
        return view('Dashboard.HomePage.edit',compact('home'));
    }
    public function update(Request $request , $id)
    {
        $request->validate([
            'limage' => 'required|image',
            'tlimage' => 'required',
            'dlimage' => 'required',
            'mimage' => 'required|image',
            'dmimage' => 'required',
            'wimage' => 'required|image',
            'dwimage' => 'required',
            'kimage' => 'required|image',
            'dkimage' => 'required',
        ]);
        $image_url1 = null;
        $image_url2 = null;
        $image_url3 = null;
        $image_url4 = null;
        if($file = $request->file('limage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url1 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        if($file = $request->file('mimage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url2 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        if($file = $request->file('wimage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url3 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        if($file = $request->file('kimage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url4 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        $home = Homepage::where('id',$id)->update([
            'image_on_left' => $image_url1,
            'title_image_left' => $request->tlimage,
            'description_image_left' => $request->dlimage,
            'men_image' => $image_url2,
            'description_men_image' => $request->dmimage,
            'women_image' => $image_url3 ,
            'description_women_image' => $request->dwimage,
            'kid_image' => $image_url4 ,
            'description_kid_image' => $request->dkimage
        ]);
        return redirect()->route('admin/homepage');
    }
    public function create()
    {
        return view('Dashboard.HomePage.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'limage' => 'required|image',
            'tlimage' => 'required',
            'dlimage' => 'required',
            'mimage' => 'required|image',
            'dmimage' => 'required',
            'wimage' => 'required|image',
            'dwimage' => 'required',
            'kimage' => 'required|image',
            'dkimage' => 'required',
        ]);
        $image_url1 = null;
        $image_url2 = null;
        $image_url3 = null;
        $image_url4 = null;
        if($file = $request->file('limage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url1 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        if($file = $request->file('mimage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url2 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        if($file = $request->file('wimage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url3 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        if($file = $request->file('kimage'))
        {
            $image_name = md5(rand(1000,10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $uploade_path = 'Homepage/Images/';
            $image_url4 = $uploade_path.$image_full_name;
            $file->move($uploade_path,$image_full_name);
        }
        $home = Homepage::create([
            'image_on_left' => $image_url1,
            'title_image_left' => $request->tlimage,
            'description_image_left' => $request->dlimage,
            'men_image' => $image_url2,
            'description_men_image' => $request->dmimage,
            'women_image' => $image_url3 ,
            'description_women_image' => $request->dwimage,
            'kid_image' => $image_url4 ,
            'description_kid_image' => $request->dkimage
        ]);
        return redirect()->route('admin/homepage');
    }
}
