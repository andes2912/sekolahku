<div class="bend niceties preview-1">
    <div id="ensign-nivoslider-3" class="slides" style="max-height: 550px">
        @foreach ($slider as $key => $images)
        <img src="{{asset('storage/images/slider/' .$images->image)}}" alt="slider" title="#slider-direction-{{$key+1}}" style="max-height: 550px"/>
        @endforeach
    </div>
    <div id="slider-direction-1" class="t-cn slider-direction">
        <div class="slider-content s-tb slide-1">
            <div class="title-container s-tb-c">
                <div class="title1">Best Education For Design</div>
                <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard
                    <br>dummy text ever sinceprinting and typesetting industry. </p>
                <div class="slider-btn-area">
                    <a href="#" class="default-big-btn">Daftar !</a>
                </div>
            </div>
        </div>
    </div>
    <div id="slider-direction-2" class="t-cn slider-direction">
        <div class="slider-content s-tb slide-2">
            <div class="title-container s-tb-c">
                <div class="title1">Best Education For HTML Template</div>
                <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard
                    <br>dummy text ever sinceprinting and typesetting industry. </p>
                <div class="slider-btn-area">
                    <a href="#" class="default-big-btn">Daftar !</a>
                </div>
            </div>
        </div>
    </div>
    <div id="slider-direction-3" class="t-cn slider-direction">
        <div class="slider-content s-tb slide-3">
            <div class="title-container s-tb-c">
                <div class="title1">Best Education Into PHP</div>
                <p>Emply dummy text of the printing and typesetting industry orem Ipsum has been the industry's standard
                    <br>dummy text ever sinceprinting and typesetting industry. </p>
                <div class="slider-btn-area">
                    <a href="#" class="default-big-btn">Daftar !</a>
                </div>
            </div>
        </div>
    </div>
</div>