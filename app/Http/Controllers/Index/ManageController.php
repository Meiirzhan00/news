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

class ManageController extends Controller
{
    public function index(){

        $authors = Author::all();
        $rubrics = Rubric::all();
        return view('news',compact('authors','rubrics'));
    }

    public function save(Request $request){

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

        $news->save();

        $rubrics = $request->rubrics;
        $rubricsID = array();

        foreach ($rubrics as $rubricID){

            $rubricsID[] = $rubricID;
        }

        $rubric = Rubric::find($rubricsID);
        $news->rubrics()->attach($rubric);

        return redirect('admin');

    }

    public function edit($id){

        $news = News::find($id);
        $authorID = Author::find($news->author_id)->id;
        $authors = Author::all();
        $rubrics = Rubric::all();

        $rubricArray = [];

        foreach ($news->rubrics as $rub){

            $rubricArray[] = $rub->id;
        }

        return view('edit',compact('news','authors','rubrics','authorID','rubricArray'));

    }

    public function saveNews($id,Request $request){

        $news = new News($id);

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

        $news->save();

        $rubrics = $request->rubrics;
        $rubricsID = array();

        foreach ($rubrics as $rubricID){

            $rubricsID[] = $rubricID;
        }

        $rubric = Rubric::find($rubricsID);
        $news->rubrics()->attach($rubric);

        return redirect('admin');

    }
    public function destroy($id){

        News::find($id)->delete();

        return redirect('admin')->with('success','News has been deleted!');
    }
}
