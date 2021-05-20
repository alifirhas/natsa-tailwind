<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vestige;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VestigeController extends Controller
{
    public function index(){
        $vestige = Vestige::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.vestiges.vestige',[
            'vestiges' => $vestige,
        ]);
    }

    public function showStore()
    {
        return view('admin.vestiges.vestigeAdd');
    }

    public function showPut(Vestige $vestige)
    {
        return view('admin.vestiges.vestigePut', [
            'vestige' => $vestige,
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'vestige' => 'required|max:150',
        ]);

        Vestige::create([
            'vestige' => $request->vestige,
        ]);

        return redirect()->route('admin.vestiges');

    }

    public function destroy(Vestige $vestige)
    {
        $vestige->where('id', $vestige->id)->delete();

        return redirect()->route('admin.vestiges');

    }

    public function put(Vestige $vestige, Request $request)
    {
        $this->validate($request, [
            'vestige' => 'required|max:150',
        ]);

        $vestige->where('id', $vestige->id)
            ->update([
                'vestige' => $request->vestige,
            ]);

        return redirect()->route('admin.vestiges');
    }
}
