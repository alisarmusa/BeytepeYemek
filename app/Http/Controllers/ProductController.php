<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\User;
use Hash;
use Validator;
use Auth;
use DatabaseTransactions;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product/index')->with( 'products', $products );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->product_name = Input::get('product_name');
        $product->product_type = Input::get('product_type');
        $product->product_details = Input::get('product_details');
        $product->price = Input::get('price');

        if($product->save())
        {
            Session::flash('message','Product was successfully created');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('product/create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product/show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product/edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->product_name = Input::get('product_name');
        $product->product_type = Input::get('product_type');
        $product->product_details = Input::get('product_details');
        $product->price = Input::get('price');


        if($product->save())
        {
            Session::flash('message','Product was successfully updated');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
        else
        {
            Session::flash('message','Data is not saved');
            Session::flash('m-class','alert-danger');
            return redirect('product/create');
        }
        DB::transaction(function () {

            $product = DB::table('products')->insertGetId(['product_name' => 'doner']);
             DB::table('products')->insert(['product'=>$product,'product_type' => 'Menu']);

            DB::table('products')->insert(['product'=>$product,'product_detail' => 'Kasarlı']);

            DB::commit();
        });

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::all()->where('product_id','=', $id);

        if(count($order) > 0)
        {
            Session::flash('message','Cannot delete product while its order exists');
            Session::flash('m-class','alert-danger');
            return redirect('product');
        }    
        else
        {
            product::find($id)->delete();

            Session::flash('message','product was successfully deleted');
            Session::flash('m-class','alert-success');
            return redirect('product');
        }
    }
}
