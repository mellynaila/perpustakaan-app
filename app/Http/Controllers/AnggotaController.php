<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = \App\Models\Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        \App\Models\Anggota::create($request->all());
        return redirect('/anggota');
    }

    public function edit($id)
    {
        $anggota = \App\Models\Anggota::find($id);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $a = \App\Models\Anggota::find($id);
        $a->update($request->all());
        return redirect('/anggota');
    }

    public function delete($id)
    {
        \App\Models\Anggota::find($id)->delete();
        return redirect('/anggota');
    }
}
