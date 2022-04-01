<div class="bend niceties preview-1">
    <div id="ensign-nivoslider-3" class="slides" style="max-height: 550px">
        @foreach ($slider as $key => $images)
        <img src="{{asset('storage/images/slider/' .$images->image)}}" alt="slider" title="#slider-direction-{{$key+1}}" style="max-height: 550px"/>
        @endforeach
    </div>

    @foreach ($slider as $key => $sliders)
        <div id="slider-direction-{{$key+1}}" class="t-cn slider-direction">
            <div class="slider-content s-tb slide-{{$key+1}}">
                <div class="title-container s-tb-c">
                    <div class="title1">{{$sliders->title}}</div>
                    <p> {{$sliders->desc}} </p>
                    <div class="slider-btn-area">
                        <a href="{{url('ppdb')}}" class="default-big-btn">Daftar !</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>