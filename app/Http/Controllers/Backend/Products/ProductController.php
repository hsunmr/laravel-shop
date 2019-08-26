<?php

namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use App\Models\Products\ProductType;
use App\Models\ProductsSales;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('type')->paginate(5);
        return view('backend.products.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductType::where('type','Product')->get();
        return view('backend.products.product.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'=> ['required','string'],
            'image'=>['required','image'],
            'price' =>['required','integer'],
            'description' =>['required','string'],
            'type' =>['required','string']
        ]);
     
        //if do not have product directory, add it
        if (!file_exists('uploads/product')) {
            mkdir('uploads/product', 0755, true);
        }
        //set image path ,name and move it to local directory 
        $file = $request->file('image');

        $path = public_path() . '/uploads/product/';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
        Product::create([
            'name' =>  $request->input('name'),
            'image'=>$fileName,
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'description' => $request->input('description')
        ]);
        //product sales table create
        ProductsSales::create([
            'product_name' =>  $request->input('name'),
            'sales_volume'=> '0'
        ]);
        return redirect()->route('backend.products.product.index')
                         ->with('success', 'New product created successfully');
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
        return view('backend.products.product.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = ProductType::where('type','Product')->get();
        $product = Product::find($id);
        return view('backend.products.product.edit',compact('types','product'));
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
        //validation
        $request->validate([
            'name'=> ['string'],
            'image'=>['image'],
            'price' =>['integer'],
            'description' =>['string'],
            'type' =>['required','string']
        ]);
        $product = Product::find($id);
        
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/product/' . $product->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '\uploads\product\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $product->image =  $fileName;
        }
        $old_name = $product->name;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->type = $request->input('type');
        $product->description = $request->input('description');
        $product->save();

        //product sales table update
        $product_sales = ProductsSales::where('product_name',$old_name)->get();
        $product_sales[0]->product_name = $request->input('name');
        $product_sales[0]->save();

        return redirect()->route('backend.products.product.index')
                         ->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        //remove img
        @unlink('uploads/product/' . $product->image);
        $product->delete();
        $product_sales = ProductsSales::where('product_name',$product->name)->get();
        $product_sales[0]->delete();
        return redirect()->route('backend.products.product.index')
                         ->with('success', 'Delete successfully');
    }
}
