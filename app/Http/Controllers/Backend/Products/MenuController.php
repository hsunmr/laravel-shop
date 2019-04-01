<?php

namespace App\Http\Controllers\Backend\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Menu;
use App\Models\Products\ProductType;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderby('type')->paginate(5);
        return view('backend.products.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductType::where('type','Menu')->get();
        return view('backend.products.menu.create',compact('types'));
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
     
        //if do not have menu directory, add it
        if (!file_exists('uploads/menu')) {
            mkdir('uploads/menu', 0755, true);
        }
        //set image path ,name and move it to local directory 
        $file = $request->file('image');

        $path = public_path() . '\uploads\menu\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
        Menu::create([
            'name' =>  $request->input('name'),
            'image'=>$fileName,
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('backend.products.menu.index')
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
        $menu = Menu::find($id);
        return view('backend.products.menu.detail',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = ProductType::where('type','Menu')->get();
        $menu = Menu::find($id);
        return view('backend.products.menu.edit',compact('types','menu'));
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
        $menu = Menu::find($id);
        
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/menu/' . $menu->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '\uploads\menu\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $menu->image =  $fileName;
        }
        $menu->name = $request->input('name');
        $menu->price = $request->input('price');
        $menu->type = $request->input('type');
        $menu->description = $request->input('description');
      
        $menu->save();
        
        return redirect()->route('backend.products.menu.index')
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
        $menu = Menu::find($id);
        //remove img
        @unlink('uploads/menu/' . $menu->image);
        $menu->delete();
        return redirect()->route('backend.products.menu.index')
                         ->with('success', 'Delete successfully');
    }
}
