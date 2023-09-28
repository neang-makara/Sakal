<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsYouth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsYouthController extends Controller
{
    public function index()
    {
        $newsYouth = NewsYouth::all();
        $data = [
            'newsyouth' => $newsYouth
        ];
        return view('backend.newsyouth.create', $data);
    }

    public function createNewsYouthForm(){
        return view('backend.newsyouth.create');
    }

    public function createNewsYouth(Request $request){
        $request->validate([

            'title'=> ['required'],
            'description' => ['required'],
            'image' => ['required'],
            'link' => ['required'],
        ]);

        $newsYouth = new NewsYouth();
        $newsYouth->title = $request->title;
        $newsYouth->description = $request->description;
        $newsYouth->link = $request->link;
        $newsYouth->image = Storage::disk('public')->put('image', $request->image);
        $newsYouth->save();

        return redirect()->route('newsyouth-list')->with('success','Create New Youth Success');
        ;
    }




}
