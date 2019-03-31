<?php

namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\ProductType;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ProductType::orderby('order')->paginate(5);
        return view('backend.products.product_type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:20'],  
            'type'=>['required','string','max:20'],  
            'order'=>['required','integer']   
        ]);
        ProductType::create([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'order'=>$request->input('order')
        ]);

        return redirect()->route('backend.products.product-type.index')
                         ->with('success','New product type created successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = ProductType::find($id);
        $types = ProductType::all();
        return view('backend.products.product_type.edit',compact('types','type'));
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
        $request->validate([
            'name'=>['required','string','max:20'],  
            'type'=>['required','string','max:20'],  
            'order'=>['required','integer']  
        ]);
        
        $product_type = ProductType::find($id);
        $product_type->name = $request->input('name');
        $product_type->type = $request->input('type');
        $product_type->order = $request->input('order');
        $product_type->save();

        return redirect()->route('backend.products.product-type.index')
                         ->with('success','Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_type = ProductType::find($id);
        $product_type->delete();
        return redirect()->route('backend.products.product-type.index')
                         ->with('success', 'Delete successfully');
    }
}
