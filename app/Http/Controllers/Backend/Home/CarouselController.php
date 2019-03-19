<?php

namespace App\Http\Controllers\Backend\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Home\Carousel;

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


    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'=> ['required','string', 'max:14'],
            'image_name'=>['required','mimes:,jpg,png','max:1000']
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
                         ->with('success', 'new biodata created successfully');
                    
    }
    
}
