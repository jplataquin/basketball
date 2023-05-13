<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    
    public function index(Request $request,$id){

        $team = Team::findOrFail($id);

        return view('team/dashboard',$team);
    }

    public function create(Request $request,$id){
        return view('team/create',[
            'league_id' => $id
        ]);
    }

    public function _create(Request $request,$id){

        //TODO request validation

        $name           = $request->input('name');
        
        $team = new Team();

        $team->league_id           = $id;
        $team->name              = $name;
        $team->images          = '{}';

        $team->save();

        return response()->json([
            'status' => 1,
            'message'=>'',
            'data'=> [
                'id' => $team->id
            ]
        ]);
    }

    public function list(Request $request,$league_id){
    
        //TODO Validation
    
        $league = League::findOrFail($league_id);

        return view('team/list',[
            'league_name' => $league->name,
            'league_id'   => $league->id
        ]);
    }

    public function _list(Request $request,$league_id){

        //TODO Validation

        $page = (int) $request->input('page') ?? 0;
        $limit = (int) $request->input('limit') ?? 10;

        $team = new Team();

        $result = [];


        $team = $team->where('league_id',$league_id);

        if($limit > 0){
            $page   = ($page-1) * $limit;

            $result = $team->skip($page)->take($limit)->get();
            
        }else{

            $result = $team->take($limit)->get();
        }

        return response()->json([
            'status' => 1,
            'message'=>'',
            'data'=> $result
        ]);
    }


    public function display(Request $request,$id){

        //TODO validation

        $team = Team::findOrFail($id);

        $league = League::findOrFail($team->league_id);

        return view('team/display',[
            'league' => $league,
            'team'   => $team
        ]);
    }
}
