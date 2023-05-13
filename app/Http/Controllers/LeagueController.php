<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;
use Illuminate\Support\Facades\Auth;

class LeagueController extends Controller
{
    
    public function index(Request $request,$id){

        $league = League::findOrFail($id);

        return view('league/dashboard',$league);
    }

    public function create(Request $request){
        return view('league/create');
    }

    public function _create(Request $request){

        //TODO request validation

        $name           = $request->input('name');
        $description    = $request->input('description');
        
        $league = new League();

        $league->club_id        = Auth::user()->club->id;
        $league->name           = $name;
        $league->description    = $description;
        $league->images          = '{}';

        $league->save();

        return response()->json([
            'status' => 1,
            'message'=>'',
            'data'=> [
                'id' => $league->id
            ]
        ]);
    }

    public function list(Request $request){
        return view('league/list');
    }
    
    public function _list(Request $request){

        $page = (int) $request->input('page') ?? 0;
        $limit = (int) $request->input('limit') ?? 10;

        $league = new League();

        $result = [];

        if($limit > 0){
            $page   = ($page-1) * $limit;

            $result = $league->skip($page)->take($limit)->get();
            
        }else{

            $result = $league->take($limit)->get();
        }

        return response()->json([
            'status' => 1,
            'message'=>'',
            'data'=> $result
        ]);
    }
}
