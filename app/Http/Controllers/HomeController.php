<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Types;
use App\Models\Homepage;
use App\Models\About;
use App\Models\Service;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        return view('Dashboard.Product.products',compact('product'));
        // return redirect()->route('admin');
    }
    public function user()
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
}
