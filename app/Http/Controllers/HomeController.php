<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return view('welcome');
    }
    public function IndexWarning(Request $war){
        DB::table('videos')->where('id',$war->id)->update(['warning' => $war->warn]);
        return back();
    }    
    // public function IndexWatch($wat){
    //     $filename=DB::table('videos')->where('id',$wat)->get()[0]->filename;
    //     return view('watch',['vid'=>$filename,'id'=>$wat]);
        // return $filename;
        // $filename=DB::table('videos')->where('id',$wat->vid)->get();
        // return $filename;
        // return view('/',[asset('//hosting/storage/app/public/'.$filename)]);
    // }
    public function IndexAppraisal(Request $app){
        if(count(DB::table('appraisal')->where('idvideo',$app->idvideo)->where('iduser',$app->iduser)->get())==0){
            DB::table('appraisal')->insert(['iduser'=>$app->iduser,'appraisal'=>$app->appraisal,'idvideo'=>$app->idvideo]);
            if($app->appraisal==1) DB::table('videos')->where('id',$app->idvideo)->increment('likes',1);
            else DB::table('videos')->where('id',$app->idvideo)->increment('dislikes',1);}
        else if(DB::table('appraisal')->where('idvideo',$app->idvideo)->where('iduser',$app->iduser)->get()[0]->appraisal==$app->appraisal){
            DB::table('appraisal')->where('idvideo',$app->idvideo)->where('iduser',$app->iduser)->delete();
            if($app->appraisal==1) DB::table('videos')->where('id',$app->idvideo)->decrement('likes',1);
            else DB::table('videos')->where('id',$app->idvideo)->decrement('dislikes',1);}
        else{
            DB::table('appraisal')->where('idvideo',$app->idvideo)->where('iduser',$app->iduser)->update(['appraisal'=>$app->appraisal]);
            if($app->appraisal==1){
                DB::table('videos')->where('id',$app->idvideo)->decrement('dislikes',1);
                DB::table('videos')->where('id',$app->idvideo)->increment('likes',1);       
            }
            else {
                DB::table('videos')->where('id',$app->idvideo)->decrement('likes',1);
                DB::table('videos')->where('id',$app->idvideo)->increment('dislikes',1);
            }
        }
        return back();
    }
}
