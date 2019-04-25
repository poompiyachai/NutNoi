@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
            <div class="card">
                <div class="card-header">Successful !!!</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Your time has been selected, Please check on your profile.
                    
                    <br>
                    <td>

                        <a class="btn btn-success" href="/manager" >back to Manager</a>
                        
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
