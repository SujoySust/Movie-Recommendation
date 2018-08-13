<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function index(){
        $topSongs = DB::select("select songid,count(userid) as usercount, sum(count) as sumcount from `song_suggestions` group by songid order by usercount desc, sumcount desc limit 10");
        $result = "select * from songs where id in ( ";

        foreach ($topSongs as $topSong){
            $result = $result.$topSong->songid." , ";
        }
        $result = substr($result,0,-2);
        $result = $result." )";
        $topSongsResults = DB::select($result);

        $movies = DB::select("select * from movies order by id desc limit 20");
        return view('FontEnd.Home.homeContent',['movies'=>$movies,'topSongsResults'=>$topSongsResults]);
    }

    public function viewMovie($language,$type,$id){

        $movie = DB::select("select * from movies where id ='$id'");
        $suggestion = DB::select("select * from movies where type like '$type' or language like '$language'");
        return view('FontEnd.Movie.viewMovie',['movies'=>$movie,'suggestions'=>$suggestion]);
    }
    public function viewSong($type,$id){
        $song = DB::select("select * from songs where id ='$id'");
        $suggestion = DB::select("select * from songs where type like '$type'");
        return view('FontEnd.Song.viewSong',['songs'=>$song,'suggestions'=>$suggestion]);
    }
    public function allsongs(){
        $language = DB::select("select * from languages");
        $allSongs = DB::select("select * from songs");
        return view('FontEnd.Song.allsongs',['allSongs'=>$allSongs,'languages'=>$language]);
    }
    public function allSongByLanguage($language){
        $types = DB::select("select * from types");
        $languages =DB::select("select * from languages where language like '$language'");
        $songs = DB::select("select * from songs where language like '$language'");
        return view('FontEnd.Song.differentSongs',['types'=>$types,'songs'=>$songs,'languages'=>$languages]);
    }

    public function allSongByType($language,$type){
        $types = DB::select("select * from types");
        $languages =DB::select("select * from languages where language like '$language'");
        $songsByType = DB::select("select * from songs where language like '$language' and type like '$type'");
        return view('FontEnd.Song.differentSongs',['types'=>$types,'songsByTypes'=>$songsByType,'languages'=>$languages]);
    }


}
