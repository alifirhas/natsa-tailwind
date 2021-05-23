<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function index()
    {
        $verification = Verification::orderBy('created_at', 'asc')->paginate(10);

        return view('admin.verifications.verification', [
            'verifications' => $verification,
        ]);
    }

    public function showStore()
    {
        return view('admin.verifications.verificationAdd');
    }

    public function showPut(Verification $verification)
    {
        return view('admin.verifications.verificationPut', [
            'verification' => $verification,
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'verification_type' => 'required|max:150',
            'desc' => 'required|max:254',
        ]);

        Verification::create([
            'verification_type' => $request->verification_type,
            'desc' => $request->desc,
        ]);

        return redirect()->route('admin.verifications');

    }

    public function destroy(Verification $verification)
    {
        $verification->where('id', $verification->id)->delete();

        return redirect()->route('admin.verifications');

    }

    public function put(Verification $verification, Request $request)
    {
        $this->validate($request, [
            'verification_type' => 'required|max:150',
            'desc' => 'required|max:254',
        ]);

        $verification->where('id', $verification->id)
            ->update([
                'verification_type' => $request->verification_type,
                'desc' => $request->desc,
            ]);

        return redirect()->route('admin.verifications');
    }
}
