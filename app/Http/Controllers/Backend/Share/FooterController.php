<?php

namespace App\Http\Controllers\Backend\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\Footer;

class FooterController extends Controller
{
    public function index(){
        $footer = Footer::all()->first();
        if(empty($footer)){
            Footer::create([
                'footertext' => '© 2019 HSUN All Rights Reserved.'
            ]);
            $footer = Footer::all()->first();
        }
        return view('backend.share.footer',compact('footer'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'footertext'=> ['required','string', 'max:50'],
        ]);
        $footer = Footer::find($id);
        $footer->footertext = $request->input('footertext');
        $footer->save();

        return redirect()->route('backend.share.footer.index')
                         ->with('success', 'Update successfully');
    }
}
