<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Report;
use App\User;

class PatientController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return "hi";

        //return Auth::user()->id;

        if( Auth::user()->role == "doctor" )
            $patientList = Report::where('doctor_id', Auth::user()->id)
                            ->orderBy('updated_at', 'desc')
                            ->paginate(30);
        
        else if( Auth::user()->role == "staff" )
            $patientList = Report::orderBy('updated_at', 'desc')
                            ->paginate(30);

        
        else if( Auth::user()->role == "patient" )
            $patientList = Report::where('patient_id', Auth::user()->id)
                            ->orderBy('updated_at', 'desc')
                            ->paginate(30);

        

        return view('patientlist')->with('patientlist', $patientList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $report = new Report;


        if( Auth::user()->role == "doctor" )
        {
            $report->patient_id = $request->input('pId');
            $report->doctor_id = Auth::user()->id;
        }
        else
        {
            $report->patient_id = $request->input('pId');

            $reportF = Report::where('patient_id', $request->input('pId'))->first(); 

            //return $report;

            $report->doctor_id = $reportF->doctor_id;
        }

        
        if($request->hasFile('patientFile'))
        {
            $fileName = $request->patientFile->getClientOriginalName('');
            $fileName = time().'_'.$fileName;
            $request->patientFile->storeAs('public/report', $fileName);
            $report->file_name = $fileName;
        }

        $report->save();
        

        return view('home');

        //$report = Report::find($id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $patient = User::find($id);

        if( Auth::user()->role == 'doctor' )
            $patientReport = Report::where('doctor_id', Auth::user()->id)
                            ->where('patient_id', $id)
                            ->get();


        else
            $patientReport = Report::where('patient_id', $id)
                            ->get();


        return view('patientinfo')->with('patient', $patient)->with('patientreport', $patientReport);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function submitReport( Request $request)
    // {
    //     //

    //     return $request->input('id');
    //     return $patientId;
    //     return view('home');
        
    // }
}
