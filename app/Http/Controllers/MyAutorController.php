<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessToken;

class MyAutorController extends Controller
{
    function index()
    {
        $redirectUrl = 'localhost:8080/auth?response_type=code&client_id=1&redirect_uri=http://localhost:9090/auth';

        return redirect()->away($redirectUrl);
    }

function auth(Request $request)
{

    dd($request->input('code'));

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

        return redirect()->route('author.index');
    }

}
