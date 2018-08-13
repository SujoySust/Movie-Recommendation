<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function index(){
        $songLanguages = DB::select("select * from languages ");
        $songTypes = DB::select("select * from types");
        $movieLanguages = DB::select("select * from movie_countries ");
        $movieTypes = DB::select("select * from movie_types");
        $movieActors = DB::select("select * from actors");
        $movies = DB::select("select * from movies order by id desc limit 20");
        $songs = DB::select("select * from songs order by id desc limit 20");

        $totalUser = DB::select("select count(id) from users ");
        $totalMovie = DB::select("select count('id') as id from movies ");
        $totalSong = DB::select("select count('id') as id from songs ");
        $totalActors = DB::select("select count('id') as id from actors ");
        return view('admin.home',[

            'songLanguages'=>$songLanguages,
            'songTypes' => $songTypes,
            'movieLanguages' => $movieLanguages,
            'movieTypes' => $movieTypes,
            'movieActors' => $movieActors,
            'movies' => $movies,
            'songs' => $songs,
            'totalUser' => $totalUser,
            'totalMovie' => $totalMovie,
            'totalSong' => $totalSong,
            'totalActors'=>$totalActors
            ]);
    }

}
