<!doctype html>
<html class="no-js" lang="">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    @include('layouts.Frontend.style')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        @yield('content')
        <!-- Header Area Start Here -->
        <header>
           @include('frontend.content.header')
        </header>
        <!-- Header Area End Here -->

        <!-- Slider 1 Area Start Here -->
        <div class="slider1-area overlay-default">
            @yield('slider')
        </div>
        <!-- Slider 1 Area End Here -->
        
        <!-- Service 1 Area Start Here -->
        {{-- <div class="service1-area">
            <div class="service1-inner-area">
                <div class="container">
                    <div class="row service1-wrapper">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="#">Scholarship Facility</a></h3>
                                <p>Eimply dummy text printing ypese tting industry.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="#">Skilled Lecturers</a></h3>
                                <p>Eimply dummy text printing ypese tting industry.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 service-box1">
                            <div class="service-box-content">
                                <h3><a href="#">Book Library & Store</a></h3>
                                <p>Eimply dummy text printing ypese tting industry.</p>
                            </div>
                            <div class="service-box-icon">
                                <i class="fa fa-book" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Service 1 Area End Here -->
        <!-- About 1 Area Start Here -->
        <div class="about1-area">
            @yield('about')
        </div>
        <!-- About 1 Area End Here -->

        <!-- Courses 1 Area Start Here -->
        {{-- <div class="courses1-area">
            <div class="container">
                <h2 class="title-default-left">Featured Courses</h2>
            </div>
            <div id="shadow-carousel" class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="20" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="true" data-r-large-dots="false">
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/1.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">Basic Philosopphy</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>40
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/2.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">GMAT</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>3 Months
                                        <br><span> Course</span></li>
                                    <li>30
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/3.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">IELTS</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>2 Months
                                        <br><span> Course</span></li>
                                    <li>24
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Classes</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/4.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">Regular MBA</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>50
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Time</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/5.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">Basic Philosopphy</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>40
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Time</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/6.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">GMAT</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>3 Months
                                        <br><span> Course</span></li>
                                    <li>30
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Time</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="courses-box1">
                        <div class="single-item-wrapper">
                            <div class="courses-img-wrapper hvr-bounce-to-bottom">
                                <img class="img-responsive" src="img/course/7.jpg" alt="courses">
                                <a href="single-courses1.html"><i class="fa fa-link" aria-hidden="true"></i></a>
                            </div>
                            <div class="courses-content-wrapper">
                                <h3 class="item-title"><a href="#">Regular MBA</a></h3>
                                <p class="item-content">Rmply dummy text printing setting industry it’s free demo.</p>
                                <ul class="courses-info">
                                    <li>1 Year
                                        <br><span> Course</span></li>
                                    <li>50
                                        <br><span> Classes</span></li>
                                    <li>10 am - 11 am
                                        <br><span> Time</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Courses 1 Area End Here -->

        <!-- Video Area Start Here -->
        <div class="video-area overlay-video bg-common-style" style="background-image: url('img/banner/1.jpg');">
            @yield('video')
        </div>
        <!-- Video Area End Here -->

        <!-- Lecturers Area Start Here -->
        <div class="lecturers-area">
            @yield('guru')
        </div>
        <!-- Lecturers Area End Here -->

        <!-- News and Event Area Start Here -->
        <div class="news-event-area">
            @yield('beritaEvent')
        </div>
        <!-- News and Event Area End Here -->

        <!-- Counter Area Start Here -->
        {{-- <div class="counter-area bg-primary-deep" style="background-image: url('img/banner/4.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".20s">
                        <h2 class="about-counter title-bar-counter" data-num="80">80</h2>
                        <p>PROFESSIONAL TEACHER</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".40s">
                        <h2 class="about-counter title-bar-counter" data-num="20">20</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".60s">
                        <h2 class="about-counter title-bar-counter" data-num="56">56</h2>
                        <p>NEWS COURSES EVERY YEARS</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 counter1-box wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".80s">
                        <h2 class="about-counter title-bar-counter" data-num="77">77</h2>
                        <p>REGISTERED STUDENTS</p>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Counter Area End Here -->

        <!-- Students Say Area Start Here -->
        {{-- <div class="students-say-area">
            <h2 class="title-default-center">What Our Students Say</h2>
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="img/students/1.jpg" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                                <span class="item-designation">UI Designer</span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.</div>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="img/students/2.jpg" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#">Dainel Dina</a></h3>
                                <span class="item-designation">Manager</span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.</div>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="img/students/1.jpg" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                                <span class="item-designation">UI Designer</span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.</div>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="img/students/2.jpg" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#">Dainel Dina</a></h3>
                                <span class="item-designation">Manager</span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.</div>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="img/students/1.jpg" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#">Rosy Janner</a></h3>
                                <span class="item-designation">UI Designer</span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.</div>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="single-item-wrapper">
                            <div class="profile-img-wrapper">
                                <a href="#" class="profile-img"><img class="profile-img-responsive img-circle" src="img/students/2.jpg" alt="Testimonial"></a>
                            </div>
                            <div class="tlp-tm-content-wrapper">
                                <h3 class="item-title"><a href="#">Dainel Dina</a></h3>
                                <span class="item-designation">Manager</span>
                                <ul class="rating-wrapper">
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                                <div class="item-content">Pellentesque tellus arcu, laoreet volutpavenenatis molestPellentesque commodo lorem lectus pretium vehicula.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Students Say Area End Here -->
        
        <!-- Students Join 1 Area Start Here -->
        {{-- <div class="students-join1-area">
            <div class="container">
                <div class="students-join1-wrapper">
                    <div class="students-join1-left">
                        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
                            <ul class="ri-grid-list">
                                <li>
                                    <a href="#"><img src="img/students/student1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student6.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student7.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student8.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student6.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student7.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student8.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student6.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student7.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student8.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student6.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student7.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="img/students/student8.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="students-join1-right">
                        <div>
                            <h2>Join<span> 29,12,093</span> Students.</h2>
                            <a href="#" class="join-now-btn">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Students Join 1 Area End Here -->
        <!-- Brand Area Start Here -->
        {{-- <div class="brand-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="2" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/1.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/2.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/3.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/4.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/1.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/2.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/3.jpg" alt="brand"></a>
                    </div>
                    <div class="brand-area-box">
                        <a href="#"><img src="img/brand/4.jpg" alt="brand"></a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Brand Area End Here -->
        <!-- Footer Area Start Here -->
        <footer>
            @include('frontend.content.footer')
        </footer>
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Body Area End Here -->
    @include('layouts.Frontend.scripts')
</body>

</html>
