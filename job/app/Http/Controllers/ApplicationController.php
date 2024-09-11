<?php

namespace App\Http\Controllers;

use App\Models\application;
use App\Models\job;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'candidate_id' => 'required|exists:candidates,id',
            'cover_letter' => 'required|string',
        ]);

        // إنشاء طلب جديد
        $application = new Application();
        $application->job_id = $validatedData['job_id'];
        $application->candidate_id = $validatedData['candidate_id'];
        $application->cover_letter = $validatedData['cover_letter'];
        $application->status = 'Pending'; // حالة الطلب الافتراضية
        $application->save();

        // جلب بيانات الوظيفة للتضمين في الاستجابة
        $job = Job::find($validatedData['job_id']);

        return response()->json([
            'message' => 'Application created successfully!',
            'job' => $job,
            'application' => $application
        ], 201);
    }
    public function updateStatus(Request $request, $id)
    {
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'status' => 'required|string|in:Pending,Accepted,Rejected', // Define allowed statuses
            ]);

            // Find the application by ID
            $application = Application::find($id);

            // Check if the application exists
            if (!$application) {
                return response()->json(['message' => 'Application not found'], 404);
            }

            // Update the application status
            $application->status = $validatedData['status'];
            $application->save();

            // Return a JSON response with the updated data
            return response()->json([
                'message' => 'Application status updated successfully!',
                'application' => $application
            ]);

        } catch (\Exception $e) {
            // Return a JSON response with the error message
            return response()->json([
                'message' => 'An error occurred while updating the status.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function showJobAndApplications($id)
    {
        // جلب الوظيفة باستخدام الـ ID
        $job = Job::with('employee')->find($id);

        // تحقق من أن الوظيفة موجودة
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // جلب جميع الطلبات المرتبطة بهذه الوظيفة
        $applications = Application::where('job_id', $id)->with('candidate')->get();

        // استجابة JSON مع تفاصيل الوظيفة والطلبات
        return response()->json([
            'job' => $job,
            'applications' => $applications
        ]);
    }
    public function destroy($id)
    {
        // جلب الطلب باستخدام الـ ID
        $application = Application::find($id);

        // تحقق من أن الطلب موجود
        if (!$application) {
            return response()->json(['message' => 'Application not found'], 404);
        }

        // حذف الطلب
        $application->delete();

        // استجابة JSON عند النجاح
        return response()->json(['message' => 'Application deleted successfully']);
    }

}