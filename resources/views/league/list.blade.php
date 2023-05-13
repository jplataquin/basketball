@extends('layouts.app')

@section('content')
<div class="container">
    <h1>League List</h1>

    <div id="list"></div>
    <div>
        <button id="moreBtn" class="btn btn-primary w-100">More</button>
    </div>
    <script type="module">
         import {$q,Template} from '/adarna.js';

         const list     = $q('#list').first();
         const moreBtn  = $q('#moreBtn').first();
         const t        = new Template();
         let page = 1;

         function getList(){

            window.util.$get('/api/league/list',{
                page: page,
                limit: 5
            }).then(reply=>{

                if(reply.status <= 0){
                    alert(reply.message);
                    return false;
                }

                if(!reply.data.length){
                    moreBtn.style.display = 'none';
                    return false;
                }
                
                reply.data.map(item=>{

                    let div = t.div({class:'row'},()=>{
                        t.div({class:'col-12 border border-primary mb-2 p-2'},()=>{
                            t.txt(item.name);
                        });
                    });

                    list.appendChild(div);

                    div.onclick = (e)=>{
                        document.location.href = '/league/'+item.id;
                    }
                });
                
                console.log(reply);

                page++;
            });
         }

         getList();


         moreBtn.onclick = ()=>{
            getList();
         }
    </script>
</div>
@endsection