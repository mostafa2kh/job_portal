<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\employee;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

class EmployeeController extends Controller
{
    // عرض جميع الموظفين
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }


    public function show($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            return response()->json($employee);
        } else {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'password' => 'required|string|min:6',
            'department' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $employee = Employee::create($validatedData);
        return response()->json([
            'message' => 'Employee registered successfully!',
            'employee' => $employee
        ], 201);
    }


    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $validatedData = $request->validate([
                'first_name' => 'sometimes|required|string|max:255',
                'last_name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|email|max:255|unique:employees,email,' . $id,
                'password' => 'sometimes|required|string|min:6',
                'department' => 'sometimes|required|string|max:255',
                'location' => 'sometimes|required|string|max:255',
                'phone_number' => 'sometimes|required|string|max:20',
            ]);

            if (isset($validatedData['password'])) {
                $validatedData['password'] = bcrypt($validatedData['password']);
            }

            $employee->update($validatedData);
            return response()->json($employee);
        } else {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $employee->delete();
            return response()->json(['message' => 'Employee deleted']);
        } else {
            return response()->json(['message' => 'Employee not found'], 404);
        }
    }
    public function login(Request $request)
    {
        // التحقق من البيانات المدخلة
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // محاولة تسجيل الدخول باستخدام البيانات المدخلة
        $employee = Employee::where('email', $credentials['email'])->first();

        if ($employee && Hash::check($credentials['password'], $employee->password)) {
            // تسجيل الدخول بنجاح
            Auth::login($employee);
            session(['user_id' => $employee->id]);

            // إرجاع استجابة JSON تتضمن معلومات المستخدم
            return response()->json([
                'message' => 'Login successful!',
                'user' => $employee
            ], 200); // رمز الحالة 200 يعني "نجاح"
        }

        // إذا فشلت عملية تسجيل الدخول
        return response()->json([
            'message' => 'The email or password are incorrect.'
        ], 401); // رمز الحالة 401 يعني "غير مصرح"
    }
}