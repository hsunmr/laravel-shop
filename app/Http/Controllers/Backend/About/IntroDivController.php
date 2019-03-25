<?php

namespace App\Http\Controllers\Backend\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About\IntroDiv;
class IntroDivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $introdivs = IntroDiv::paginate(5);
        return view('backend.about.introdiv.index',compact('introdivs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.introdiv.create');
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
     
        //if do not have carousel directory, add it
        if (!file_exists('uploads/introdiv')) {
            mkdir('uploads/introdiv', 0755, true);
        }
        //set image path ,name and move it to local directory 
        $file = $request->file('image');

        $path = public_path() . '\uploads\introdiv\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);

        IntroDiv::create([
            'title' =>  $request->input('title'),
            'image'=>$fileName,
            'text' => $request->input('text')
        ]);
        return redirect()->route('backend.about.introdiv.index')
                         ->with('success', 'New intro div post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $introdiv = IntroDiv::find($id);
        return view('backend.about.introdiv.detail',compact('introdiv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $introdiv = IntroDiv::find($id);
        return view('backend.about.introdiv.edit',compact('introdiv'));
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
        $introdiv = IntroDiv::find($id);
        
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/introdiv/' . $introdiv->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '\uploads\introdiv\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $introdiv->image =  $fileName;
        }
        $introdiv->title = $request->get('title');
        $introdiv->text = $request->get('text');
        $introdiv->save();
        
        return redirect()->route('backend.about.introdiv.index')
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
        $introdiv = IntroDiv::find($id);
        //remove img
        @unlink('uploads/introdiv/' . $introdiv->image);
        $introdiv->delete();
        return redirect()->route('backend.about.introdiv.index')
                         ->with('success', 'Delete successfully');
    }
}
