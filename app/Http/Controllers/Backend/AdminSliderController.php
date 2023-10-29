<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AdminSliderController extends Controller
{
    public function index(){
        $data['sliders'] =  Slider::orderBy('id', 'DESC')->get();
        return view('backend.web.slider.index',$data);
    }

    public function create(){
        return view('backend.web.slider.create');

    }

    public function store(Request $request){
        // save Thambnail Image Blog
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1200,700)->save('images/sliders/'.$name_gen);
        $save_url = 'images/sliders/'.$name_gen;

        Slider::insert([
           'title' => @$request->title,
           'description' => @$request->description,
        //    'blog_slug_en' => strtolower(str_replace(' ', '-',$request->blog_title_en)),
        //    'blog_slug_kh' => str_replace(' ', '-', $request->blog_title_kh),
           'image' => @$save_url,
           'status' => 1,
           'created_at' => @Carbon::now(),
           'created_by' => @auth()->id()
        ]);

        return redirect()->route('slider.index')->with('success', 'Create success!'); 
   }

   public function edit($id){
    $slider = Slider::where('id',$id)->first();
    return view('backend.web.slider.edit',compact('slider'));
    }

    public function update(Request $request){
        $oldimg = $request->old_image;
        $id_update = $request->id;

        $data = array();
        $data['title'] = @$request->title;
        $data['description'] = @$request->description;
        $data['updated_at'] = @Carbon::now();
        $data['updated_by'] = @auth()->id();

        $slider_image = $request->file('image');

        if($slider_image){
            @unlink($oldimg);
            $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(780,433)->save('images/sliders/'.$name_gen);
            $data['image'] = 'images/sliders/'.$name_gen;
            Slider::where('id',$id_update)->update($data);
            return redirect()->route('slider.index')->with('info', 'Update success with new image!'); 


        }else{
            $data['image'] = $oldimg;
            Slider::where('id',$id_update)->update($data);
            return redirect()->route('slider.index')->with('info', 'Update success without new image!');
        }
    }

    public function inactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        return redirect()->back()->with('info', 'Inactive Successfully!');    
    }

    public function active($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        return redirect()->back()->with('info', 'Active Successfully!');  
    }

    public function delete($id){
        // remove and delete old image Thambnail
        $slider = Slider::findOrFail($id);
        @unlink($slider->image);
        Slider::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully!');  

    }

}
