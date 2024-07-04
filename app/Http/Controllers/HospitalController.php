<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodSample;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HospitalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'blood_type' => 'required|string',
            'quantity' => 'required|integer',
            'detail' => 'nullable|string',
        ]);

        $bloodSample = new BloodSample();
        $bloodSample->user_id = Auth::id(); // Assuming authenticated user
        $bloodSample->blood_type = $request->input('blood_type');
        $bloodSample->quantity = $request->input('quantity');
        $bloodSample->detail = $request->input('detail');
        $bloodSample->save();
        $user=Auth::User('name');
        return view('hospital.dashboard',['user'=>$user])->with('success', 'Blood sample added successfully!');
    }

    public function ViewSamples()
    {
        
        
        $bloodSamples = BloodSample::with('hospital') // Eager load hospital relationship
                        ->whereHas('hospital', function ($query) {
                            $query->where('user_type', 'hospital'); // Ensure it's a hospital
                        })
                        ->latest()
                        ->get();


        return view('hospital.viewbloodsample', compact('bloodSamples'));
    }
}
