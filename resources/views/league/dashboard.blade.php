@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">League {{ __('Dashboard') }}</div>

                <div class="card-body">
               
                    <h1>{{$name}}</h1>

                    <ul>
                        <li>
                            <a href="/league/team/create/{{$id}}">Register Team</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
