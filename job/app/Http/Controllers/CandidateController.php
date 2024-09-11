<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {

        $candidates = Candidate::all();
        return response()->json([
            'message' => 'Candidates retrieved successfully',
            'candidates' => $candidates
        ], 200);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'phone_number' => 'required|string|max:20',
            'resume' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // تشفير كلمة المرور
        $validatedData['password'] = Hash::make($validatedData['password']);

        // إنشاء مرشح جديد
        $candidate = Candidate::create($validatedData);

        // إرجاع استجابة JSON تحتوي على معلومات المرشح الجديد
        return response()->json([
            'message' => 'Candidate registered successfully!',
            'candidate' => $candidate
        ], 201); // رمز الحالة 201 يعني "تم الإنشاء"
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $candidate = Candidate::where('email', $credentials['email'])->first();

        if ($candidate && Hash::check($credentials['password'], $candidate->password)) {
            // تسجيل الدخول بنجاح
            Auth::login($candidate);

            // إرجاع استجابة JSON بنجاح
            return response()->json([
                'message' => 'Login successful!',
                'candidate' => $candidate
            ], 200); // رمز الحالة 200 يعني "نجاح"
        }

        // إذا فشلت عملية تسجيل الدخول
        return response()->json([
            'message' => 'The email or password are incorrect.',
        ], 401); // رمز الحالة 401 يعني "غير مصرح"
    }

    public function show($id)
    {
        $candidate = Candidate::find($id);

        if ($candidate) {
            return response()->json($candidate, 200); // رمز الحالة 200 يعني "نجاح"
        } else {
            return response()->json(['message' => 'Candidate not found'], 404); // رمز الحالة 404 يعني "غير موجود"
        }
    }

    public function update(Request $request, $id)
    {
        $candidate = Candidate::find($id);

        if ($candidate) {
            $validatedData = $request->validate([
                'first_name' => 'sometimes|required|string|max:255',
                'last_name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|email|max:255|unique:candidates,email,' . $id,
                'phone_number' => 'sometimes|required|string|max:20',
                'resume' => 'sometimes|required|string|max:255',
                'password' => 'sometimes|required|string|min:6',
            ]);

            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $candidate->update($validatedData);

            return response()->json($candidate, 200); // رمز الحالة 200 يعني "نجاح"
        } else {
            return response()->json(['message' => 'Candidate not found'], 404); // رمز الحالة 404 يعني "غير موجود"
        }
    }
    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if ($candidate) {
            $candidate->delete();
            return response()->json(['message' => 'Candidate deleted successfully'], 200); // رمز الحالة 200 يعني "نجاح"
        } else {
            return response()->json(['message' => 'Candidate not found'], 404); // رمز الحالة 404 يعني "غير موجود"
        }
    }


}