<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Co_Curiculum;
use App\Models\Contact;
use App\Models\Financial;
use App\Models\Qualification;
use App\Models\Qualification_Detail;
use App\Models\Relative;
use App\Models\Result_Detail;
use App\Models\Results;
use App\Models\Sponsors;
use App\Models\Student;
use App\Models\Student_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\MonthlyUsersChart;
use App\Models\Over_Skills;
use App\Models\Results_Info;
use App\Models\Skills;
use App\Models\User;

class StudentController extends Controller
{
    function show()
    {
        $students= Student::paginate(3);
        
        //dd($students);
      return view ('studInfo', ['students' => $students]);//->with('students', $students);
    }

    function getStudInfo(Request $request, $matricNo)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $details = Student_Detail::where('matricNo', $request->matricNo)->first();
      $cont = Contact::where('matricNo', $request->matricNo)->first();
      $relatives= Relative::where('matricNo', $request->matricNo)->get();
      $qualifications= Qualification::where('matricNo', $request->matricNo)->get();
      $co_curiculums= Co_Curiculum::where('matricNo', $request->matricNo)->get();
      $financials= Financial::where('matricNo', $request->matricNo)->first();
      $activity= Activities::where('matricNo', $request->matricNo)->get();
      return view('studProfile', ['stud' => $stud, 'details' => $details, 'cont' => $cont, 'relatives' => $relatives, 'qualifications'=>$qualifications, 'co_curiculums'=>$co_curiculums, 'financials'=>$financials, 'activity'=>$activity]);
    }

    function getMoreDetail(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $details = Student_Detail::where('matricNo', $request->matricNo)->first();
      return view('moreDetail', ['stud' => $stud, 'details' => $details]);
    }

    function getMoreContact(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $cont = Contact::where('matricNo', $request->matricNo)->first();
      return view('contactMore', ['stud' => $stud,'cont' => $cont ]);
    }

    function getMoreQualification(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $qualifications= Qualification::where('matricNo', $request->matricNo)->get();
      $qual = Qualification_Detail::where('qualification_desc', $request->qualification_desc)->get();
      return view('qualificationMore', ['qualifications' => $qualifications, 'qual' => $qual, 'stud' => $stud ]);
    }

    function getMoreCocuriculum(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $co_curiculums= Co_Curiculum::where('matricNo', $request->matricNo)->get();
      return view('coCuriculum', [ 'stud' => $stud, 'co_curiculums'=>$co_curiculums ]);
    }

    function getMoreRelative(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $relatives= Relative::where('matricNo', $request->matricNo)->get();
      return view('relativesMore', [ 'stud' => $stud, 'relatives' => $relatives ]);
    }

    function getMoreFinance(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $financials= Financial::where('matricNo', $request->matricNo)->first();
      $sponsor= Sponsors::where('matricNo', $request->matricNo)->get();
      return view('financialMore', [ 'stud' => $stud, 'sponsor' => $sponsor, 'financials' => $financials ]);
    }

    function getMoreActivity(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $activity= Activities::where('matricNo', $request->matricNo)->get();
      return view('activityMore', [ 'stud' => $stud, 'activity'=>$activity ]);
    }

    function getMoreResult(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $result=Results::where('matricNo', $request->matricNo)->get();
      
      //$results_details= Result_Detail::where('semester', $request->semester)->get();
      return view('resultMore', [ 'stud' => $stud, 'result'=>$result]);
    }

    function getMoreTimetime(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $result=Results::where('matricNo', $request->matricNo)->get();
      $results_details= Result_Detail::where('semester', $request->semester)->get();
      return view('moremoreResults', [ 'stud' => $stud, 'result'=>$result, 'results_details' => $results_details]);
    }

    function getMoreQuali(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $result=Results::where('matricNo', $request->matricNo)->get();
      $quali= Qualification_Detail::where('qualification_desc', $request->qualification_desc)->get();
      return view('moremoreResults', [ 'stud' => $stud, 'result'=>$result, 'quali' => $quali]);
    }

    function getSkill(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $skill=Skills::where('matricNo', $request->matricNo)->get();
      
      return view('studPerformance', [ 'stud' => $stud, 'skill'=> $skill]);

    }

    function getOverSkill(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $over_skill=Over_Skills::where('matricNo', $request->matricNo)->get();
      $result_info = Results_Info::select('semester')->get();

      
     


      //$result=Results::where('matricNo', $request->matricNo)->get();
      //return $over_skill;
      //return $over_skill;
      return view('studPerformancess', [ 'stud' => $stud, 'over_skill'=> $over_skill,'result_info'=> $result_info, ]);

    }

    function getBySem(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $over_skill = '';
      if($request->semester != 'overall')
      {
        $over_skill=Skills::where('matricNo', $request->matricNo)->where('semester', $request->semester)->get();
      } else {
        $over_skill=Skills::where('matricNo', $request->matricNo)->get();
        //declare variable untuk counter
        $countGK = 0;
       
        $countCSK = 0;
        $countTW = 0;
        $countPS = 0;
        $countLLL = 0;
        $countCS = 0;
        $countTSK = 0;
        $countIM = 0; 
        $countCRT = 0;
        $countCT = 0;
        for($i = 0; $i < count($over_skill); $i++)
        {
          //buat if gck/gcs/gk/gt semua tu then   counter++ bnyk bnyk
          if($over_skill[$i]->transSkill == 'GK')
          {
            $countGK++;
          }

          if($over_skill[$i]->transSkill == 'CSK')
          {
            $countCSK++;
          }
          if($over_skill[$i]->transSkill == 'TW')
          {
            $countTW++;
          }
          if($over_skill[$i]->transSkill == 'PS')
          {
            $countPS++;
          }
          if($over_skill[$i]->transSkill == 'LLL')
          {
            $countLLL++;
          }
          if($over_skill[$i]->transSkill == 'CS')
          {
            $countCS++;
          }
          if($over_skill[$i]->transSkill == 'TSK')
          {
            $countTSK++;
          }
          if($over_skill[$i]->transSkill == 'IM')
          {
            $countIM++;
          }
          if($over_skill[$i]->transSkill == 'CRT')
          {
            $countCRT++;
          }
          if($over_skill[$i]->transSkill == 'CT')
          {
            $countCT++;
          }




        }

        $over_skill = '[{"transSkill" : "GSK", "points" : "' . $countGK . '"}, {"transSkill" : "CSK", "points" : "' . $countCSK . '"}, {"transSkill" : "CSK", "points" : "' . $countCSK . '"}, {"transSkill" : "TW", "points" : "' . $countTW . '"}, {"transSkill" : "PS", "points" : "' . $countPS . '"}, {"transSkill" : "LLL", "points" : "' . $countLLL . '"}, {"transSkill" : "CS", "points" : "' . $countCS . '"}, {"transSkill" : "TSK", "points" : "' . $countTSK . '"}, {"transSkill" : "IM", "points" : "' . $countIM . '"}, {"transSkill" : "CRT", "points" : "' . $countCRT . '"}, {"transSkill" : "CT", "points" : "' . $countCT . '"}]';
        $over_skill = json_decode($over_skill);
        
      }
    
      $result_info = Results_Info::select('semester')->get();
      $result=Results::where('matricNo', $request->matricNo)->first();

      
      return view('studPerformancess', [ 'stud' => $stud, 'over_skill'=> $over_skill, 'result_info'=> $result_info, 'semester' => $request->semester, 'result' => $result]);

    }


    
    function terima(Request $req)
    {
      //dd($req);

      $totGK = 0;
      $totCSK = 0;
     
      $totTW = 0;
      $totCT = 0;
      $totPS = 0;
      $totLLL = 0;
      $totCS = 0;
      $totTSK = 0;
      $totIM = 0;
      $totCRT = 0;


      $totGKCounter = 0;
      $totCSKCounter = 0;
      $totTWCounter = 0;
      $totPSCounter = 0;
      $totLLLCounter = 0;
      $totCSCounter = 0;
      $totTSKCounter = 0;
      $totIMCounter = 0; 
      $totCRTCounter = 0;
      $totCTCounter = 0;
      

      
     


      
      for($i = 0; $i < 100; $i++)
      {
        if($req->input('grade' . $i) != null)
        {
          $course = new Result_Detail;
          $course->matricNo = $req->matricNo;
          $course->semester = $req->semester;
          $course->course = $req->input('course' . $i);
          $course->grade = $req->input('grade' . $i);
          if($req->input('course' . $i) == 'HNS3192')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totGK = $totGK + 5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totGK = $totGK + 4.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totGK = $totGK + 4 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totGK = $totGK + 3.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totGK = $totGK + 3;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totGK = $totGK + 2.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totGK = $totGK + 2;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totGK = $totGK + 1.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totGK = $totGK + 1;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totGK = $totGK + 0.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totGK = $totGK + 0;
              $totGKCounter++;
            }
          }

          if($req->input('course' . $i) == 'KPF3012')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totGK = $totGK + 5 ;
              $totCSK = $totCSK + 5 ;
              $totLLL = $totLLL + 5 ;
              $totTSK = $totTSK + 5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totGK = $totGK + 4.5 ;
              $totCSK = $totCSK + 4.5 ;
              $totLLL = $totLLL + 4.5 ;
              $totTSK = $totTSK + 4.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;


            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totGK = $totGK + 4 ;
              $totCSK = $totCSK + 4 ;
              $totLLL = $totLLL + 4 ;
              $totTSK = $totTSK + 4 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totGK = $totGK + 3.5 ;
              $totCSK = $totCSK + 3.5 ;
              $totLLL = $totLLL + 3.5 ;
              $totTSK = $totTSK + 3.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totGK = $totGK + 3 ;
              $totCSK = $totCSK + 3 ;
              $totLLL = $totLLL + 3 ;
              $totTSK = $totTSK + 3 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totGK = $totGK + 2.5 ;
              $totCSK = $totCSK + 2.5 ;
              $totLLL = $totLLL + 2.5 ;
              $totTSK = $totTSK + 2.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totGK = $totGK + 2 ;
              $totCSK = $totCSK + 2 ;
              $totLLL = $totLLL+ 2 ;
              $totTSK = $totTSK + 2 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totGK = $totGK + 1.5 ;
              $totCSK = $totCSK + 1.5 ;
              $totLLL = $totLLL + 1.5 ;
              $totTSK = $totTSK + 1.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totGK = $totGK + 1 ;
              $totCSK = $totCSK + 1 ;
              $totLLL = $totLLL + 1 ;
              $totTSK = $totTSK + 1 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totGK = $totGK + 0.5 ;
              $totCSK = $totCSK + 0.5 ;
              $totLLL = $totLLL + 0.5 ;
              $totTSK = $totTSK + 0.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totGK = $totGK + 0 ;
              $totCSK = $totCSK + 0 ;
              $totLLL = $totLLL + 0 ;
              $totTSK = $totTSK+ 0 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
          }

          if($req->input('course' . $i) == 'MTK3013')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totTW = $totTW + 5 ;
              $totCSK = $totCSK + 5 ;
              $totPS = $totPS + 5 ;
              $totCT = $totCT + 5 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totTW = $totTW + 4.5 ;
              $totCSK = $totCSK + 4.5 ;
              $totPS = $totPS + 4.5 ;
              $totCT = $totCT + 4.5 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;


            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totTW = $totTW + 4;
              $totCSK = $totCSK + 4;
              $totPS = $totPS + 4;
              $totCT = $totCT + 4;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totTW = $totTW + 3.5 ;
              $totCSK = $totCSK + 3.5 ;
              $totPS = $totPS + 3.5 ;
              $totCT = $totCT + 3.5 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totTW = $totTW + 3 ;
              $totCSK = $totCSK + 3 ;
              $totPS = $totPS + 3 ;
              $totCT = $totCT + 3 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totTW = $totTW + 2.5 ;
              $totCSK = $totCSK + 2.5 ;
              $totPS = $totPS + 2.5 ;
              $totCT = $totCT + 2.5 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totTW = $totTW + 2 ;
              $totCSK = $totCSK + 2 ;
              $totPS = $totPS+ 2 ;
              $totCT = $totCT + 2 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totTW = $totTW + 1.5 ;
              $totCSK = $totCSK + 1.5 ;
              $totPS = $totPS + 1.5 ;
              $totCT = $totCT + 1.5 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;

            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totTW = $totTW + 1 ;
              $totCSK = $totCSK + 1 ;
              $totPS = $totPS + 1 ;
              $totCT = $totCT + 1 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totTW = $totTW + 0.5 ;
              $totCSK = $totCSK + 0.5 ;
              $totPS = $totPS + 0.5 ;
              $totCT = $totCT + 0.5 ;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totTW = $totTW + 0;
              $totCSK = $totCSK + 0;
              $totPS = $totPS + 0;
              $totCT = $totCT+ 0;
              $totTWCounter++;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
          }

          if($req->input('course' . $i) == 'MTN3063')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
            
              $totCSK = $totCSK + 5 ;
              $totPS = $totPS + 5 ;
              $totCT = $totCT + 5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
             
              $totCSK = $totCSK + 4.5 ;
              $totPS = $totPS + 4.5 ;
              $totCT = $totCT + 4.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;

            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
            
              $totCSK = $totCSK + 4;
              $totPS = $totPS + 4;
              $totCT = $totCT + 4;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
           
              $totCSK = $totCSK + 3.5 ;
              $totPS = $totPS + 3.5 ;
              $totCT = $totCT + 3.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
          
              $totCSK = $totCSK + 3 ;
              $totPS = $totPS + 3 ;
              $totCT = $totCT + 3 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
            
              $totCSK = $totCSK + 2.5 ;
              $totPS = $totPS + 2.5 ;
              $totCT = $totCT + 2.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
         
              $totCSK = $totCSK + 2 ;
              $totPS = $totPS+ 2 ;
              $totCT = $totCT + 2 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
        
              $totCSK = $totCSK + 1.5 ;
              $totPS = $totPS + 1.5 ;
              $totCT = $totCT + 1.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
            
              $totCSK = $totCSK + 1;
              $totPS = $totPS + 1;
              $totCT = $totCT + 1;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
           
              $totCSK = $totCSK + 0.5  ;
              $totPS = $totPS + 0.5 ;
              $totCT = $totCT + 0.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
             
              $totCSK = $totCSK + 0 ;
              $totPS = $totPS + 0 ;
              $totCT = $totCT+ 0 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
          }

          if($req->input('course' . $i) == 'MTS3013')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
            
              $totCSK = $totCSK + 5 ;
              $totPS = $totPS + 5 ;
              $totCT = $totCT + 5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
             
              $totCSK = $totCSK + 4.5;
              $totPS = $totPS + 4.5;
              $totCT = $totCT + 4.5;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;

            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
            
              $totCSK = $totCSK + 4 ;
              $totPS = $totPS + 4 ;
              $totCT = $totCT + 4 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
           
              $totCSK = $totCSK + 3.5 ;
              $totPS = $totPS + 3.5 ;
              $totCT = $totCT + 3.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
          
              $totCSK = $totCSK + 3 ;
              $totPS = $totPS + 3 ;
              $totCT = $totCT + 3 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
            
              $totCSK = $totCSK + 2.5 ;
              $totPS = $totPS + 2.5 ;
              $totCT = $totCT + 2.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
         
              $totCSK = $totCSK + 2 ;
              $totPS = $totPS+ 2 ;
              $totCT = $totCT + 2 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
        
              $totCSK = $totCSK + 1.5 ;
              $totPS = $totPS + 1.5 ;
              $totCT = $totCT + 1.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
            
              $totCSK = $totCSK + 1 ;
              $totPS = $totPS + 1 ;
              $totCT = $totCT + 1 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
           
              $totCSK = $totCSK + 0.5 ;
              $totPS = $totPS + 0.5 ;
              $totCT = $totCT + 0.5 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
             
              $totCSK = $totCSK + 0 ;
              $totPS = $totPS + 0 ;
              $totCT = $totCT+ 0 ;
              $totCSKCounter++;
              $totPSCounter++;
              $totCTCounter++;
            }
          }

          if($req->input('course' . $i) == 'PPI3012')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totTW = $totTW + 5 ;
              $totGK = $totGK + 5 ;
              $totLLL = $totLLL + 5 ;
              $totCS = $totCS + 5 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totTW = $totTW + 4.5 ;
              $totGK = $totGK + 4.5 ;
              $totLLL = $totLLL + 4.5 ;
              $totCS = $totCS + 4.5 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;


            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totTW = $totTW + 4 ;
              $totGK = $totGK + 4 ;
              $totLLL = $totLLL + 4 ;
              $totCS = $totCS + 4 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totTW = $totTW + 3.5 ;
              $totGK = $totGK + 3.5 ;
              $totLLL = $totLLL + 3.5 ;
              $totCS = $totCS + 3.5 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totTW = $totTW + 3 ;
              $totGK = $totGK + 3 ;
              $totLLL = $totLLL + 3 ;
              $totCS = $totCS + 3 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totTW = $totTW + 2.5 ;
              $totGK = $totGK + 2.5 ;
              $totLLL = $totLLL + 2.5 ;
              $totCS = $totCS + 2.5 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totTW = $totTW + 2 ;
              $totGK = $totGK + 2 ;
              $totLLL = $totLLL+ 2 ;
              $totCS = $totCS + 2 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totTW = $totTW + 1.5 ;
              $totGK = $totGK + 1.5 ;
              $totLLL = $totLLL + 1.5 ;
              $totCS = $totCS + 1.5 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totTW = $totTW + 1 ;
              $totGK = $totGK + 1 ;
              $totLLL = $totLLL + 1 ;
              $totCS = $totCS + 1 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totTW = $totTW + 0.5 ;
              $totGK = $totGK + 0.5 ;
              $totLLL = $totLLL + 0.5 ;
              $totCS = $totCS + 0.5 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totTW = $totTW + 0 ;
              $totGK = $totGK + 0 ;
              $totLLL = $totLLL + 0 ;
              $totCS = $totCS+ 0 ;
              $totTWCounter++;
              $totGKCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
          }

          if($req->input('course' . $i) == 'CMP2011')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totGK = $totGK + 5 ;
              $totGKCounter++;
              
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totGK = $totGK + 4.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totGK = $totGK + 4;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totGK = $totGK + 3.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totGK = $totGK + 3 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totGK = $totGK + 2.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totGK = $totGK + 2 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totGK = $totGK + 1.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totGK = $totGK + 1 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totGK = $totGK + 0.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totGK = $totGK + 0 ;
              $totGKCounter++;
            }
          }

          if($req->input('course' . $i) == 'BMW3032')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
            
              $totCS = $totCS + 5 ;
              $totLLL = $totLLL + 5 ;
              $totIM = $totIM + 5 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
             
              $totCS = $totCS + 4.5 ;
              $totLLL = $totLLL + 4.5 ;
              $totIM = $totIM + 4.5 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;

            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
            
              $totCS = $totCS + 4 ;
              $totLLL = $totLLL + 4 ;
              $totIM = $totIM + 4 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
           
              $totCS = $totCS + 3.5 ;
              $totLLL = $totLLL + 3.5 ;
              $totIM = $totIM + 3.5 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
          
              $totCS = $totCS + 3 ;
              $totLLL = $totLLL + 3 ;
              $totIM = $totIM + 3 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
            
              $totCS = $totCS + 2.5;
              $totLLL = $totLLL + 2.5;
              $totIM = $totIM + 2.5;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
         
              $totCS = $totCS + 2 ;
              $totLLL = $totLLL+ 2 ;
              $totIM = $totIM + 2 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
        
              $totCS = $totCS + 1.5;
              $totLLL = $totLLL + 1.5;
              $totIM = $totIM + 1.5;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
            
              $totCS = $totCS + 1 ;
              $totLLL = $totLLL + 1 ;
              $totIM = $totIM + 1 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
           
              $totCS = $totCS + 0.5 ;
              $totLLL = $totLLL + 0.5 ;
              $totIM = $totIM + 0.5 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
             
              $totCS = $totCS + 0 ;
              $totLLL = $totLLL + 0 ;
              $totIM = $totIM+ 0 ;
              $totIMCounter++;
              $totLLLCounter++;
              $totCSCounter++;
            }
          }

          if($req->input('course' . $i) == 'CUP2011')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totGK = $totGK + 5 ;
              $totGKCounter++;
             
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totGK = $totGK + 4.5;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totGK = $totGK + 4 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totGK = $totGK + 3.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totGK = $totGK + 3 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totGK = $totGK + 2.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totGK = $totGK + 2 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totGK = $totGK + 1.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totGK = $totGK + 1 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totGK = $totGK + 0.5 ;
              $totGKCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totGK = $totGK + 0 ;
              $totGKCounter++;
            }
          }

          if($req->input('course' . $i) == 'HNH3182')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totGK = $totGK + 5 ;
              $totCT = $totCT + 5 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totGK = $totGK + 4.5 ;
              $totCT = $totCT + 4.5 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totGK = $totGK + 4 ;
              $totCT = $totCT + 4 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totGK = $totGK + 3.5 ;
              $totCT = $totCT + 3.5 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totGK = $totGK + 3 ;
              $totCT= $totCT + 3 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totGK = $totGK + 2.5 ;
              $totCT = $totCT + 2.5 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totGK = $totGK + 2 ;
              $totCT = $totCT + 2 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totGK = $totGK + 1.5 ;
              $totCT = $totCT + 1.5 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totGK = $totGK + 1 ;
              $totCT = $totCT + 1 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totGK = $totGK + 0.5 ;
              $totCT = $totCT + 0.5 ;
              $totGKCounter++;
              $totCTCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totGK = $totGK + 0 ;
              $totCT = $totCT + 0 ;
              $totGKCounter++;
              $totCTCounter++;
            }
          }

          if($req->input('course' . $i) == 'KPS3014')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
              $totCSK= $totCSK+ 5 ;
              $totGK = $totGK + 5 ;
              $totLLL = $totLLL + 5 ;
              $totTSK = $totTSK + 5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
              $totCSK= $totCSK+ 4.5 ;
              $totGK = $totGK + 4.5 ;
              $totLLL = $totLLL + 4.5 ;
              $totTSK= $totTSK+ 4.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;


            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
              $totCSK= $totCSK+ 4 ;
              $totGK = $totGK + 4 ;
              $totLLL = $totLLL + 4 ;
              $totTSK = $totTSK + 4 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
              $totCSK= $totCSK+ 3.5 ;
              $totGK = $totGK + 3.5 ;
              $totLLL = $totLLL + 3.5 ;
              $totTSK= $totTSK + 3.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
              $totCSK= $totCSK+ 3 ;
              $totGK = $totGK + 3 ;
              $totLLL = $totLLL + 3 ;
              $totTSK = $totTSK + 3 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
              $totCSK= $totCSK+ 2.5 ;
              $totGK = $totGK + 2.5 ;
              $totLLL = $totLLL + 2.5 ;
              $totTSK = $totTSK + 2.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
              $totCSK= $totCSK+ 2 ;
              $totGK = $totGK + 2 ;
              $totLLL = $totLLL+ 2 ;
              $totTSK = $totTSK + 2 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
              $totCSK= $totCSK+ 1.5 ;
              $totGK = $totGK + 1.5 ;
              $totLLL = $totLLL + 1.5 ;
              $totTSK = $totTSK + 1.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
              $totCSK= $totCSK+ 1 ;
              $totGK = $totGK + 1 ;
              $totLLL = $totLLL + 1 ;
              $totTSK = $totTSK + 1 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
              $totCSK= $totCSK+ 0.5 ;
              $totGK = $totGK + 0.5 ;
              $totLLL = $totLLL + 0.5 ;
              $totTSK = $totTSK + 0.5 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
              $totCSK= $totCSK+ 0 ;
              $totGK = $totGK + 0 ;
              $totLLL = $totLLL + 0 ;
              $totTSK = $totTSK+ 0 ;
              $totGKCounter++;
              $totCSKCounter++;
              $totLLLCounter++;
              $totTSKCounter++;
            }
          }

          if($req->input('course' . $i) == 'MMG3033')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
            
              $totCSK = $totCSK + 5 ;
              $totCRT = $totCRT + 5 ;
              $totPS = $totPS + 5 ;
             
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
             
              $totCSK = $totCSK + 4.5 ;
              $totCRT = $totCRT + 4.5 ;
              $totPS = $totPS + 4.5 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;

            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
            
              $totCSK = $totCSK + 4;
              $totCRT = $totCRT + 4;
              $totPS = $totPS + 4;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
           
              $totCSK = $totCSK + 3.5 ;
              $totCRT = $totCRT + 3.5 ;
              $totPS = $totPS + 3.5 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
          
              $totCSK = $totCSK + 3 ;
              $totCRT = $totCRT + 3 ;
              $totPS = $totPS + 3 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
            
              $totCSK = $totCSK + 2.5 ;
              $totCRT = $totCRT + 2.5 ;
              $totPS = $totPS + 2.5 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
         
              $totCSK = $totCSK + 2 ;
              $totCRT = $totCRT+ 2 ;
              $totPS = $totPS + 2 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
        
              $totCSK = $totCSK + 1.5 ;
              $totCRT = $totCRT + 1.5 ;
              $totPS = $totPS + 1.5 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
            
              $totCSK = $totCSK + 1 ;
              $totCRT = $totCRT + 1 ;
              $totPS = $totPS + 1 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
           
              $totCSK = $totCSK + 0.5 ;
              $totCRT = $totCRT + 0.5 ;
              $totPS = $totPS + 0.5 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
             
              $totCSK = $totCSK + 0 ;
              $totCRT = $totCRT + 0 ;
              $totPS = $totPS+ 0 ;
              $totCSKCounter++;
              $totCRTCounter++;
              $totPSCounter++;
            }
          }

          if($req->input('course' . $i) == 'MTD3033')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
            
              $totCSK = $totCSK + 5 ;
              $totCT = $totCT + 5 ;
              $totPS = $totPS + 5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
             
              $totCSK = $totCSK + 4.5 ;
              $totCT = $totCT + 4.5 ;
              $totPS = $totPS + 4.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;

            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
            
              $totCSK = $totCSK + 4 ;
              $totCT = $totCT + 4 ;
              $totPS = $totPS + 4 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
           
              $totCSK = $totCSK + 3.5 ;
              $totCT = $totCT + 3.5 ;
              $totPS = $totPS + 3.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
          
              $totCSK = $totCSK + 3 ;
              $totCT = $totCT + 3 ;
              $totPS = $totPS + 3 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
            
              $totCSK = $totCSK + 2.5 ;
              $totCT = $totCT + 2.5 ;
              $totPS = $totPS + 2.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
         
              $totCSK = $totCSK + 2 ;
              $totCT = $totCT+ 2 ;
              $totPS = $totPS + 2 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
        
              $totCSK = $totCSK + 1.5;
              $totCT = $totCT + 1.5;
              $totPS = $totPS + 1.5;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
            
              $totCSK = $totCSK + 1 ;
              $totCT = $totCT + 1 ;
              $totPS = $totPS + 1 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
           
              $totCSK = $totCSK + 0.5 ;
              $totCT = $totCT + 0.5 ;
              $totPS = $totPS + 0.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
             
              $totCSK = $totCSK + 0 ;
              $totCT = $totCT + 0 ;
              $totPS = $totPS+ 0 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
          }

          if($req->input('course' . $i) == 'MTS3023')
          {
            if($req->input('grade' . $i) == 'A')
            {
              $course->point = 5 . '';
            
              $totCSK = $totCSK + 5 ;
              $totCT = $totCT + 5 ;
              $totPS = $totPS + 5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'A-')
            {
              $course->point = 4.5 . '';
             
              $totCSK = $totCSK + 4.5 ;
              $totCT = $totCT + 4.5 ;
              $totPS = $totPS + 4.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;

            }
            if($req->input('grade' . $i) == 'B+')
            {
              $course->point = 4 . '';
            
              $totCSK = $totCSK + 4 ;
              $totCT = $totCT + 4 ;
              $totPS = $totPS + 4 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'B')
            {
              $course->point = 3.5 . '';
           
              $totCSK = $totCSK + 3.5 ;
              $totCT = $totCT + 3.5 ;
              $totPS = $totPS + 3.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
              
              
            }
            if($req->input('grade' . $i) == 'B-')
            {
              $course->point = 3 . '';
          
              $totCSK = $totCSK + 3 ;
              $totCT = $totCT + 3 ;
              $totPS = $totPS + 3 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C+')
            {
              $course->point = 2.5 . '';
            
              $totCSK = $totCSK + 2.5 ;
              $totCT = $totCT + 2.5 ;
              $totPS = $totPS + 2.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C')
            {
              $course->point = 2 . '';
         
              $totCSK = $totCSK + 2 ;
              $totCT = $totCT+ 2 ;
              $totPS = $totPS + 2 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'C-')
            {
              $course->point = 1.5 . '';
        
              $totCSK = $totCSK + 1.5 ;
              $totCT = $totCT + 1.5 ;
              $totPS = $totPS + 1.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'D+')
            {
              $course->point = 1 . '';
            
              $totCSK = $totCSK + 1 ;
              $totCT = $totCT + 1 ;
              $totPS = $totPS + 1 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
              
            }
            if($req->input('grade' . $i) == 'D')
            {
              $course->point = 0.5 . '';
           
              $totCSK = $totCSK + 0.5 ;
              $totCT = $totCT + 0.5 ;
              $totPS = $totPS + 0.5 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
            if($req->input('grade' . $i) == 'F')
            {
              $course->point = 0 . '';
             
              $totCSK = $totCSK + 0;
              $totCT = $totCT + 0;
              $totPS = $totPS+ 0 ;
              $totCSKCounter++;
              $totCTCounter++;
              $totPSCounter++;
            }
          }




          $course->save();
        }
        
      }
      //return $totCSK . ' - ' . $totCT . ' - ' . $totPS;

      ///for csk
      if($totCSKCounter != 0)
      {
        $skill = new Skills;
        $skill->matricNo = $req->matricNo;
        $skill->semester = $req->semester;
        $skill->transSkill = 'CSK';
        $skill->points = $totCSK/$totCSKCounter;
        $skill->save();
      }

      if($totGKCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;
      $skill->semester = $req->semester;
      $skill->transSkill = 'GK';
      $skill->points = $totGK/$totGKCounter;
      $skill->save();

    }
    
    if($totTWCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'TW';
      $skill->points = $totTW/$totTWCounter;
      $skill->save();

    }

    if($totIMCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'IM';
      $skill->points = $totIM/$totIMCounter;
      $skill->save();

    }

    if($totCSCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'CS';
      $skill->points = $totCS/$totCSCounter;
      $skill->save();

    }

    if($totCRTCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'CRT';
      $skill->points = $totCRT/$totCRTCounter;
      $skill->save();

    }

    if($totPSCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'PS';
      $skill->points = $totPS/$totPSCounter;
      $skill->save();

    }

    if($totCTCounter != 0)
    {

      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'CT';
      $skill->points = $totCT/$totCTCounter;
      $skill->save();
    }

    if($totLLLCounter != 0)
    {

      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'LLL';
      $skill->points = $totLLL/$totLLLCounter;
      $skill->save();
    }

    if($totTSKCounter != 0)
    {
      $skill = new Skills;
      $skill->matricNo = $req->matricNo;;
      $skill->semester = $req->semester;
      $skill->transSkill = 'TSK';
      $skill->points = $totTSK/$totTSKCounter;
      $skill->save();

    }

    return redirect()->back();
     

    }



    function getMorePerformance(Request $request)
    {
      $stud = Student::where('matricNo', $request->matricNo)->first();
      $result=Results::where('matricNo', $request->matricNo)->get();
     
      return view('studPerformance', [ 'stud' => $stud, 'result'=>$result, ]);


    }

  

    public function create()
    {
        return view('register');
    }


    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');

    }

    public function develop()
    {
        return view('login');
    }

    public function load()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('dashboard');
    }

   








    

    
}
 
    
