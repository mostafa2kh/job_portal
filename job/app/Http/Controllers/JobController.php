<?php

namespace App\Http\Controllers;
use App\Models\employee;
use App\Models\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'required|array',
        ]);

        $job = new Job();
        $job->employee_id = $request->input('employee_id');
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->skills = json_encode($request->input('skills'));
        $job->save();

        // إعادة التوجيه إلى قائمة الوظائف بدون الحاجة إلى تمرير الـ id
        return response()->json([
            'success' => true,
            'message' => 'Job created successfully!',
            'job' => $job
        ]);
    }



    public function index($id)
    {
        // جلب المعلومات عن الوظائف المرتبطة بالموظف
        $jobs = Job::where('employee_id', $id)->get();

        // جلب معلومات الموظف
        $employee = Employee::find($id);

        // التحقق من وجود الموظف
        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        // إعادة استجابة JSON تحتوي على معلومات الوظائف والموظف
        return response()->json([
            'employee' => $employee,
            'jobs' => $jobs
        ]);
    }
    public function update(Request $request, $id)
    {
        // العثور على الوظيفة المطلوبة
        $job = Job::find($id);

        // التحقق من وجود الوظيفة
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'skills' => 'sometimes|required|array',
        ]);

        // تحديث البيانات
        if (isset($validatedData['skills'])) {
            $validatedData['skills'] = json_encode($validatedData['skills']);
        }
        $job->update($validatedData);

        // إعادة استجابة JSON تحتوي على الوظيفة المحدثة
        return response()->json($job);
    }

    public function destroy($id)
    {
        // العثور على الوظيفة المطلوبة
        $job = Job::find($id);

        // التحقق من وجود الوظيفة
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // حذف الوظيفة
        $job->delete();

        // إعادة استجابة JSON بتأكيد الحذف
        return response()->json(['message' => 'Job deleted successfully']);
    }
    public function show($id)
    {
        // العثور على الوظيفة المطلوبة
        $job = Job::find($id);

        // التحقق من وجود الوظيفة
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);
        }

        // إعادة استجابة JSON تحتوي على تفاصيل الوظيفة
        return response()->json($job);
    }

    public function jobsall()
    {
        // جلب جميع الوظائف من قاعدة البيانات
        $jobs = Job::all();

        // إرجاع استجابة JSON تحتوي على جميع الوظائف
        return response()->json($jobs);
    }

}