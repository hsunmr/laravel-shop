<?php

namespace App\Http\Controllers\Backend\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\Footer;

class FooterController extends Controller
{
    public function index(){
        $footer = Footer::find(1);
        return view('backend.share.footer',compact('footer'));
    }
    public function update(Request $request){
        $request->validate([
            'footertext'=> ['required','string', 'max:50'],
        ]);
        $footer = Footer::find(1);
        $footer->footertext = $request->input('footertext');
        $footer->save();

        return redirect()->route('backend.share.footer.index')
                         ->with('success', 'Update successfully');
    }
}
