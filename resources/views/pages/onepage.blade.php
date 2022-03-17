@extends('news.layout')

@section('title','OnePage')

@section('content')
    <!-- partial -->
    <div class="flash-news-banner">
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <span class="badge badge-dark mr-3">Flash news</span>
                    <p class="mb-0">
                        Lorem Ipsum has been the industry's standard dummy text ever
                        since the 1500s.
                    </p>
                </div>
                <div class="d-flex">
                    <span class="mr-3 text-danger">Wed, March 4, 2020</span>
                    <span class="text-danger">30°C,London</span>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" data-aos="fade-up">
                        <div class="card-body">
                            <div class="aboutus-wrapper">
                                <h1 class="mt-5 text-center mb-5" style="text-transform: uppercase;">
                                    {{$news->title}}
                                </h1>
                                <p class="font-weight-600 fs-15">
                                    {{$news->description}}
                                </p>
                                    <span> <strong>Author:</strong>
                                    @foreach($allAuthor as $author)
                                        {{$author::find($news->author_id)->name}}
                                        @break
                                    @endforeach
                                </span>
                                    <span class="ml-3">{{$news->created_at}}</span>
                                <p class="font-weight-600 fs-15 mb-5">
                                    {!! $news->text !!}
                                </p>
                                <div class="d-flex justify-content-center mt-5">
                                    <img
                                    src="/images/{{$news->image}}"
                                    alt="banner"
                                    class="img-fluid mb-5"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- container-scroller ends -->

@endsection

