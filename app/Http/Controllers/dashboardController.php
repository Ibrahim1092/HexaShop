<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Types;
// use App\Models\Images;
use App\Models\Product;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function login()
    {
        return view('Dashboard.login');
    }
    public function accept(Request $request)
    {
        $this->validate($request , [
            'email' => 'required|email' ,
            'password' => 'required' ,
            // 'g-recaptcha-response' => 'required|captcha'
        ]);
        $product = Product::all();
        if ($request->email == "ibrahimkousa@yahoo.com" && $request->password == "201711080")
        {
            return view('Dashboard.Product.products',compact('product'));
        }
        else
        {
            return "Error";
        }
    }
    public function index()
    {
        $product = Product::all();
        $latest = Product::latest()->first();
        // $image = Images::all();
        return view('Dashboard.Product.products',compact('product'))->with('latest',$latest);
    }
    public function showdash()
    {
        return view('Dashboard.dashboard');
    }
    public function create()
    {
        $category = Categories::all();
        $class = Types::all();
        return view('Dashboard.Product.addproduct',compact('category'))->with('class',$class);
    }
    public function store(Request $request)
    {
        return view('Dashboard.showproducts');
    }
    public function showcategory()
    {
        $category = Categories::all();
        $latest = Categories::latest()->first();
        return view('Dashboard.Category.category', compact('category'))->with('latest',$latest);
    }
    public function showclass()
    {
        $class = Types::all();
        $latest = Types::latest()->first();
        return view('Dashboard.Class.class',compact('class'))->with('latest',$latest);
    }
    public function createcategory()
    {
        return view('Dashboard.category.addcategory');
    }
    public function storecategory()
    {
        return view('Dashboard.category');
    }
    public function createclass()
    {
        return view('Dashboard.Class.addclass');
    }
    public function storeclass()
    {
        return view('Dashboard.category');
    }
    public function showimage()
    {
        // $image = Images::all();
        // return view('Dashboard.Image.images',compact('image'));
    }
    public function addimage()
    {
        $product = Product::latest()->paginate(10);
        return view('Dashboard.image.addimage',compact('product'));
    }



}
