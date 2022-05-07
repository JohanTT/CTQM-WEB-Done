@extends('layouts.nav')
@section('title', 'Library')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{url('library')}}/index.css">
	<link rel="stylesheet" href="{{url('library')}}/icon/themify-icons/themify-icons.css">
    <title>Library</title>
</head>
<body bgcolor="#ECECEC">
	<!--center-->
	<div id="center">
        @foreach($content as $content)
		<div class="header">
            @if($content->header1 != NULL)
                <div class="header_content">
                    <font class="header_content_font">
                        {{$content->header1}}
                    </font>
                </div>
                <div class="content">
                    <p class="content_text">
                        {{$content->content1}}
                    </p>
                </div>
            @endif
            @if($content->header2 != NULL)
                <div class="header_content">
                    <font class="header_content_font">
                        {{$content->header2}}
                    </font>
                </div>
                <div class="content">
                    <p class="content_text">
                        {{$content->content2}}
                    </p>
                </div>
            @endif
            @if($content->header3 != NULL)
                <div class="header_content">
                    <font class="header_content_font">
                        {{$content->header3}}
                    </font>
                </div>
                <div class="content">
                    <p class="content_text">
                        {{$content->content3}}
                    </p>
                </div>
            @endif
            @if($content->header4 != NULL)
                <div class="header_content">
                    <font class="header_content_font">
                        {{$content->header4}}
                    </font>
                </div>
                <div class="content">
                    <p class="content_text">
                        {{$content->content4}}
                    </p>
                </div>
            @endif
		</div>	
        @endforeach
		<div id="previous-next">
			<a href="#">
				<div id="before">
					Previous Page
				</div>
			</a>
			<a href="#">
				<div id="next">
					Next Page
				</div>
			</a>
		</div>
		<!-- begin_right_video -->
            <div id="prime">
                <div class="course-packs">
                    @foreach($pack as $pack)
                    <div class="prime-wrap">
                        <div class="prime-pack rounded">
                            <div class="ribbon-B">
                                <span>Prime Pack</span>
                            </div>
                            <!-- {{$pack->packs_name}} -->
                            <div class="course-card-thumbnail rounded">
                                <a href="ctqm-pack/{{$pack->id}}" target="_blank">
                                    <img class="rounded-img" src="{{url('viewmore')}}/img/{{ $pack->packs_name }}.jpg" alt="{{ $pack->packs_name }}" title="FullStack Web Development">
                                    <span class="prime-icon-trigger"></span>
                                </a>
                            </div>
                            <div class="primepack-card-body">
                                <h4 class="h48">
                                    <a href="ctqm-pack/{{$pack->id}}" title="FullStack Web Development">{{$pack->packs_name}}</a>
                                </h4>
                                <p class="videos-details">
                                    <i class="fa fa-play-circle"></i> &nbsp;{{$pack->courses}} Courses &nbsp;&nbsp;
                                    <span>
                                        <i class="fa fa-file-pdf"></i> &nbsp;2 eBooks </span>
                                    </span>
                                </p>
                            </div>
                            <div class="primeback-body">
                                <span>From CTQM</span>
                            </div>
                        </div>
                    </div>          
                    @endforeach
                </div>
            </div>
		<!-- end_right_video -->
	</div>
</body>
</html>
@stop()
