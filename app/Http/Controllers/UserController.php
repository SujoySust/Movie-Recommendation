<?php

namespace App\Http\Controllers;

use App\MovieSuggestion;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\SongSuggestion;


class UserController extends Controller
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
        $recentMovies = DB::select("select * from movies order by id desc limit 10");
        $userId = Auth::guard('user')->user()->id;
        $data = "select * from songs where type in ( select distinct type from songs where id in (select songid from song_suggestions where userid = '$userId'))";
        $Recommendedsongs = DB::select($data);
        return view('user.home',['recentMovies'=>$recentMovies,'userId'=>$userId,'topTenSongs'=>$topSongsResults,'Recommendedsongs'=>$Recommendedsongs]);
    }
    public function allsongs(){
        $id =Auth::guard('user')->user()->id;
        $types = DB::select("select distinct type from songs where id in (select songid from song_suggestions where userid = '$id')");
        $data = "select * from songs where type in ( select distinct type from songs where id in (select songid from song_suggestions where userid = '$id'))";

        $songs = DB::select($data);

        $language = DB::select("select * from languages");
        $allSongs = DB::select("select * from songs");
        return view('user.Song.allsongs',['allSongs'=>$allSongs,'languages'=>$language,'songs'=>$songs]);
    }



    public function viewSong($type,$id){

        $userid = Auth::guard('user')->user()->id;
        $songbyid =SongSuggestion::where('userid',$userid)->where('songid',$id)->first();
        if($songbyid){
            $count = $songbyid->count;
            $count = $count+1;
            $suggesid = $songbyid->id;
            $updatesongbyid = DB::select("update song_suggestions 
                                              set 
                                              count = '$count'
                                              where id ='$suggesid'");
        }else{
          DB::table('song_suggestions')->insert([
                'userid'=>$userid,
                'songid'=>$id,
                'count'=>'1'
            ]);
        }

        $song = DB::select("select * from songs where id ='$id'");
        $suggestion = DB::select("select * from songs where type like '$type'");
        return view('user.Song.viewSong',['songs'=>$song,'suggestions'=>$suggestion]);
    }

    public function allSongByLanguage($language){
        $types = DB::select("select * from types");
        $languages =DB::select("select * from languages where language like '$language'");
        $songs = DB::select("select * from songs where language like '$language'");
        return view('user.Song.differentSongs',['types'=>$types,'songs'=>$songs,'languages'=>$languages]);
    }

    public function allSongByType($language,$type){
        $types = DB::select("select * from types");
        $languages =DB::select("select * from languages where language like '$language'");
        $songsBytype = DB::select("select * from songs where language like '$language' and type like '$type'");
        return view('user.Song.differentSongs',['types'=>$types,'songsBytypes'=>$songsBytype,'languages'=>$languages]);
    }

    public function moviesByLanguage($language){

        $id =Auth::guard('user')->user()->id;
        $movieByLanguages = DB::select("select * from movies where language like '$language'");
        $languages =DB::select("select * from movie_countries");
        $actors = DB::select("select * from actors where countries like '$language'");
        $types = DB::select("select distinct type from movies where language  like '$language'");

        return view('user.Movie.movieByLanguage',
            [
                'movieByLanguages'=>$movieByLanguages,
                'languages'=>$languages,
                'actors'=>$actors,
                'types'=>$types,
                'country'=> $language
            ]);

    }

    public function searchByLanguage(Request $request){

        $searchByLanguages = DB::select("select movies.* from movie_actors join movies on movies.id = movie_actors.movieId where movie_actors.actorId = '$request->id' and movies.type = '$request->type'");
        $languages =DB::select("select * from movie_countries");
        $actors = DB::select("select * from actors where countries like '$request->countries'");
        $types = DB::select("select distinct type from movies where language  like '$request->countries'");

        return view('user.Movie.movieByLanguage',
            [
                'searchByLanguages'=>$searchByLanguages,
                'languages'=>$languages,
                'actors'=>$actors,
                'types'=>$types,
                'country'=> $request->countries
            ]);


    }

    public function viewMovie($type,$movieid){

        $userid = Auth::guard('user')->user()->id;
        $moviebyid =MovieSuggestion::where('userid',$userid)->where('movieId',$movieid)->first();
        if($moviebyid){
            $count = $moviebyid->count;
            $count = $count+1;
            $suggesid = $moviebyid->id;
            $updatemoviebyid = DB::select("update movie_suggestions 
                                              set 
                                              count = '$count'
                                              where id ='$suggesid'");
        }else{
            DB::table('movie_suggestions')->insert([
                'userId'=>$userid,
                'movieId'=>$movieid,
                'count'=>'1'
            ]);
        }

        $movie = DB::select("select * from movies where id ='$movieid'");
        $suggestion = DB::select("select * from movies where type like '$type'");
        return view('user.Movie.viewMovie',['movies'=>$movie,'suggestions'=>$suggestion]);
    }

}
