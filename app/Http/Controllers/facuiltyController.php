<?php

namespace App\Http\Controllers;

// use Dotenv\Validator;
use Exception;
use App\Models\faculties;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Middleware\adminMiddleware;
use App\Http\middleware\studentMiddleware;
use App\Http\middleware\faciltyMiddleware;

class facuiltyController extends Controller
{
    function showfaclity() {
        $faculty = faculties::all();
        $show_department = DB::table('departments')->get();
        if(Session::has('user')){
            return view('Pages.admin.facuilty',['department'=>$show_department,'faculty'=>$faculty]);
        }else{
            return view('index');
        }
    }

   

    function addfacuilty(Request $request)  {

        Validator::extend('date_range', function ($attribute, $value, $parameters, $validator) {
            $minDate = $parameters[0] ?? '1985-01-01';
            $maxDate = $parameters[1] ?? now()->format('Y-m-d');
        
            try {
                $date = Carbon::parse($value);
                return $date->between($minDate, $maxDate);
            } catch (Exception $e) {
                return false;
            }
        });

        $request->validate([
            'department_id'=>'bail|required|',
            'img'=>'required|image|mimes:jpg,png',
            'gender'=>'bail|required',
            'job_status'=>'bail|required|alpha',
            'qualification'=>'bail|required|alpha',
            'cnic'=>'bail|required|digits:13|numeric',
            'dob'=>'bail|required|date|date_range:1985-01-01,today',
            'contact'=>'bail|required|digits:11|numeric',
            'designation'=>'bail|required|alpha',
            'address'=>'bail|required|min:30|max:60|Alpha',
        ]);
            $getdepartment_id =$request->department_id;

        if ($request->hasFile('img')) {
            $getimg = $request->file('img');
            $imgname = time().'-'.'.'.$getimg->getClientOriginalExtension();
            $path = storage_path('app/public/images');
            $getimg->move($path,$imgname);
            }else{
             echo ('Image is not uploading');
            }

            $getgender = $request->gender;
            $getjob_status=$request->job_status;
            $getqualification= $request->qualification;
            $getcnic=$request->cnic;
            $getdob=$request->dob;
            $getcontact=$request->contact;
            $getdesignation=$request->designation;
            $getaddress=$request->address;

            $add =  new faculties();

            $add->Department_id=$getdepartment_id;
            $add->Image=$imgname;
            $add->Gender=$getgender;
            $add->Job_Status=$getjob_status;
            $add->Qualification=$getqualification;
            $add->Cnic=$getcnic;
            $add->Date_of_Birth=$getdob;
            $add->Contact_No=$getcontact;
            $add->Designation=$getdesignation;
            $add->Address=$getaddress;

            $add->save();
            return redirect()->route('showfaclity')->with('faculty','faculty Has Been Added Sucessfully');

    }


}
