<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-sm-6 offset-3">
                <form action="{{route('admin.update',$news->id)}}" method="post" class="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3 class="display-5 text-center">Add News</h3>
                    <div class="form-group mt-3">
                        <div class="d-flex justify-content-center">
                            <img src="/images/{{$news->image}}" style="width: 200px; height: 200px; display: block" class="mb-2">
                        </div>
                        <label>News Image: </label>
                        <input type="file" name="image" class="form-control mt-2">
                    </div>
                    <div class="form-group mt-4">
                        <label>Title: </label>
                        <input type="text" name="title" class="form-control mt-2" value="{{$news->title}}">
                    </div>
                    <div class="form-group mt-4">
                        <label>Description: </label>
                        <textarea type="text" name="description" class="form-control mt-2">{{$news->description}}</textarea>
                    </div>
                    <div class="form-group mt-4">
                        <label class="mb-2">Text: </label>
                        <textarea type="text" name="text" class="form-control ckeditor" id="editor">{{$news->text}}</textarea>
                    </div>
                    <div class="form-group mt-4">
                        <label>Author: </label>
                        <select name="author_id" class="form-control form-select mt-2">
                            @foreach($authors as $author)
                                <option value="{{$author->id}}"{{ ($author->id == $authorID->id) ? 'selected' : '' }}>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-4">
                        <label class="mb-2">Rubric: </label>
                        @foreach($rubrics as $index => $rubric)
                        <div class="form-check ">
                            <input class="form-check-input" type="checkbox" name="rubrics[]" value="{{$rubric->id}}"
                                   @if(in_array($index+1, $rubricArray)) checked @endif
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckChecked">
                                {{$rubric->name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="[ckeditor-build-path]/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
