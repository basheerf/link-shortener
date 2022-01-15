<?php

namespace App\Http\Controllers;

use App\Models\Shortener;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortenLinks=Shortener::latest()->simplePaginate(10);

        return view('links.index',compact('shortenLinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $data['link']=$request->link;
        $data['shortlink']=Str::random(4);

        Shortener::create($data);

        return redirect()->route('links.index')->with('msg','Link Generated');
    }

    public function short($shortlink)
    {

        $link=Shortener::where('shortlink',$shortlink)->first();
        return redirect($link->link);


    }

}
