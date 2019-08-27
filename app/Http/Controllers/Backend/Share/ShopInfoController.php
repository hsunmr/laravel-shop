<?php

namespace App\Http\Controllers\Backend\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Share\ShopInfo;
use App\Models\Share\Calendar;

class ShopInfoController extends Controller
{
    public function index(){

        $shopinfo = ShopInfo::all()->first();
        if(empty($shopinfo)){
            ShopInfo::create([
                'title' => 'HSUN COFFEE',
                'address' => 'ADDRESS',
                'tel' => 'TEL',
                'mail' => 'MAIL',
                'businesshours' => 'BUSINESS HOURS',
                'offday' => 'OFF DAY',
                'image' => 'shop_image.png'
            ]);
            $shopinfo = ShopInfo::all()->first();
        }
        $calendars = Calendar::all();
        if($calendars->isEmpty()){
            for ($i = 0; $i<31; $i++) {
                Calendar::create([
                    'offday'=> '1'
                ]);
            }
            $calendars = Calendar::all();
        }

        return view('backend.share.shopinfo',compact('shopinfo','calendars'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=> ['required','string', 'max:50'],
            'address'=> ['required','string', 'max:50'],
            'tel'=> ['required','string', 'max:50'],
            'mail'=> ['required','string', 'max:50'],
            'businesshours'=> ['required','string', 'max:50'],
            'offday'=> ['required','string', 'max:10'],
            'image'=>['image']
        ]);
        $shopinfo = ShopInfo::find($id);
        if ($request->file('image')) {
            //remove original file
            @unlink('uploads/shopinfo/' . $shopinfo->image);

            //set image path ,name and move it to local directory
            $file = $request->file('image');
            $path = public_path() . '/uploads/shopinfo/';
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
        $calendar = Calendar::all();
        $i = 1;
        foreach ($calendar as $day => $value) {
            if ($request->input('day' . $i)=='on') {
                $value->offday = true;
            } else{
                $value->offday = false;
            }
            $value->save();
            $i++;
        }
        return redirect()->route('backend.share.shopinfo.index')
                         ->with('success', 'Update successfully');
    }
}
