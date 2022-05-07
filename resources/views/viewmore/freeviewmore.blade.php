@extends('layouts.nav')
@section('title', 'Free packs')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('viewmore')}}/css/style.css">
    <link rel="stylesheet" href="{{url('viewmore')}}/font/fontawesome-free-6.0.0-web/fontawesome-free-6.0.0-web/css/all.min.css">
    <title>Free Packs View More</title>
</head>
<body>
    <div id="viewmore">
    <div id="viewmore-slider">
            <img id="imgg" onclick="changeImage()" src="{{url('viewmore')}}/img/slider/lpl.jpg" alt="">
            <div class="imgs-move">
                <i class="fa fa-chevron-circle-left" onclick="prev()"></i>
                <i class="fa fa-chevron-circle-right" onclick="next()"></i>
            </div>
        </div>

        <script>
            var arr_img = ["{{url('viewmore')}}/img/slider/lpl.jpg", "{{url('viewmore')}}/img/slider/summer_bonanza.jpg"];
            var index = 0;
            function prev() {
                // alert("prev");
                index--;
                if (index < 0 ) index = arr_img.length - 1;
                var imgg = document.getElementById("imgg");
                imgg.src = arr_img[index];
                
            }
            function next() {
                // alert("next");
                index++;
                if (index >= arr_img.length) index = 0;
                document.getElementById("imgg").src = arr_img[index];
            }
            setInterval("next()", 5000);
        </script>

        <div id="row">
            <div id="ebooks">
                <div class="sub-title">
                    <span class="sub_title_span">Latest Packs</span>
                </div>
                @foreach ($data as $pack)
                <div class="primeback">
                    <input type="hidden" class="course_id" value="4871">
                    <div class="primeback-video">
                        <div class="primeback-video-thumbnail">
                            <a href="{{url('ctqm-pack')}}/{{$pack->id}}">
                                <img src="{{url('viewmore')}}/img/{{ $pack->packs_name }}.jpg" alt="{{ $pack->packs_name }}" class="primeback-video-thumbnail__img">
                                <span class="primeback-video-thumbnail__icon"></span>
                            </a>
                        </div>

                        <div class="primeback-video-ribbon">
                            <span>
                                Free Pack
                            </span>
                        </div>

                        <div class="primeback-video-body">
                            <h4>
                                <a href="{{url('ctqm-pack')}}/{{$pack->id}}">{{ $pack->packs_name }}</a>
                            </h4>

                            <p class="primeback-video-body_details">
                                <i class="fa fa-play-circle"></i>
                                &nbsp;{{$pack->courses}} Courses &nbsp;&nbsp;
                                <span>
                                    <i class="fa fa-file-pdf"></i>
                                    &nbsp;1 eBooks
                                </span>
                            </p>

                            <div class="primeback-video-body__from">
                                <span><i>From CTQM</i></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

@stop()