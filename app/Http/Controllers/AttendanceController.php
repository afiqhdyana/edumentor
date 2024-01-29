<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;


class AttendanceController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('attendance.index', compact('subjects'));
    }

    public function viewStudents(Request $request)
    {
        $subjectId = $request->input('subject_id');
        $subject = Subject::findOrFail($subjectId);
    
        // Directly query the subject_student table and join with students
        $students = DB::table('subject_student')
            ->join('students', 'subject_student.matricNo', '=', 'students.matricNo')
            ->where('subject_id', $subjectId)
            ->select('students.*', 'subject_student.status') // Include any other columns you need
            ->get();
    

        $subjects = Subject::all();
    
        return view('attendance.index', compact('subject', 'students', 'subjects'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'attendance_date' => 'required|date',
            // Add any other validation rules for attendance status or other fields
        ]);
    
        // Retrieve subject and students
        $subject = Subject::findOrFail($request->input('subject_id'));
        $students = $subject->students;
    
        // Process attendance for each student
        foreach ($students as $student) {
            // Assuming you have a checkbox for each student in the form
            $attendanceStatus = $request->input('attendance_' . $student->id);
            
            // Store the attendance record for each student
            // You may use the Attendance model to store the records in the database
            Attendance::create([
                'subject_id' => $subject->id,
                'matricNo' => $student->matricNo,
                'attendance_date' => $request->attendance_date,
                'status' => $attendanceStatus,
            ]);
        }
       
    
        // Redirect back to the attendance index page
        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully');

    }
    
}
