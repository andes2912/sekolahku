<div class="lecturers-area">
    <div class="container">
        <h2 class="title-default-left">Pengajar</h2>
    </div>
    <div class="container">
        <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
            @foreach ($pengajar as $pengajars)
                <div class="single-item">
                    <div class="lecturers1-item-wrapper">
                        <div class="lecturers-img-wrapper">
                            <a href="#"><img class="img-responsive" src="{{asset('storage/images/profile/' .$pengajars->foto_profile)}}" alt="team"></a>
                        </div>
                        <div class="lecturers-content-wrapper">
                            <h3 class="item-title"><a href="#">{{$pengajars->name}}</a></h3>
                            <span class="item-designation">{{$pengajars->userDetail->mengajar}}</span>
                            <ul class="lecturers-social">
                                <li><a href="{{$pengajars->userDetail->website}}" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a></li>
                                <li><a href="mailto:{{$pengajars->email}}"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                                <li><a href="{{'https://www.linkedin.com/in',$pengajars->linkedln}}" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="{{'https://www.twitter.com/',$pengajars->twitter}}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="{{'https://www.facebook.com/',$pengajars->facebook}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="{{'https://www.instagram.com/',$pengajars->instagram}}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>