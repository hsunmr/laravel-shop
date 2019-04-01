<?php

namespace App\Http\Controllers\Backend\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\Shop;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::paginate(5);
        return view('backend.shop.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shop.create');
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
            'address'=> ['required','string'],
            'address_en'=> ['required','string'],
            'tel'=> ['required','string'],
            'open_time'=> ['required','string'],
            'url'=> ['required','string']
        ]);
     
        Shop::create([
            'name' =>  $request->input('name'),
            'address' =>  $request->input('address'),
            'address_en' =>  $request->input('address_en'),
            'tel' =>  $request->input('tel'),
            'open_time' =>  $request->input('open_time'),
            'url' =>  $request->input('url')
        ]);
        return redirect()->route('backend.shop.shop-detail.index')
                         ->with('success', 'New shop created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        return view('backend.shop.detail',compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view('backend.shop.edit',compact('shop'));
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
            'name'=> ['required','string'],
            'address'=> ['required','string'],
            'address_en'=> ['required','string'],
            'tel'=> ['required','string'],
            'open_time'=> ['required','string'],
            'url'=> ['required','string']
        ]);
        $shop = Shop::find($id);
        
      
        $shop->name = $request->input('name');
        $shop->address = $request->input('address');
        $shop->address_en = $request->input('address_en');
        $shop->tel = $request->input('tel');
        $shop->open_time = $request->input('open_time');
        $shop->url = $request->input('url');
        $shop->save();
        
        return redirect()->route('backend.shop.shop-detail.index')
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
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('backend.shop.shop-detail.index')
                         ->with('success', 'Delete successfully');
    }
}
