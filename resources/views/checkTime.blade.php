@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="card text-center">
    <div class="card text-center">
        <div class="col-md-8">
            @if ( $waitTable->status_confirm == '1')
                <div class="card">
                    <div class="card-header">ช่วงเวลาที่ Confirm ไว้ ณ ตอนนี้ </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <tr>
                            <td>Project ID</td>
                            <td>Booking ID</td>
                            <td>Time</td>
                            <td>Edit</td>
                            </tr>
                            <tr>
                            <td>{{$users->project_id}}</td>
                            <td>{{$users->booking_id}}</td>
                            <td>{{$datatimeUser->datetime}}</td>
                            <td>
                            <a class="btn btn-danger" onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-black">Cancel</a>

                                <a class="btn btn-danger" href="{{ action('AdminController@cancel',[$users->project_id])}}" >Cancel</a>
                                <a class="btn btn-primary" href="{{action('AdminController@toSendEmail',[$users->project_id])}}" >send Email </a>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Select your time for examination</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        Project_id : {{$waitTable->project_id}}
                        <td>Booking ID</td>
                        <td>Time</td>
                        <td>Confirm here</td>

                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id ==$waitTable->booking_id1)
                                <tr>
                                <td>{{$waitTable->booking_id1}}</td>
                                <td>{{$time[$i]->datetime}}</td>
                                @if ($users->booking_id == $waitTable->booking_id1)
                                <td><a class="btn btn-success" href="{{ action('AdminController@confirm',[$waitTable->booking_id1 , $waitTable->project_id])}}" >confirmed</a></td>
                                @else <td><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">confirm</button></td>
                                @endif
                            @endif
                        @endfor
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id == $waitTable->booking_id2)
                                <tr>
                                <td>{{$waitTable->booking_id2}}</td>
                                <td>{{$time[$i]->datetime}}</td>
                                @if ($users->booking_id == $waitTable->booking_id2)
                                <td><a class="btn btn-success" href="{{ action('AdminController@confirm',[$waitTable->booking_id2 , $waitTable->project_id])}}" >confirmed</a></td>
                                @else <td><button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black">confirm</button></td>
                                @endif
                            @endif
                        @endfor
                        @for ($i = 0; $i < count($time); $i++)
                            @if ( $time[$i]->booking_id == $waitTable->booking_id3)
                                <tr>
                                    <td>{{$waitTable->booking_id3}}</td>
                                <td>{{$time[$i]->datetime}}</td>
                                @if ($users->booking_id == $waitTable->booking_id3)
                                <td><a class="btn btn-success" href="{{ action('AdminController@confirm',[$waitTable->booking_id3 , $waitTable->project_id])}}" >confirmed</a></td>
                                @else <td><button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black">confirm</button></td>
                            
                                @endif
                            @endif
                        @endfor
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>


  
    <div id="id01" class="w3-modal">
      <div class="w3-modal-content">
        <div class="w3-container">
          <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
          <h3>click for confirm</h3>
          <center><td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id1 , $waitTable->project_id])}}" >ok</a></td></center>

        </div>
      </div>
    </div>
  
    <div id="id02" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container">
            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h3>click for confirm</h3>
            <center><td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id2 , $waitTable->project_id])}}" >ok</a></td></center>
   
          </div>
        </div>
      </div>
  
      <div id="id03" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container">
            <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h3>click for confirm</h3>
            <center><td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id3 , $waitTable->project_id])}}" >ok</a></td></center>
         
          
          
          </div>
        </div>
      </div>
    
      <div id="id04" class="w3-modal">
        <div class="w3-modal-content">
          <div class="w3-container">
            <span onclick="document.getElementById('id04').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h3>click for confirm</h3>
            <center><td><a class="btn btn-danger" href="{{ action('AdminController@cancel',[$users->project_id])}}" >Cancel</a> </td></center>
        
          
          
          </div>
        </div>
      </div>


<div id="myModal" class="modal2">

        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id3 , $waitTable->project_id])}}" >ok</a></td>
        </div>

  
<div id="myModal1" class="modal1">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id1 , $waitTable->project_id])}}" >ok</a></td>
    </div>

    
<div id="myModal2" class="modal3">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <td><a class="btn btn-primary" href="{{ action('AdminController@confirm',[$waitTable->booking_id2 , $waitTable->project_id])}}" >ok</a></td>
    </div>


@endsection
