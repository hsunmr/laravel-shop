<?php

namespace App\Http\Controllers\Backend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Home\Carousel;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index(){
        $carousels = Carousel::paginate(5);

        if (empty($carousels))
            return view('backend.home.carousel.index');
        else
            return view('backend.home.carousel.index', compact('carousels'));
    }
    public function create(){
        return view('backend.home.carousel.create');
    }
    public function show($id){
        $carousel = Carousel::find($id);
        return view('backend.home.carousel.detail',compact('carousel'));
    }

    public function store(Request $request)
    { 
        //validation
        $request->validate([
            'name'=> ['required','string', 'max:14'],
            'image_name'=>['required','image']
        ],$messages = [
            'image_name.required'=>'The image field is required.',
            'image_name.image'=>'The image field must be an image.'
        ]);
     
        //if do not have carousel directory, add it
        if (!file_exists('uploads/carousel')) {
            mkdir('uploads/carousel', 0755, true);
        }
        //set image path ,name and move it to local directory 
        $file = $request->file('image_name');

        $path = public_path() . '\uploads\carousel\\';
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);

        Carousel::create([
            'name' =>  $request->input('name'),
            'image_name'=>$fileName
        ]);
        return redirect()->route('backend.home.carousel.index')
                         ->with('success', 'New carousel img created successfully');
                    
    }
    public function edit($id){
        $carousel = Carousel::find($id);
        return view('backend.home.carousel.edit',compact('carousel'));
    }

    public function update(Request $request,$id){

        //validation
        $request->validate([
            'name'=> ['required','string', 'max:14'],
            'image_name'=>['mimes:,jpg,png','max:1000']
        ]);
        $carousel = Carousel::find($id);
        
        if ($request->file('image_name')) {
            //remove original file
            @unlink('uploads/carousel/' . $carousel->image_name);

            //set image path ,name and move it to local directory
            $file = $request->file('image_name');
            $path = public_path() . '\uploads\carousel\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $carousel->image_name =  $fileName;
        }
        $carousel->name = $request->get('name');
        $carousel->save();
        
        return redirect()->route('backend.home.carousel.index')
                         ->with('success', 'Update successfully');
    }

    public function destroy($id){
        $carousel = Carousel::find($id);
        //remove img
        @unlink('uploads/carousel/' . $carousel->image_name);
        $carousel->delete();
        return redirect()->route('backend.home.carousel.index')
                         ->with('success', 'Delete successfully');
    }
    
}
