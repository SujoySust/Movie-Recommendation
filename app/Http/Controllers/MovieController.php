<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Song;
use Illuminate\Http\Request;
use DB;


class MovieController extends Controller
{

    /// Languages //
    public function addLanguage(){
        return view('admin.MovieTypes.addLanguage');
    }

    public function saveLanguage(Request $request){
        DB::table('movie_countries')->insert(['name'=>$request->name]);
        return redirect()->back()->with('message','Language Added Successfully');
    }

    public function manageLanguage(){
        $language = DB::select("select * from movie_countries");
        return view('admin.ManageMovie.manageLanguage',['languages'=>$language]);
    }

    public function editLanguage($id){
        $language = DB::select("select * from movie_countries where id = '$id'");
        return view('admin.ManageMovie.editLanguage',['languages'=>$language]);
    }

    public function updateLanguage(Request $request){
        $language = DB::select("update movie_countries
                                      set
                                      name = '$request->name'
                                      where id = '$request->id'");
        return redirect()->back()->with('message','Language Updated Successfully');
    }

    public function deleteLanguage($id){
        DB::select("delete from movie_countries where id = '$id'");
        return redirect()->back()->with('message','Languages Deleted Successfully');
    }

    // Languages End //



    // Type Start //

    public function addType(){
        return view('admin.MovieTypes.addType');
    }
    public function saveType(Request $request){
        DB::table('movie_types')->insert(['name'=>$request->name]);
        return redirect()->back()->with('message','Type Added Successfully');
    }

    public function manageType(){
        $type = DB::select("select * from movie_types");
        return view('admin.ManageMovie.manageType',['types'=>$type]);
    }

    public function editType($id){
        $type = DB::select("select * from movie_types where id = '$id'");
        return view('admin.ManageMovie.editType',['types'=>$type]);
    }

    public function updateType(Request $request){
        $language = DB::select("update movie_types
                                      set
                                      name = '$request->name'
                                      where id = '$request->id'");
        return redirect()->back()->with('message','Movie Type Updated Successfully');
    }
    public function deletetype($id){
        DB::select("delete from movie_types where id = '$id'");
        return redirect()->back()->with('message','Movie Types Deleted Successfully');
    }

    // Type End //

    // Start Actors //

    public function addActor(){
        $languages = DB::select("select * from movie_countries");
        return view('admin.Actors.addActor',['languages'=>$languages]);
    }

    public function saveActor(Request $request){
        DB::table('actors')->insert(['name'=>$request->name,'countries'=>$request->countries]);
        return redirect()->back()->with('message','Actor Added Successfully');
    }

    public function manageActor(){
        $actor = DB::select("select * from actors");
        $languages = DB::select("select * from movie_countries");
        return view('admin.Actors.manageActor',['actors'=>$actor,'languages'=>$languages]);
    }

    public function searchActor(Request $request){
        $actorBycountries = DB::select("select * from actors where countries like '$request->countries'");
        $languages = DB::select("select * from movie_countries");
        return view('admin.Actors.searchActor',['actorBycountries'=>$actorBycountries,'languages'=>$languages,'country'=>$request->countries]);
    }

    public function editActor($id){
        $actors = DB::select("select * from actors where id = '$id'");
        $language = DB::select("select * from movie_countries");
        return view('admin.Actors.editActor',['languages'=>$language,'actors'=>$actors]);
    }

    public function updateActor(Request $request){
        $actor = DB::select("update actors
                                      set
                                      name = '$request->name',
                                      countries = '$request->countries'
                                      where id = '$request->id'");
        return redirect()->back()->with('message','Actor Updated Successfully');
    }

    public function deleteActor($id){
        DB::select("delete from actors where id = '$id'");
        return redirect()->back()->with('message','Actor Deleted Successfully');
    }

    // End Actors //

    public function addMovie(){
        $types = DB::select("select * from movie_types");
        $languages = DB::select("select * from movie_countries");
        return view('admin.Movie.addMovie',['types'=>$types,'languages'=>$languages]);
    }
    public function saveMovie(Request $request){

        $imageUrl = $this->movieImageUrl($request);


        DB::table('movies')->insert([
            'name'=>$request->name,
            'type'=>$request->type,
            'director'=>$request->director,
            'language'=>$request->language,
            'link'=>$request->link,
            'picture'=>$imageUrl,
            'status'=>'1'
        ]);

        return redirect()->back()->with('message','Movie saved Successfully');

    }
    private function movieImageUrl($request){
//
        ini_set('memory_limit','256M');
        $movieImage=$request->file('picture');
        if($movieImage){
            $imageName = $movieImage->getClientOriginalName();
            $uploadPath ='Admin/images/Movies/';
            $movieImage->move($uploadPath,$imageName);
            $imageUrl =$uploadPath.$imageName;

        }
        else{

            $imageUrl='not uploaded';
        }
        return $imageUrl;


    }

    public function manageMovie(){
        $movies = DB::select("select * from movies");
        return view('admin.Movie.manageMovie',['movies'=>$movies]);
    }
    public function editMovie($id){
        $movie = DB::select("select * from movies where id = '$id'");
        $movielang = "";
        foreach ($movie as $mov){
            $movielang = $mov->language;
        }

        $movieActorList = DB::select("select * from actors where id in (select actorID from movie_actors where movieId = '$id')");

        $actorList = DB::select("select * from actors where countries like '$movielang'");
        $language = DB::select("select * from movie_countries");
        $type = DB::select("select * from movie_types");
        return view('admin.Movie.editMovie',['movies'=>$movie,'languages'=>$language,'types'=>$type,'actorLists'=>$actorList,'movieActorLists'=>$movieActorList]);
    }

    public function addMovieActor(Request $request){
        DB::table('movie_actors')->insert([
            'movieId' => $request->id,
            'actorId' => $request->actorId

        ]);
        return redirect()->back();
    }

    public function deleteMovieActor($actorId,$movieId){

        DB::select("delete from movie_actors where actorId = '$actorId' and movieId = '$movieId'");
        return redirect()->back();
    }


    public function updateMovie(Request $request)
    {
        $imageUrl = $this->imageExistsStutus($request);


        DB::table('movies')->where('id',$request->id)->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'director'=>$request->director,
            'language'=>$request->language,
            'link'=>$request->link,
            'picture'=>$imageUrl,

        ]);

        return redirect()->back()->with('message','Movie info Updated Succeessfully');

    }
    private function imageExistsStutus($request){
        $songId=Movie::where('id',$request->id)->first();
        ini_set('memory_limit','256M');
        $movieImage=$request->file('picture');
        if($movieImage){
            $oldImageUrl = $songId->picture;
            if($oldImageUrl){
                unlink($oldImageUrl);
            }
            $imageName = $movieImage->getClientOriginalName();
            $uploadPath ='Admin/images/Movies/';
            $movieImage->move($uploadPath,$imageName);
            $imageUrl =$uploadPath.$imageName;

        }
        else{

            $imageUrl=$songId->picture;
        }
        return $imageUrl;


    }

    public function deleteMovie($id){
        DB::select("delete from movies where id = '$id'");
        return redirect()->back()->with('message','Movie  Deleted Successfully');
    }



}
