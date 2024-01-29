<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Subject;
use App\Models\Student;
use App\Models\User;



class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::with(['lecturer', 'recipient'])->get();
        // dd($notices);
        return view('notices.index', compact('notices'));

    }



    public function receiveNotices()
{
    $loggedInUserId = auth()->user()->id;

    $allNotices = Notice::with(['lecturer', 'student', 'recipient'])
        ->where(function ($query) use ($loggedInUserId) {
            $query->where('recipient_id', $loggedInUserId)
                  ->orWhere('supervisor_id', $loggedInUserId);
        })
        ->get();

    return view('notices.receive', compact('allNotices'));
}

    



    public function showSendForm()
    {
        $students = Student::with(['personalAdvisor'])->get();

        return view('notices.send', compact('students'));
    }

    // In NoticeController.php
// In NoticeController.php

public function sendNotice(Request $request)
{
    $request->validate([
        'recipient' => 'required|exists:users,id',
        'message' => 'required|string',
        'matricNo' => 'required|exists:students,matricNo',
    ]);

    // Find the user with the given recipient ID
    $recipient = User::find($request->input('recipient'));

    // Find the student based on matricNo (assuming matricNo is passed in the request)
    $student = Student::where('matricNo', $request->input('matricNo'))->first();

    // Check if the recipient and student are found
    if ($recipient && $student) {
        //dd($request->input('message'));
        Notice::create([
            'supervisor_id' => auth()->user()->id,
            'recipient_id' => $recipient->id,
            'matricNo' => $student->matricNo,
            'student_name' => $student->studName, // Include student's name in the notice
            'complaint' => $request->input('message'),
        ]);

        return redirect()->route('notices.send')
            ->with('success', 'Notice sent successfully')
            ->with('studentName', $student->studName); // Pass student's name to the view
    } else {
        // Handle the case where the recipient or student is not found
        return redirect()->route('notices.send')->with('error', 'Recipient or student not found.');
    }
}

    

}