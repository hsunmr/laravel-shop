<?php

namespace App\Http\Controllers\Backend\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About\HistoryDiv;

class HistoryDivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historys = HistoryDiv::paginate(5);
        return view('backend.about.historydiv.index',compact('historys'));
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
            'title'=> ['required','string', 'max:14'],
            'text' =>['required','string']
        ]);

        HistoryDiv::create([
            'title'=>$request->input('title'),
            'text'=>$request->input('text'),
        ]);

        return redirect()->route('backend.about.historydiv.index')
                         ->with('success', 'New history div post created successfully');
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
        $history = HistoryDiv::find($id);
        return view('backend.about.historydiv.edit',compact('history'));
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
            'title'=> ['required','string', 'max:14'],
            'text' =>['required','string']
        ]);
        $history = HistoryDiv::find($id);
        $history->title = $request->input('title');
        $history->text = $request->input('text');
        $history->save();
        
        return redirect()->route('backend.about.historydiv.index')
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
        $history = HistoryDiv::find($id);
        $history->delete();
        return redirect()->route('backend.about.historydiv.index')
                         ->with('success', 'Delete successfully');
    }
}
