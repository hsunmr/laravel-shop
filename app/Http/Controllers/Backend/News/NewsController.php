<?php

namespace App\Http\Controllers\Backend\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(5);
        return view('backend.news.index',compact('news'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
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
        if (!file_exists('uploads/newsdiv')) {
            mkdir('uploads/newsdiv', 0755, true);
        }
        //set image path ,name and move it to local directory 
        $file = $request->file('image');

        $path = public_path() . '\uploads\newsdiv\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);

        News::create([
            'title' =>  $request->input('title'),
            'image'=>$fileName,
            'text' => $request->input('text')
        ]);
        return redirect()->route('backend.news.newsdiv.index')
                         ->with('success', 'New news post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('backend.news.detail',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('backend.news.edit',compact('news'));
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
        $news = News::find($id);
        
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/newsdiv/' . $newsdiv->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '\uploads\newsdiv\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $news->image =  $fileName;
        }
        $news->title = $request->input('title');
        $news->text = $request->input('text');
        $news->save();
        
        return redirect()->route('backend.news.newsdiv.index')
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
        $news = News::find($id);
        //remove img
        @unlink('uploads/newsdiv/' . $news->image);
        $news->delete();
        return redirect()->route('backend.news.newsdiv.index')
                         ->with('success', 'Delete successfully');
    }
}
