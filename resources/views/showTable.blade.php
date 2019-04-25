@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-primary" role="alert">
                        <h1>ข้อมูลโปรเจคของ {{$users->name}}</h1>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped ">
                        <tr> 
                        <th>Project ID</th>
                        <th>Name     Project</th>
                        <tr>
                        <td>{{$users->project_id}}</td>
                        <td>{{$project->project_name}}</td>
                        </tr>
                    </table>  
                    @if ( $users->booking == NULL && $waitTable->status_confirm == NULL)
                        @if ($waitTable->status_submit == NULL )
                            <div class="alert alert-danger" role="alert">
                                ตอนนี้คุณยังไม่ได้ Submit
                            </div>
                        @else
                            <div class="alert alert-success" role="alert">
                                ตอนนี้คุณได้ทำการ Submit เรียบร้อยเเล้ว กรุณารอการยืนยันจาก Admin
                            </div>
                        @endif
                        <table class="table table-bordered table-striped">
                            <td>Order</td>
                            <th>Booking ID</th>
                            <td>Time</td>
                            <td>Move</td>
                            <tr>
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id)
                                    @if ($waitTable->booking_id1 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 1</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="#" >up</a>
                                        <a class="btn btn-warning" href="{{ action('UserController@sliding',[9,2])}}" >down</a>
                                        <a class="btn btn-danger" href="{{ action('UserController@deleteBookingID1')}}" >delete</a></td>
                                        </tr>
                                    @endif
                                @endif
                                </tr>
                            @endfor
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id)
                                    @if ($waitTable->booking_id2 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 2</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="{{ action('UserController@sliding',[8,1])}}" >up</a>
                                        <a class="btn btn-warning" href="{{ action('UserController@sliding',[9,3])}}" >down</a>
                                        <a class="btn btn-danger" href="{{ action('UserController@deleteBookingID2')}}" >delete</a></td>
                                        </tr>
                                    @endif
                                @endif
                            </tr>
                            @endfor
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id)
                                    @if ($waitTable->booking_id3 == $timebookingTable[$i]->booking_id)
                                        <tr>
                                        <td>Booking ID 3</td>
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a class="btn btn-success" href="{{ action('UserController@sliding',[8,2])}}" >up</a>
                                        <a class="btn btn-warning" href="#" >down</a>
                                        <a class="btn btn-danger" href="{{ action('UserController@deleteBookingID3')}}" >delete</a></td>
                                        </tr>
                                    @endif
                                @endif
                                </tr>
                            @endfor
                            
                        </table>
                        <table class="table table-bordered table-hover">
                            <td>You can comfirm to submit</td>
                            <td><a class="btn btn-success" onclick="document.getElementById('id01').style.display='block'" >SUBMIT</a></td>   
                        </table>
                    @else
                        <table class="table table-bordered table-hover">
                        <tr>
                        <td><a class="btn btn-success" href="#" >+++++++++++++++ ตอนนี้ Admin ได้ยืนยันการจองเวลาของคุณเเล้ว คุณได้เวลาตั้งนี้ ++++++++++++++</a></td>
                        </tr>
                        </table>
                        <table class="table table-bordered table-striped">
                        <tr>
                        <td>Booking ID</td><td>DateTime</td>
                        </tr>
                        <tr>
                        <td>{{$users->booking_id}}</td>
                        <td>{{$timeUser->datetime}}</td>
                        </tr>
                        </table>
                        
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-header">Select your time for examination</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tr> 
                        <th>Booking ID</th>
                        <th>Date Time</th>
                        <th>Add</th>
                        <tr>
                        @if ($users->haveWaitTable == NULL)
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id  )
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a href="{{ action('UserController@setBooking',$timebookingTable[$i]->booking_id)}}" class="btn btn-primary">Add</a></td>
                                @endif
                                </tr>
                            @endfor
                        @else
                            @for ($i = 0; $i < count($timebookingTable ); $i++)
                                @if ( $timebookingTable[$i]->project_id == $users->project_id && $timebookingTable[$i]->booking_id != $waitTable->booking_id1 && $timebookingTable[$i]->booking_id!= $waitTable->booking_id2&& $timebookingTable[$i]->booking_id!= $waitTable->booking_id3)
                                        <td>{{$timebookingTable[$i]->booking_id}}</td>
                                        <td>{{$timebookingTable[$i]->datetime}}</td>
                                        <td><a href="{{ action('UserController@setBooking',$timebookingTable[$i]->booking_id)}}" class="btn btn-primary">Add</a></td>
                                @endif
                                </tr>
                            @endfor
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>


<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h3>click ok for add</h3>
        <center><h1><td><a class="btn btn-primary" href="{{ action('UserController@submitted',$users->project_id)}}"  >ok</a></td><h1></center>
     
      </div>
    </div>
  </div>

  


@endsection

