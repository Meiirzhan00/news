<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use App\Models\Rubric;
use Illuminate\Http\Request;
use function view;

class PageController extends Controller
{
    public function index(){

        $allNews = News::orderBy('created_at','desc')->get();
        $count = 0;
        return view('pages.home',compact('allNews','count'));
    }

    public function pages($rubricName){

        $rubrics = Rubric::all();
        $rubricOne = Rubric::where('name',$rubricName)->first();
        return view('pages.rubricPages',compact('rubricOne','rubrics'));
    }

    public function onePage($id){
        //$rubric = Rubric::where('rubric_url',$id)->first();
        //$news = NewsRubric::where('rubric_id',$rubric->rubric_id)->get();

        $news = News::find($id);
        $rubrics = Rubric::all();
        $allAuthor = Author::all();

        return view('pages.onepage',compact('rubrics','allAuthor','news'));

    }

    public function search(Request $request){

        $searchText = $request['query'];
        $allNews = News::where('title','LIKE','%'.$searchText.'%')->get();

        return view('pages.search',compact('allNews'));
    }
}
