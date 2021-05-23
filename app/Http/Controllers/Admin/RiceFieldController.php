<?php

namespace App\Http\Controllers\Admin;

use App\Models\RiceField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiceFieldController extends Controller
{
    public function index(){
        $riceField = RiceField::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.riceFields.riceField',[
            'riceFields' => $riceField,
        ]);
    }

    public function showStore()
    {
        return view('admin.riceFields.riceFieldAdd');
    }

    public function showPut(RiceField $riceField)
    {
        return view('admin.riceFields.riceFieldPut', [
            'riceField' => $riceField,
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:150',
            'harga' => 'required|max:11',
            'luas' => 'required|max:11',
            'alamat' => 'required|max:1024',
            'deskripsi' => 'required|max:1024',
            'maps' => 'required|max:254',
            'sertifikasi' => 'required|max:20',
            'tipe' => 'required|max:20',
        ]);

        RiceField::create([
            'title' => $request->title,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'luas' => $request->luas,
            'deskripsi' => $request->deskripsi,
            'maps' => $request->maps,
            'sertifikasi' => $request->sertifikasi,
            'tipe' => $request->tipe,
        ]);

        return redirect()->route('admin.riceFields');

    }

    public function destroy(RiceField $riceField)
    {
        $riceField->where('id', $riceField->id)->delete();

        return redirect()->route('admin.riceFields');

    }

    public function put(RiceField $riceField, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:150',
            'harga' => 'required|max:11',
            'luas' => 'required|max:11',
            'alamat' => 'required|max:1024',
            'deskripsi' => 'required|max:1024',
            'maps' => 'required|max:254',
            'sertifikasi' => 'required|max:20',
            'tipe' => 'required|max:20',
        ]);

        $riceField->where('id', $riceField->id)
            ->update([
                'title' => $request->title,
                'harga' => $request->harga,
                'alamat' => $request->alamat,
                'luas' => $request->luas,
                'deskripsi' => $request->deskripsi,
                'maps' => $request->maps,
                'sertifikasi' => $request->sertifikasi,
                'tipe' => $request->tipe,
            ]);

        return redirect()->route('admin.riceFields');
    }
}
