<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Post;
use Illuminate\Http\Request;

class MyAutorController extends Controller
{
    function index()
    {
        $autors = Autors::all();
        return view('author.index', compact('autors'));

        //dd($autors->posts);
    }

    public function show(Autors $author)
    {
        //dd($author);
        return view('author.show', compact('author'));
    }

    public function edit(Autors $author)
    {
        return view('author.edit', compact('author'));
    }

    public function update(Autors $author)
    {
        $data = request()->validate([
            'firstname' => 'string',
            'lastname' => 'string',
        ]);

        //dd($author);
        $author->update($data);

        return redirect()->route('author.show', $author->id);
    }

    public function create()
    {

        return view('author.create');
        //  dd(11111111);
    }

    public function store()
    {
        $data = request()->validate([
            'firstname' => 'string',
            'lastname' => 'string',
            'age' => 'integer'
        ]);

        // dd($data);
        Autors::create($data);
        return redirect()->route('author.index');
    }

    public function destroy(Autors $author)
    {

        $author->delete();

        //dd(222222222);
        return redirect()->route('author.index');
    }

}
