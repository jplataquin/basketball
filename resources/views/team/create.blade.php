@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Team</div>

                <div class="card-body">

                    <form id="form" >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" id="name" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-end">
                                <button id="createBtn" class="btn btn-primary">Create</button>
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

    const name          = $q('#name').first();
    const createBtn     = $q('#createBtn').first();
    
    createBtn.onclick = (e)=>{
        e.preventDefault();

        window.util.$post('/api/team/create/{{$league_id}}',{
            name: name.value.trim(),
        }).then(reply=>{

            if(!reply.status){
                return alert(reply.message);
            }

            document.location.href = '/league/{{$league_id}}/team/list';

        }).catch(err=>{
            console.log(err);
        });
    }
</script>
@endsection


