<div class="news-event-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news-inner-area">
                <h2 class="title-default-left">Latest News</h2>
                <ul class="news-wrapper">
                    @foreach ($berita as $beritas)
                        <li>
                            <div class="news-img-holder">
                                <a href="{{route('detail.berita', $beritas->slug)}}"><img src="{{asset('storage/images/berita/' .$beritas->thumbnail)}}" class="img-responsive" alt="news" style="max-height: 100px; max-weidth:100px"></a>
                            </div>
                            <div class="news-content-holder">
                                <h3><a href="{{route('detail.berita', $beritas->slug)}}">{{$beritas->title}}</a></h3>
                                <div class="post-date">{{Carbon\Carbon::parse($beritas->created_at)->format('d F Y')}}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="news-btn-holder">
                    <a href="{{route('berita')}}" class="view-all-accent-btn">Lihat Semua</a>
                </div>
            </div>

            {{-- Event --}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 event-inner-area">
                <h2 class="title-default-left">Upcoming Events</h2>
                <ul class="event-wrapper">
                    <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".1s">
                        <div class="event-calender-wrapper">
                            <div class="event-calender-holder">
                                <h3>26</h3>
                                <p>Jan</p>
                                <span>2017</span>
                            </div>
                        </div>
                        <div class="event-content-holder">
                            <h3><a href="single-event.html">Html MeetUp Conference 2017</a></h3>
                            <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                            <ul>
                                <li>04:00 PM - 06:00 PM</li>
                                <li>Australia , Melborn</li>
                            </ul>
                        </div>
                    </li>
                    <li class="wow bounceInUp" data-wow-duration="2s" data-wow-delay=".3s">
                        <div class="event-calender-wrapper">
                            <div class="event-calender-holder">
                                <h3>26</h3>
                                <p>Jan</p>
                                <span>2017</span>
                            </div>
                        </div>
                        <div class="event-content-holder">
                            <h3><a href="single-event.html">Workshop On UI Design</a></h3>
                            <p>Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation process facilitating Knowledge. Pellentese turpis dignissim amet area ducation.</p>
                            <ul>
                                <li>03:00 PM - 05:00 PM</li>
                                <li>Australia , Melborn</li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="event-btn-holder">
                    <a href="#" class="view-all-primary-btn">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>