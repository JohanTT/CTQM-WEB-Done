@extends('layouts.nav')
@section('title', 'Prime packs')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('video')}}/css/styles.css">
    <link rel="stylesheet" href="{{url('comment')}}/styles.css">
    <link rel="stylesheet" href="{{url('star')}}/styles.css">
    <link rel="stylesheet" href="{{url('video')}}/fonts/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{url('video')}}/fonts/fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Prime Packs</title>
</head>
<body>
@foreach ($data as $pack)
    <div id="content">
        <div class="banner">
            <div class="banner__details">
                <h1>{{$pack->packs_name}}</h1>
                <div class="banner__subtitle">
                    <p>{{$pack->punch_line}}</p>
                    @if ($check == NULL) 
                    <form action="{{url('/add-pack')}}/{{$pack->id}}" method="post">
                        @csrf
                        @if($pack->price > 0)
                        <button>Get pack with {{$pack->price}} US$</button>
                        @else
                        <button>Get pack for FREE</button>
                        @endif
                    </form>
                    @else 
                        <button class="letgo-btn">Let's go!</button>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('status') }}
                    </div>
                    @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('failed') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="course__video">
            <div class="course__content--button">
                <button class="syllabus run">
                    <h2>Overview</h2>
                </button>

                <button class="overview">
                    <h2>Syllabus</h2>
                </button>
            </div>
            <div class="course__content--wrapper">
                <div class="course__content--overview">
                    <h4>Introduct</h4>
                    <p>{{$pack->introduct}}</p>
                    <h4>Why Should you get this Prime Pack</h4>
                    <p>{{$pack->whyshould}}</p>
                    <h4>Goals</h4>
                    <p>{{$pack->goals}}</p>
                    @foreach($instructor as $instructor)
                    <h4>Instructor</h4>
                    
                    <h5><a href="{{url('/instructor')}}/{{$instructor->id}}">{{$instructor->user_name}}</a></h5>
                    <label class="rating-label"> <strong>Average rating is {{$instrucStar}} <code>readonly</code></strong>
                                <input
                                class="rating"
                                max="5"
                                readonly
                                step="0.01"
                                style="--fill:rgb(159, 87, 87);--value:{{$instrucStar}}"
                                type="range"
                                value="{{$instrucStar}}">
                            </label>
                    <p>{{$instructor->introduct}}</p>
                    @endforeach
                </div>
                <div class="course__content--packs">
                    @foreach($videoTitle as $item)
                    <div class="content__wrapper">
                        <div class="packs__header">
                            <button class="header__wrapper">
                                <h2>
                                    {{$item->header}}
                                    <sgv class="view-more fa fa-angle-down" aria-hidden="true"></sgv>
                                </h2>
                                <div class="total-count">
                                    <span>
                                        {{$item->total}} Lectures
                                    </span>
                                </div>
                            </button>
                        </div>
                        <div class="packs__list">
                            @foreach($video as $tmp) 
                                @if($tmp->syllabus_id == $item->id)
                                <div class="list__items" value="{{$tmp->id}}">
                                    <div class="items__wrapper">
                                        <div class="items__border">
                                            <i class="ti-book"></i>
                                        </div>    
                                    </div>
                                    <a class="items__label">
                                        <div class="label__title">
                                            <span>Video</span>
                                            <span>{{$tmp->Content}}</span>
                                        </div>
                                        @if ($item->stt == 1) 
                                        <div class="video" src="{{url('video')}}/videos/{{$tmp->Content}}.html" muted></div>
                                        @else <div class="video" src="{{url('video')}}/videos/tmp.mp4"></div>
                                        @endif
                                    </a>
                                    @if ($check != NULL)
                                        @if ($item->stt < $check[0]['at'])
                                            <div class="items__logo" style="background-color: #19a39a !important;">
                                                <span>CTQM</span>
                                            </div>
                                        @elseif ($item->stt == $check[0]['at'] && $tmp->stt < $check[0]['process'])
                                            <div class="items__logo" style="background-color: #19a39a !important;">
                                                <span>CTQM</span>
                                            </div>
                                        @else 
                                            <div class="items__logo">
                                                <span>CTQM</span>
                                            </div>
                                        @endif
                                    @else 
                                        <div class="items__logo">
                                            <span>CTQM</span>
                                        </div>
                                    @endif
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="popup-video">
                        <a href="#">
                            <span>&times;</span>
                        </a>
                        <iframe src="#" muted autoplay controls></iframe>
                    </div>
                    @endforeach
                </div>
                <div class="course__box--sticky">
                    <aside class="sticky__infoBox">
                        <div class="video__container">
                            <video class="video" src="{{url('video')}}/videos/intro.mp4" pause>
                            </video>
                            <i class="fa fa-play play" aria-hidden="true"></i>
                            <i class="fa fa-pause pause" aria-hidden="true"></i>
                        </div>
                        <p class="infoBox__text">
                            by
                            <span class="logo">CTQM</span>
                        </p>
                        <p class="infoBox__text">
                            Time to Complete
                            <span>{{$pack->time_cpl}} Hours</span>
                        </p>
                        <p class="infoBox__text">
                            Lectures
                            <span>{{$pack->lectures}}</span>
                        </p>
                        <p class="infoBox__text">
                            <label class="rating-label"><strong>Average rating is {{$star}} <code>readonly</code></strong>
                                <input
                                class="rating"
                                max="5"
                                readonly
                                step="0.01"
                                style="--fill:rgb(159, 87, 87);--value:{{$star}}"
                                type="range"
                                value="{{$star}}">
                            </label>
                        </p>
                        <p class="infoBox__text">
                            <span>Prerequisites</span>
                            
                            @if ($pack->pre_3 != NULL) 
                                <li>{{$pack->pre_1}}</li>
                                <li>{{$pack->pre_2}}</li>
                                <li>{{$pack->pre_3}}</li>
                            @endif
                        </p>
                        <div class="infoBox__text">
                            <form action="{{url('/rating')}}/{{$pack->id}}" method="post">
                                @csrf
                                <!-- rating -->
                                <span>Rating pack</span>
                                @if (session('ratingSuccessed'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('ratingSuccessed') }}
                                    </div>
                                @endif
                                @if (session('ratingFailed'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('ratingFailed') }}
                                    </div>
                                @endif
                                <button>Rating</button>
                                <div id="rating">
                                        <input type="radio" id="star5" name="rating" value="5"/>
                                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>

                                        <input type="radio" id="star4half" name="rating" value="4.5" />
                                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        
                                        <input type="radio" id="star4" name="rating" value="4" />
                                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        
                                        <input type="radio" id="star3half" name="rating" value="3.5" />
                                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        
                                        <input type="radio" id="star3" name="rating" value="3" />
                                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        
                                        <input type="radio" id="star2half" name="rating" value="2.5" />
                                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        
                                        <input type="radio" id="star2" name="rating" value="2" />
                                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        
                                        <input type="radio" id="star1half" name="rating" value="1.5" />
                                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        
                                        <input type="radio" id="star1" name="rating" value="1" />
                                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        
                                        <input type="radio" id="starhalf" name="rating" value="0.5" />
                                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
            <!-- comment -->
            <div class='snippet-body'>
                <div class="container mt-5 mb-5">
                    <div class="d-flex justify-content-center row">
                        <div class="d-flex flex-column col-md-8">
                            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                                <div class="profile-image"></div>
                                <div class="d-flex flex-column ml-3">
                                    <div class="d-flex flex-row post-title">
                                        <h5>{{$pack->packs_name}}</h5>
                                    </div>
                                    <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">CTQM</span><span class="mr-2 comments">{{$commentTotal}} comments&nbsp;</span><span class="mr-2 dot"></span></div>
                                </div>
                            </div>
                            <div class="coment-bottom bg-white p-2 px-4">
                                <form class="d-flex flex-row add-comment-section mt-4 mb-4" action="{{url('/add-comment')}}/{{$pack->id}}" method="post">
                                    @csrf
                                    <input type="text" class="form-control mr-3" name="content" placeholder="Let everyone know what you think!">
                                        <button class="btn btn-primary" type="submit">
                                            Comment
                                        </button>
                                </form>
                                @if (session('commentSuccessed'))
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('commentSuccessed') }}
                                    </div>
                                @endif
                                @if (session('commentFailed'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        {{ session('commentFailed') }}
                                    </div>
                                @endif
                                @foreach($comment as $cmt) 
                                <div class="commented-section mt-2">
                                    <div class="d-flex flex-row align-items-center commented-user">
                                        <h5 class="mr-2">{{$cmt->nick_name}}</h5><span class="dot mb-1"></span>
                                        <!-- <a class="ml-2 mt-1">Edit</a> -->
                                    </div>
                                    <div class="comment-text-sm"><span>{{$cmt->content}}</span>
                                    </div>
                                    <div class="reply-section">
                                        <div class="d-flex flex-row align-items-center voting-icons">
                                            <a class="fa fa-sort-up fa-2x mt-3 hit-voting" href="{{url('/increase-vote')}}/{{$cmt->id}}"></a>
                                            <a class="fa fa-sort-down fa-2x mb-3 hit-voting" href="{{url('/decrease-vote')}}/{{$cmt->id}}"></a>
                                            <span class="ml-2">
                                                {{$cmt->vote}}
                                            </span><span class="dot ml-2"></span>
                                            @if ($cmt->nick_name == session('username'))
                                            <a class="ml-2 mt-1 bdge mr-1" href="{{url('/delete-comment')}}/{{$cmt->id}}">Delete</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
</body>

<script>
    // Lấy node của từng thằng tương tác
    var syllabus_btn = document.querySelector('#content .syllabus');
    var overview_btn = document.querySelector('#content .overview');
    var syllabus_ctn = document.querySelector('#content .course__content--packs');
    var overview_ctn = document.querySelector('#content .course__content--overview');
    var overview_ctn_sticky = document.querySelector('#content .course__box--sticky');
    var letgo_btn = document.querySelector('#content .letgo-btn');
    
    var setStar = document.querySelectorAll('input[name="rating"]');
    for (let i = 0; i < setStar.length; i++) {
        if (setStar[i].value == {{$userStar}}) setStar[i].setAttribute("checked", "checked");
    }
    // setAttribute("checked", "checked");
    // gán chạy mặc định cho thằng đầu tiên
    // thêm 2 lệnh if để đảm bảo chuyển giữa các tab không có vấn đề
    // do gặp trục chặc trong vấn đề disable display none
    // nên đành phải tráo tên của 2 thằng syllabus - viewmore

    syllabus_ctn.classList.add('run');
    syllabus_btn.onclick = function() {
        if (!syllabus_ctn.classList.contains('run')) {
            syllabus_btn.classList.add('run');
            syllabus_ctn.classList.add('run');
        }
        if (overview_ctn.classList.contains('run')) 
        {
            overview_btn.classList.remove('run');
            overview_ctn.classList.remove('run');
            overview_ctn_sticky.classList.remove('run');
        }
    }

    overview_btn.onclick = function() {
        if (syllabus_ctn.classList.contains('run')) 
        {
            syllabus_btn.classList.remove('run');
            syllabus_ctn.classList.remove('run');
        }
        if (!overview_ctn.classList.contains('run')) 
        {
            overview_btn.classList.add('run');
            overview_ctn.classList.add('run');
            overview_ctn_sticky.classList.add('run');
        }
    }

    // Hiện và ẩn khoá học
    var take_list = document.querySelectorAll('#content .packs__header');
    var show_list = document.querySelectorAll('#content .packs__list')
    for (let i = 0; i < take_list.length; i++) {
        take_list[i].onclick = function() {
            show_list[i].classList.toggle('show');
        }
    }    

    // play video on sticky box
    var play_vid = document.querySelector('#content .course__box--sticky .video__container .play');
    play_vid.onclick = () => {
        document.querySelector('#content .course__box--sticky .video__container video').play();
        document.querySelector('#content .course__box--sticky .video__container .pause').style.display = "block";
        play_vid.style.display = "none";
    }

    var pause_vid = document.querySelector('#content .course__box--sticky .video__container .pause');
    pause_vid.onclick = () => {
        document.querySelector('#content .course__box--sticky .video__container video').pause();
        document.querySelector('#content .course__box--sticky .video__container .play').style.display = "block";
        pause_vid.style.display = "none";
    }

    letgo_btn.onclick = function() {
        if (syllabus_ctn.classList.contains('run')) 
        {
            syllabus_btn.classList.remove('run');
            syllabus_ctn.classList.remove('run');
        }
        if (!overview_ctn.classList.contains('run')) 
        {
            overview_btn.classList.add('run');
            overview_ctn.classList.add('run');
            overview_ctn_sticky.classList.add('run');
        }
    }

    // popup video
    var popup = document.querySelectorAll('#content .list__items');
    popup.forEach(vid => {
        vid.onclick = () => {
            document.querySelector('.popup-video').style.display = 'block';
            document.querySelector('.popup-video iframe').src = vid.querySelector('.video').getAttribute('src');
            // document.querySelector('.popup-video a').setAttribute("href", "{{url('/update-process')}}" + "/" + vid.getAttribute('value'));
            document.querySelector('.popup-video a').href = "{{url('/update-process')}}" + "/" + vid.getAttribute('value');
            // $.post('/update-process/ƠƠ{id?}', 
            // {id: vid.getAttribute('value') },
            // function() {

            //     console.log(id);
            // })
            // $("#content .list__items").click(function(event) {
                // event.preventDefault();
                // // if (vid.getAttribute('value') == )
                // var id = $(vid).attr('value');
                // // console.log(id);
                // $.ajax({
                //     url: "update-process/", {field1: id},
                //     type: "POST",
                //     data: {
                //         id: id
                //     },
                //     // success:function
                // });
            // });
        }
    });

    var close_vid = document.querySelector('.popup-video span');
    close_vid.onclick = () => {
        document.querySelector('.popup-video').style.display = 'none';
        document.querySelector('.popup-video iframe').pause();

    }
</script>

</html>

@stop()