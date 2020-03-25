<?php

namespace App\Http\Controllers;

use App\NewsUser;
use Illuminate\Http\Request;

class NewsUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveNews(Request $request)
    {
        $newsuser                  = new NewsUser();
        $newsuser->title           = $request->title;
        $newsuser->source          = $request->source;
        $newsuser->description     = $request->description;
        $newsuser->url             = $request->url;
        $newsuser->imageUrl        = $request->imageUrl;
        $newsuser->newsPublishedAt = $request->newsPublishedAt;
        $newsuser->newsContent     = $request->newsContent;
        $newsuser->save();
        return response()->json(['success']);
    }

    public function index()
    {
        $myNews = NewsUser::orderBy('id', 'desc')->paginate(9);
        return view('newsuser.index', compact('myNews'));
    }

    public function delete(Request $request, $id)
    {
        $deleteNews = NewsUser::findOrFail($id);
        $deleteNews->delete();
        return redirect()->back();
    }
}
