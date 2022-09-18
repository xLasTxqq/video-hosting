<?php 

namespace App\Http\Controllers;
use App\Http\Requests\VideoRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function VideoSubmit(VideoRequest $val)
    {
    	$naming=$val->naming;
    	$opisanie=$val->opisanie;
    	$category=$val->category;
    	$videofile=$val->file('videofile')->store('Videos','public');
    	DB::table('videos')->insert(['name' => $naming,'description' => $opisanie,'categories' => $category,'filename' => $videofile,
            'iduser' => \Auth::user()->id,'likes' => 0,'dislikes' => 0,'warning'=> 0,'created_at' => now(),'updated_at' => now()]);
        // return view('storage', ['videofile' => $videofile]);
        return back();
    }
    public function CommentsSubmit(Request $com)
    {
        DB::table('videocomments')->insert(['idvideo'=>$com->idvideo,'idusercomment' =>$com->iduser,'comment'=> $com->comment,'created_at' => now(),'updated_at' => now()]);
        return back();
    }
        public function IndexWatch($wat){
        $filename=DB::table('videos')->where('id',$wat)->get()[0]->filename;
        return view('watch',['vid'=>$filename,'id'=>$wat]);
    }
}
