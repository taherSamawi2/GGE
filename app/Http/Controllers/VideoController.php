<?php

namespace App\Http\Controllers;

use App\Http\Resources\Book as BookResource;
use App\Video;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All Videos */
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index',['videos' => $videos]);
    }

    //show a single Video
    public function show(Video $video)
    {
        return view('admin.videos.edit',['videos' => $video]);
    }

    //show a create Video
    public function create(Video $video)
    {
        return view('admin.videos.create',['videos' => $video]);
    }

    public function Save($request ,$video)
    {
        $video->setTranslation('title', 'en', $request->en_title);
        $video->setTranslation('title', 'ar', $request->ar_title);
        $video->url=$request->url;

        $video_id = explode("?v=", $request->url);
        $video_id = $video_id[1];
        $thumbnail="http://img.youtube.com/vi/".$video_id."/maxresdefault.jpg";
        $video->thumbnail = $thumbnail;

//        $video->addMediaFromRequest('video')->toMediaCollection('videos');
        $video->save();
        return $video;
    }

    // save the new Video
    public function store(VideoRequest $request)
    {
        $video  = $this->Save($request,new Video());
        return redirect(route('videos.index'));
    }


    // show a view to edit Video
    public function edit(Video $video){
        return response()->json($video);
        return view('admin.videos.edit',['videos' => $video]);
    }

    // persist the edited Video
    public function update(Request $request,Video $video )
    {
        $video  = $this->Save($request,$video);
        return redirect(route('videos.index'));
    }

    // Delete Video
    public function delete(Video $video){
        $video->delete();
        return redirect(route('videos.index'));

    }
}
