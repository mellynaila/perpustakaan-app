<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = \App\Models\Buku::all();
        return view('buku', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        \App\Models\Buku::create($request->all());
        return redirect('/buku');
    }

    public function edit($id)
    {
        $buku = \App\Models\Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $b = \App\Models\Buku::find($id);
        $b->update($request->all());
        return redirect('/buku');
    }

    public function delete($id)
    {
        \App\Models\Buku::find($id)->delete();
        return redirect('/buku');
    }
}
