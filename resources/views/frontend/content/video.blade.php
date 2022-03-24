<div class="video-area overlay-video bg-common-style" style="background-image: url('{{asset('Assets/frontend/img/banner/1.jpg')}}');">
    @if ($video != NULL)
        <div class="container">
            <div class="video-content">
                <h2 class="video-title">{{$video->title}}</h2>
                <p class="video-sub-title"> {{$video->desc}} </p>
                <a class="play-btn popup-youtube wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s" href="{{$video->url}}"><i class="fa fa-play" aria-hidden="true"></i></a>
            </div>
        </div>
    @endif
</div>