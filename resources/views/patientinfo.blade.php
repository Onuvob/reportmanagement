@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">Patient Info</div>

                <div class="card-body">

                    <div>
                        <label>Name: {{ $patient->name }}</label>
                    </div>
                    <div>
                        <label>Email: {{ $patient->email }}</label>
                    </div>
                    
                </div>
            </div>

            <div class="card">
                <div class="card-header">Patient Reports</div>

                <div class="card-body">

                    <div>

                        @foreach($patientreport as $report)

                            <label>File: {{ $report->file_name }}</label>
                          
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>


            <div class="card">
                <div class="card-header">Report Submit</div>

                <div class="card-body">

                    <div>

                        <form method="GET" action="{{ url('patient-report/'.$patient->id ) }}" enctype="multipart/form-data">

                            
                           <label>Upload report : </label><input type="file" name="intentEvFile" accept=".doc, .docx, .pdf">

                           <input type="number" name="id" hidden="hidden" value="{{ $patient->id }}">
                            
                            <!-- Form Submit button -->
                            <div class="row justify-content-center">
                                          
                                <button type="submit" class="btn btn-info text-light">Upload</button>

                            </div>
                            <!--End Form Submit button-->
                        </form>



                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
