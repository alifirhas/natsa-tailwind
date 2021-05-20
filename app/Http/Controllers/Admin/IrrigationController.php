<?php

namespace App\Http\Controllers\Admin;

use App\Models\Irrigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IrrigationController extends Controller
{
    public function index(){
        $irrigation = Irrigation::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.irrigations.irrigation',[
            'irrigations' => $irrigation,
        ]);
    }

    public function showStore()
    {
        return view('admin.irrigations.irrigationAdd');
    }

    public function showPut(Irrigation $irrigation)
    {
        return view('admin.irrigations.irrigationPut', [
            'irrigation' => $irrigation,
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'irrigation' => 'required|max:150',
        ]);

        irrigation::create([
            'irrigation' => $request->irrigation,
        ]);

        return redirect()->route('admin.irrigations');

    }

    public function destroy(Irrigation $irrigation)
    {
        $irrigation->where('id', $irrigation->id)->delete();

        return redirect()->route('admin.irrigations');

    }

    public function put(irrigation $irrigation, Request $request)
    {
        $this->validate($request, [
            'irrigation' => 'required|max:150',
        ]);

        $irrigation->where('id', $irrigation->id)
            ->update([
                'irrigation' => $request->irrigation,
            ]);

        return redirect()->route('admin.irrigations');
    }
}
