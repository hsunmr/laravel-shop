<?php

namespace App\Http\Controllers\Backend\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;

class ShopInfoController extends Controller
{
    public function index(){

        $shopinfo = ShopInfo::find(1);
        $calendars = Calendar::all();

        return view('backend.share.shopinfo',compact('shopinfo','calendars'));
    }
    public function update(Request $request){
        $request->validate([
            'title'=> ['required','string', 'max:50'],
            'address'=> ['required','string', 'max:50'],
            'tel'=> ['required','string', 'max:50'],
            'mail'=> ['required','string', 'max:50'],
            'businesshours'=> ['required','string', 'max:50'],
            'offday'=> ['required','string', 'max:10'],
            'image'=>['image']
        ]);
        $shopinfo = ShopInfo::find(1);
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/shopinfo/' . $shopinfo->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '\uploads\shopinfo\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $shopinfo->image =  $fileName;
        }
        $shopinfo->title = $request->input('title');
        $shopinfo->address = $request->input('address');
        $shopinfo->tel = $request->input('tel');
        $shopinfo->mail = $request->input('mail');
        $shopinfo->businesshours = $request->input('businesshours');
        $shopinfo->offday = $request->input('offday');
        $shopinfo->save();

        for($i = 1; $i < 31; $i++){
            $calendar = Calendar::find($i);

            if($request->input('day' . $i)){
                if($request->input('day' . $i)=='on')
                    $calendar->offday = true;
                else {
                    $calendar->offday = $request->input('day' . $i);
                }
                $calendar->save();
            }
        }
        return redirect()->route('backend.share.shopinfo.index')
                         ->with('success', 'Update successfully');
    }
}
