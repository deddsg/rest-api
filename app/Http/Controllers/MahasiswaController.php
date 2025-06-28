<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Resources\MahasiswaResource;

class MahasiswaController extends Controller
{
   public function index()
{
    $data = Mahasiswa::latest()->get();
    return response()->json(['data' => $data]);
}


    public function store(Request $request)
    {
        $request->validate([
            'nim'        => 'required|string|max:10|unique:mahasiswas',
            'nama'       => 'required|string|max:255',
            'jk'         => 'required|string|max:1',
            'tgl_lahir'  => 'required|date',
            'jurusan'    => 'required|string|max:100',
            'alamat'     => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());

        return (new MahasiswaResource($mahasiswa))->additional([
            'success' => true,
            'message' => 'Mahasiswa created successfully',
        ]);
    }

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswa);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim'       => 'required|string|max:10|unique:mahasiswas,nim,' . $id . ',nim',
            'nama'      => 'required|string|max:255',
            'jk'        => 'required|string|max:1',
            'tgl_lahir' => 'required|date',
            'jurusan'   => 'required|string|max:100',
            'alamat'    => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return (new MahasiswaResource($mahasiswa))->additional([
            'success' => true,
            'message' => 'Mahasiswa updated successfully',
        ]);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return (new MahasiswaResource($mahasiswa))->additional([
            'success' => true,
            'message' => 'Mahasiswa deleted successfully',
        ]);
    }
}
