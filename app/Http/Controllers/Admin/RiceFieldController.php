<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Region;
use App\Models\Vestige;
use App\Models\RiceField;
use App\Models\Irrigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiceFieldController extends Controller
{
    public function index(){
        $riceField = RiceField::orderBy('created_at', 'asc')->with(['user', 'vestige', 'irrigation', 'region'])->paginate(10);

        return view('admin.riceFields.riceField',[
            'riceFields' => $riceField,
        ]);
    }

    public function showStore()
    {
        $users = User::where('role', 'user')->orderBy('name', 'asc')->get();
        $vestiges = Vestige::orderBy('vestige', 'asc')->get();
        $irrigations = Irrigation::orderBy('irrigation', 'asc')->get();
        $regions = Region::orderBy('provinsi', 'asc')->get();

        return view('admin.riceFields.riceFieldAdd', [
            'users' => $users,
            'vestiges' => $vestiges,
            'irrigations' => $irrigations,
            'regions' => $regions,
        ]);
    }

    public function showPut(RiceField $riceField)
    {
        $users = User::where('role', 'user')->orderBy('name', 'asc')->get();
        $vestiges = Vestige::orderBy('vestige', 'asc')->get();
        $irrigations = Irrigation::orderBy('irrigation', 'asc')->get();
        $regions = Region::orderBy('provinsi', 'asc')->get();

        return view('admin.riceFields.riceFieldPut', [
            'riceField' => $riceField,
            'users' => $users,
            'vestiges' => $vestiges,
            'irrigations' => $irrigations,
            'regions' => $regions,
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
            'pemilik' => 'required|',
            'vestige' => 'required|',
            'region' => 'required|',
            'irrigation' => 'required|',
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
            'user_id' => $request->pemilik,
            'vestige_id' => $request->vestige,
            'region_id' => $request->region,
            'irrigation_id' => $request->irrigation,
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
            'pemilik' => 'required|',
            'vestige' => 'required|',
            'region' => 'required|',
            'irrigation' => 'required|',
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
                'user_id' => $request->pemilik,
                'vestige_id' => $request->vestige,
                'region_id' => $request->region,
                'irrigation_id' => $request->irrigation,
            ]);

        return redirect()->route('admin.riceFields');
    }
}
