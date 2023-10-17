<?php

namespace App\Http\Controllers;
use App\Models\Types;
use App\Models\Homepage;
use App\Models\Product;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;

class UserInterfaceController extends Controller
{
    public function index()
    {
        $footer = session()->get('footer',[]);
        $Men = Types::where('type',"Man's")->first();
        $Women = Types::where('type',"Woman's")->first();
        $Kids = Types::where('type',"Kids")->first();
        $Mens = Product::where('class_id',$Men->id)->latest()->paginate(10);
        $Womens = Product::where('class_id',$Women->id)->latest()->paginate(10);
        $Kid = Product::where('class_id',$Kids->id)->latest()->paginate(10);
        $class = Types::all();
        $home = Homepage::latest()->paginate(1);
        $about = About::latest()->first();
        $footer = [
            'Store_Location' => $about->store_location,
            'Email' => $about->email,
            'Phone' => $about->phone,
            'Facebook' => $about->facebook,
            'Instagram' => $about->instagram,
            'Behance' => $about->behance
        ];
        session()->put('footer',$footer);
        return view('user.index',compact('Mens'))->with('women',$Womens)->with('kids',$Kid)->With('class',$class)->with('home',$home)->with('about',$about);
    }
    public function ourproduct()
    {
        $home = Homepage::latest()->paginate(1);
        $class = Types::all();
        return view('user.class',compact('class'))->with('home',$home);
    }
    public function aboutus()
    {
        $about = About::latest()->first();
        $service = Service::all();
        return view('user.about',compact('about'))->with('service',$service);
    }
    public function contactus()
    {
        $about = About::latest()->first();
        return view('user.contact',compact('about'));
    }
    public function categories($id)
    {
        $product = Product::where('class_id',$id)->latest()->paginate(10);
        return view('user.category',compact('product'));
    }
    public function product($class_id , $category_id)
    {
        $product = Product::where('class_id',$class_id)->where('category_id',$category_id)->paginate(10);
        return view('user.products',compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function singleproduct($slug)
    {
        $product = Product::where('slug',$slug)->first();
        return view('user.singleproduct',compact('product'));
    }
}
