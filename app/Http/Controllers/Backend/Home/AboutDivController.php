<?php

namespace App\Http\Controllers\Backend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Home\AboutDiv;
class AboutDivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutdivs = AboutDiv::paginate(5);
        
        return view('backend.home.aboutdiv.index',compact('aboutdivs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.home.aboutdiv.create');
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
            'title'=> ['required','string', 'max:14'],
            'image'=>['required','image'],
            'text' =>['required','string']
        ],$messages = [

        ]);
     
        //if do not have aboutdiv directory, add it
        if (!file_exists('uploads/aboutdiv')) {
            mkdir('uploads/aboutdiv', 0755, true);
        }
        //set image path ,name and move it to local directory 
        $file = $request->file('image');

        $path = public_path() . '\uploads\aboutdiv\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);

        AboutDiv::create([
            'title' =>  $request->input('title'),
            'image'=>$fileName,
            'text' => $request->input('text')
        ]);
        return redirect()->route('backend.home.aboutdiv.index')
                         ->with('success', 'New about div post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutdiv = AboutDiv::find($id);
        return view('backend.home.aboutdiv.detail',compact('aboutdiv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutdiv = AboutDiv::find($id);
        return view('backend.home.aboutdiv.edit',compact('aboutdiv'));
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
            'title'=> ['required','string', 'max:14'],
            'image'=>['image'],
            'text' =>['string']
        ],$messages = [
        ]);
        $aboutdiv = AboutDiv::find($id);
        
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/aboutdiv/' . $aboutdiv->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '\uploads\aboutdiv\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $aboutdiv->image =  $fileName;
        }
        $aboutdiv->title = $request->get('title');
        $aboutdiv->text = $request->get('text');
        $aboutdiv->save();
        
        return redirect()->route('backend.home.aboutdiv.index')
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
        $aboutdiv = AboutDiv::find($id);
        //remove img
        @unlink('uploads/aboutdiv/' . $aboutdiv->image);
        $aboutdiv->delete();
        return redirect()->route('backend.home.aboutdiv.index')
                         ->with('success', 'Delete successfully');
    }
}
