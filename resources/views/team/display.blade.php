@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$league->name}} - Team</div>

                <div class="card-body">

                    <form id="form" >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input readonly="true" class="form-control" id="name" type="text" value="{{$team->name}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-end">
                                <button id="editBtn" class="btn btn-primary">edit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="module">
    import {$q} from '/adarna.js';

</script>
@endsection


