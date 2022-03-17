@extends('news.layout')

@section('title','World Time')

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
                <div class="row" data-aos="fade-up">
                    <div class="col-xl-8 stretch-card grid-margin">
                        <div class="position-relative">
                            <img
                                src="assets/images/dashboard/banner.jpg"
                                alt="banner"
                                class="img-fluid"
                            />
                            @foreach($allNews as $news)
                                @if($news->title == 'GLOBAL PANDEMIC')
                                    <div class="banner-content">
                                        <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                                            global news
                                        </div>
                                        <h1 class="mb-0">
                                            <a href="{{route('onePage',$news->id)}}" style="color: white;">{{$news->title}}
                                            </a>
                                        </h1>
                                        <h1 class="mb-2">
                                            {{$news->description}}
                                        </h1>
                                        <div class="fs-12">
                                            <span class="mr-2">Photo </span>{{$news->created_at}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xl-4 stretch-card grid-margin">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <h2>Latest news</h2>
                                    @foreach($allNews->slice(0, 3) as $key=>$news)
                                    <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                                        <div class="pr-3">
                                            <h5>
                                                <a href="{{route('onePage',$news->id)}}" style="color: white;">{{$news->title}}
                                                </a>
                                            </h5>
                                            <div class="fs-12">
                                                <span class="mr-2">Photo </span>{{$news->created_at}}
                                            </div>
                                        </div>
                                        <div class="rotate-img">
                                            <img
                                                src="/images/{{$news->image}}"
                                                alt="thumb"
                                                class="img-fluid img-lg"
                                            />
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-3 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h2>Category</h2>
                                <ul class="vertical-menu">
                                    @foreach(\App\Models\Rubric::all() as $rubric)
                                    <li><a href="{{route('page',$rubric->name)}}" style="text-transform: capitalize;">{{$rubric->name}}</a></li>
                                    @endforeach
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Media</a></li>
                                    <li><a href="#">Administration</a></li>
                                    <li><a href="#">Health care</a></li>
                                    <li><a href="#">Game</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Kids</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 stretch-card grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($allNews->slice(0,3) as $news)
                                    <div class="col-sm-4 grid-margin">
                                        <div class="position-relative">
                                            <div class="rotate-img">
                                                <img
                                                    src="/images/{{$news->image}}"
                                                    alt="thumb"
                                                    class="img-fluid"
                                                />
                                            </div>
                                            <div class="badge-positioned">
                                                <span class="badge badge-danger font-weight-bold">Flash news</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8  grid-margin">
                                        <h2 class="mb-2 font-weight-600">
                                            <a href="{{route('onePage',$news->id)}}" style="color: #3a3a3a;">{{$news->title}}
                                            </a>
                                        </h2>
                                        <div class="fs-13 mb-2">
                                            <span class="mr-2">Photo </span>{{$news->created_at}}
                                        </div>
                                        <p class="mb-0">
                                            {{$news->description}}
                                        </p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card-title">
                                            Video
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 grid-margin">
                                                <div class="position-relative">
                                                    <div class="rotate-img">
                                                        <a href="https://www.youtube.com/watch?v=DFulMvsb6Y0&list=RDMMDFulMvsb6Y0&start_radio=1"><img
                                                            src="assets/images/dashboard/home_7.jpg"
                                                            alt="thumb"
                                                            class="img-fluid"
                                                            /></a>
                                                    </div>
                                                    <div class="badge-positioned w-90">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center"
                                                        >
                                  <span
                                      class="badge badge-danger font-weight-bold"
                                  >Lifestyle</span
                                  >
                                                            <div class="video-icon">
                                                                <i class="mdi mdi-play"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 grid-margin">
                                                <div class="position-relative">
                                                    <div class="rotate-img">
                                                        <a href="https://www.youtube.com/watch?v=4EKnpEHVMrc"><img
                                                            src="assets/images/dashboard/home_8.jpg"
                                                            alt="thumb"
                                                            class="img-fluid"
                                                            /></a>
                                                    </div>
                                                    <div class="badge-positioned w-90">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center"
                                                        >
                                  <span
                                      class="badge badge-danger font-weight-bold"
                                  >National News</span
                                  >
                                                            <div class="video-icon">
                                                                <i class="mdi mdi-play"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 grid-margin">
                                                <div class="position-relative">
                                                    <div class="rotate-img">
                                                        <a href="https://www.youtube.com/watch?v=ksM0Et2g0tM"><img
                                                            src="assets/images/dashboard/home_9.jpg"
                                                            alt="thumb"
                                                            class="img-fluid"
                                                            /></a>
                                                    </div>
                                                    <div class="badge-positioned w-90">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center"
                                                        >
                                  <span
                                      class="badge badge-danger font-weight-bold"
                                  >Lifestyle</span
                                  >
                                                            <div class="video-icon">
                                                                <i class="mdi mdi-play"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6 grid-margin">
                                                <div class="position-relative">
                                                    <div class="rotate-img">
                                                        <a href="https://www.youtube.com/watch?v=4xVR4vI5iuc"><img
                                                            src="assets/images/dashboard/home_10.jpg"
                                                            alt="thumb"
                                                            class="img-fluid"
                                                            /></a>
                                                    </div>
                                                    <div class="badge-positioned w-90">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center"
                                                        >
                                  <span
                                      class="badge badge-danger font-weight-bold"
                                  >National News</span
                                  >
                                                            <div class="video-icon">
                                                                <i class="mdi mdi-play"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div
                                            class="d-flex justify-content-between align-items-center"
                                        >
                                            <div class="card-title">
                                                Latest Video
                                            </div>
                                            <p class="mb-3">See all</p>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between align-items-center border-bottom pb-2"
                                        >
                                            <div class="div-w-80 mr-3">
                                                <div class="rotate-img">
                                                    <img
                                                        src="assets/images/dashboard/home_11.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                            </div>
                                            <h3 class="font-weight-600 mb-0">
                                                Apple Introduces Apple Watch
                                            </h3>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                                        >
                                            <div class="div-w-80 mr-3">
                                                <div class="rotate-img">
                                                    <img
                                                        src="assets/images/dashboard/home_12.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                            </div>
                                            <h3 class="font-weight-600 mb-0">
                                                SEO Strategy & Google Search
                                            </h3>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                                        >
                                            <div class="div-w-80 mr-3">
                                                <div class="rotate-img">
                                                    <img
                                                        src="assets/images/dashboard/home_13.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                            </div>
                                            <h3 class="font-weight-600 mb-0">
                                                Cycling benefit & disadvantag
                                            </h3>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between align-items-center border-bottom pt-3 pb-2"
                                        >
                                            <div class="div-w-80 mr-3">
                                                <div class="rotate-img">
                                                    <img
                                                        src="assets/images/dashboard/home_14.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                            </div>
                                            <h3 class="font-weight-600">
                                                The Major Health Benefits of
                                            </h3>
                                        </div>
                                        <div
                                            class="d-flex justify-content-between align-items-center pt-3"
                                        >
                                            <div class="div-w-80 mr-3">
                                                <div class="rotate-img">
                                                    <img
                                                        src="assets/images/dashboard/home_15.jpg"
                                                        alt="thumb"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                            </div>
                                            <h3 class="font-weight-600 mb-0">
                                                Powerful Moments of Peace
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
    <!-- container-scroller ends -->
@endsection
