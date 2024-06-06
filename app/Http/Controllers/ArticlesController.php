<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required','string','max:200',
            'body' => 'required','string','max:4500',
            'image' => 'nullable','max:2048',
        ],[
            'title' => "Heading field is required",
            'body' => "Content field is required",
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->hashName();
            $filename = $file.'.'.time();
            $path = $request->file('image')->storeAs('images',$filename,'public');
        } else {
            $filename = "";
        }

        DB::table('articles')->insert([
            'user_id' => Auth::user()->id,
            'title' => Str::lower($request->input('title')),
            'body' => Str::lower($request->input('body')),
            'image' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show',[
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit',[
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request,[
            'title' => 'required','string','max:200',
            'body' => 'required','string','max:4500',
            'image' => 'nullable','max:2048',
        ],[
            'title' => "Heading field is required",
            'body' => "Content field is required",
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image')->hashName();
                if (File::exists('storage/images/'.$article->image)) {
                    File::delete('storage/images/'.$article->image);
                }
            $filename = $file.'.'.time();
            $path = $request->file('image')->storeAs('images',$filename,'public');
        } else {
            $filename = "";
        }

        $article->update([
            'title' => Str::lower($request->input('title')),
            'body' => Str::lower($request->input('body')),
            'image' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if(Auth::user()->id === $article->user_id){
            $article->delete();
        }
        return back();
    }
}
