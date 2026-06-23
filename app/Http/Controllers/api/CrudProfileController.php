<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CrudProfileController extends Controller
{
    public function update(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female',
            'middle_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|digits_between:9,11',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute maximal length is 255 characters.',
            'numeric' => 'The :attribute must be numeric type',
            'string' => 'The :attribute must be words type',
            'date' => 'The :attribute must be type of date'
        ])->validate();
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        User::where('id', $user->id)->update([
            'first_name' => $valid['first_name'],
            'last_name' => $valid['last_name'],
            'middle_name' => $valid['middle_name'],
            'gender' => $valid['gender'],
            'phone' => $valid['phone'],
            'birthday' => $valid['date_of_birth'],
            'address' => $valid['address'],
        ]);
        return response()->json(['message' => 'succes']);
    }

    public function image()
    {
        return response()->json(['message' => 'success']);
    }
}
