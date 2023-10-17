<?php

namespace App\Http\Controllers;
use App\Models\Types;
use App\Models\Homepage;
use App\Models\Product;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {
        return view('user.cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function store($id)
    {
        $product = Product::where('id',$id)->first();
        $cartdata = session()->get('cartdata',[]);
        if(isset($cartdata[$id]))
        {
            $cartdata[$id]['quantity']++;
            // return 'hello';
        }
        else
        {
            $cartdata[$id] = [
                'id' => $product->id,
                'name' => $product->english_name ,
                'description' => $product->description ,
                'price' => $product->price ,
                'images' => $product->images ,
                'quantity' => 1
            ];
        }
        session()->put('cartdata',$cartdata);
        // dd($cartdata);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cartdata = session()->get('cartdata',[]);
        if(isset($cartdata[$id]))
        {
            $cartdata[$id]['quantity'] = $request->quantity;
        }
        session()->put('cartdata',$cartdata);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartdata = session()->get('cartdata',[]);
        if(isset($cartdata[$id]))
        {
            unset($cartdata[$id]);
        }
        session()->put('cartdata',$cartdata);
        return redirect()->route('/cart');
    }
    public function checkout()
    {
        session()->pull('cartdata');
        return redirect()->route('/home');
    }

}
