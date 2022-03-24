<div class="about1-area">
    @if ($about != NULL)
        <div class="container">
            <h1 class="about-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s">{{$about->title}}</h1>
            <p class="about-sub-title wow fadeIn" data-wow-duration="1s" data-wow-delay=".2s"> {{$about->desc}} </p>
            <div class="about-img-holder wow fadeIn" data-wow-duration="2s" data-wow-delay=".2s">
                <img src="{{asset('storage/images/about/' .$about->image)}}" alt="about" class="img-responsive" style="max-height: 328px; max-weidth:650px"/>
            </div>
        </div>
    @endif
</div>