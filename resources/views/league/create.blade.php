@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create League</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="form" >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" id="name" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="description"></textarea>
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
    const description   = $q('#description').first(); 
    const createBtn     = $q('#createBtn').first();
    
    createBtn.onclick = (e)=>{
        e.preventDefault();

        window.util.$post('/api/league/create',{
            name: name.value.trim(),
            description: description.value.trim()
        }).then(reply=>{

            if(!reply.status){
                return alert(reply.message);
            }

            document.location.href = '/league/list';

        }).catch(err=>{
            console.log(err);
        });
    }
</script>
@endsection


