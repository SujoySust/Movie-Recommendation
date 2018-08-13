<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use DB;


class mediaController extends Controller
{

    public function addLanguage(){
        return view('admin.Language.addLanguage');
    }
    public function saveLanguage(Request $request){
        DB::table('languages')->insert(['language'=>$request->language]);
        return redirect()->back()->with('message','Language Added Successfully');
    }
    public function addType(){
        return view('admin.Language.addType');
    }
    public function saveType(Request $request){
        DB::table('types')->insert(['type'=>$request->type]);
        return redirect()->back()->with('message','Type Added Successfully');
    }

    public function manageLanguage(){
        $language = DB::select("select * from languages");
        return view('admin.Manage.manageLanguage',['languages'=>$language]);
    }
    public function editLanguage($id){
        $language = DB::select("select * from languages where id = '$id'");
        return view('admin.Manage.editLanguage',['languages'=>$language]);
    }

    public function updateLanguage(Request $request){
        $language = DB::select("update languages
                                      set
                                      language = '$request->language'
                                      where id = '$request->id'");
        return redirect()->back()->with('message','Language Updated Successfully');
    }

    public function deleteLanguage($id){
        DB::select("delete from languages where id = '$id'");
        return redirect()->back()->with('message','Languages Deleted Successfully');
    }

    public function manageType(){
        $type = DB::select("select * from types");
        return view('admin.Manage.manageType',['types'=>$type]);
    }

    public function editType($id){
        $type = DB::select("select * from types where id = '$id'");
        return view('admin.Manage.editType',['types'=>$type]);
    }

    public function updateType(Request $request){
        $language = DB::select("update types
                                      set
                                      type = '$request->type'
                                      where id = '$request->id'");
        return redirect()->back()->with('message','Type Updated Successfully');
    }
    public function deletetype($id){
        DB::select("delete from types where id = '$id'");
        return redirect()->back()->with('message','Types Deleted Successfully');
    }

    public function addsong(){
        $types = DB::select("select * from types");
        $languages = DB::select("select * from languages");
        return view('admin.Song.addSong',['types'=>$types,'languages'=>$languages]);
    }
    public function saveSong(Request $request){

        $imageUrl = $this->songImageUrl($request);


        DB::table('songs')->insert([
            'name'=>$request->name,
            'type'=>$request->type,
            'singer'=>$request->singer,
            'language'=>$request->language,
            'link'=>$request->link,
            'picture'=>$imageUrl,
            'status'=>'1'
        ]);

        return redirect()->back()->with('message','Project saved Successfully');

    }
    private function songImageUrl($request){
//
        ini_set('memory_limit','256M');
        $songImage=$request->file('picture');
        if($songImage){
            $imageName = $songImage->getClientOriginalName();
            $uploadPath ='Admin/images/Songs/';
            $songImage->move($uploadPath,$imageName);
            $imageUrl =$uploadPath.$imageName;

        }
        else{

            $imageUrl='not uploaded';
        }
        return $imageUrl;


    }

    public function manageSong(){
        $songs = DB::select("select * from songs");
        return view('admin.Song.manageSong',['songs'=>$songs]);
    }
    public function editSong($id){
        $song = DB::select("select * from songs where id = '$id'");
        $language = DB::select("select * from languages");
        $type = DB::select("select * from types");
        return view('admin.Song.editSong',['songs'=>$song,'languages'=>$language,'types'=>$type]);
    }


    public function updateSong(Request $request)
    {
        $imageUrl = $this->imageExistsStutus($request);


        DB::table('songs')->where('id',$request->id)->update([
            'name'=>$request->name,
            'type'=>$request->type,
            'singer'=>$request->singer,
            'language'=>$request->language,
            'link'=>$request->link,
            'picture'=>$imageUrl,

        ]);

        return redirect()->back()->with('message','Songs info Updated Succeessfully');

    }
    private function imageExistsStutus($request){
        $songId=Song::where('id',$request->id)->first();
        ini_set('memory_limit','256M');
        $songImage=$request->file('picture');
        if($songImage){
            $oldImageUrl = $songId->picture;
            if($oldImageUrl){
                unlink($oldImageUrl);
            }
            $imageName = $songImage->getClientOriginalName();
            $uploadPath ='Admin/images/Songs/';
            $songImage->move($uploadPath,$imageName);
            $imageUrl =$uploadPath.$imageName;

        }
        else{

            $imageUrl=$songId->picture;
        }
        return $imageUrl;


    }



}
