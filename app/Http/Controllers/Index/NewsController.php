<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\News;
use App\Models\Rubric;
use Illuminate\Http\Request;
use function public_path;
use function redirect;
use function view;

class NewsController extends Controller
{
    public function index(){

        $allNews = News::all();

        $allAuthor = Author::all();
        $allRubric = Rubric::all();
        $count = 1;
        return view('admin.index',compact('allNews','allRubric','allAuthor','count'));
    }

    public function create(){

        $authors = Author::all();
        $rubrics = Rubric::all();
        return view('admin.create',compact('authors','rubrics'));
    }

    public function store(Request $request){

        $news = new News();

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,svg,gif'
        ]);

        if ($request->hasFile('image')){

            $fileName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'),$fileName);
            $news->image = $fileName;
        }

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');
        $news->author_id = $request->input('author_id');
       // $news->news_url = dsada($request->title);
        $news->save();

        $rubrics = $request->rubrics;
        $rubricsID = array();

        foreach ($rubrics as $rubricID){

            $rubricsID[] = $rubricID;
        }

        $rubric = Rubric::find($rubricsID);
        $news->rubrics()->sync($rubric);

        return redirect()->route('admin.index')->with('success','News created successfully.');

    }

    public function edit($id){

        $news = News::find($id);
        $authorID = Author::find($news->author_id);
        $authors = Author::all();
        $rubrics = Rubric::all();

        $rubricArray = [];

        foreach ($news->rubrics as $rub){

            $rubricArray[] = $rub->id;
        }

        return view('admin.edit',compact('news','authors','rubrics','authorID','rubricArray'));

    }


    public function update(Request $request, $id){

        $news = News::find($id);

        if ($request->hasFile('image')){

            $fileName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'),$fileName);
            $news->image = $fileName;
        }

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->text = $request->input('text');
        $news->author_id = $request->input('author_id');

        $news->update();

        $rubrics = $request->rubrics;
        $rubricsID = array();


        foreach ($rubrics as $rubricID){

            $rubricsID[] = $rubricID;
        }

        $rubric = Rubric::find($rubricsID);
        $news->rubrics()->sync($rubric);

        return redirect()->route('admin.index')->with('success','News updated successfully.');

    }

    public function destroy($id){

        News::find($id)->delete();
        return redirect()->route('admin.index')->with('success','News deleted successfully');
    }
}
