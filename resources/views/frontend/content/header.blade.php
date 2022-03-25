<div id="header2" class="header4-area">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="header-top-left">
                        <div class="logo-area">
                            @if (@$footer->logo == NULL)
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo-footer.png')}}" alt="logo">
                        @else
                            <img class="img-responsive" src="{{asset('storage/images/logo/' .$footer->logo)}}" alt="logo">
                        @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="header-top-right">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:{{@$footer->telp}}"> {{@$footer->telp}} </a></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">{{@$footer->email}}</a></li>
                            <li>
                                @auth
                                    <a class="login-btn-area" href="/home"><i class="fa fa-home" aria-hidden="true"></i> {{Auth::user()->name}}</a>
                                @else
                                    <a class="login-btn-area" href="{{route('login')}}"><i class="fa fa-lock" aria-hidden="true"></i> Masuk</a>
                                @endauth
                            </li>
                            <li><a href="#" class="apply-now-btn2">Apply Now</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area bg-primary" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <nav id="desktop-nav">
                        <ul>
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href="">Profile Sekolah</a></li>
                                    <li><a href="">Visi dan Misi</a></li>
                                    <li><a href="">Struktur Organisasi</a></li>
                                    <li><a href="">Daftar Guru</a></li>
                                    <li><a href="">Akreditasi</a></li>
                                    <li><a href="">Prestasi</a></li>
                                </ul>
                            </li>
                           
                            <li><a href="#">Program</a>
                                <ul>
                                    <li class="has-child-menu"><a href="#">Program Studi</a>
                                        <ul class="thired-level">
                                            @foreach ($jurusanM as $jurusans)
                                                <li><a href=" {{ url('program', $jurusans->slug)}} "> {{$jurusans->nama}} </a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="has-child-menu"><a href="#">Kegiatan</a>
                                        <ul class="thired-level">
                                            @foreach ($kegiatanM as $kegiatans)
                                            <li><a href=" {{url('kegiatan', $kegiatans->slug)}} ">{{$kegiatans->nama}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a href=" {{route('berita')}} ">Berita</a></li>
                            <li><a href="#">PPDB</a>
                                <ul>
                                    <li><a href="">Informasi Pendaftaran</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#">Lainnya</a>
                                <ul>
                                    <li><a href="">Perpustakaan</a></li>
                                    <li><a href="">Alumni</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <div class="header-search">
                        <form>
                            <input type="text" class="search-form" placeholder="Search...." required="">
                            <a href="#" class="search-button" id="search-button"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li class="active"><a href="#">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href="">Profile Sekolah</a></li>
                                    <li><a href="">Visi dan Misi</a></li>
                                    <li><a href="">Struktur Organisasi</a></li>
                                    <li><a href="">Daftar Guru</a></li>
                                    <li><a href="">Akreditasi</a></li>
                                    <li><a href="">Prestasi</a></li>
                                </ul>
                            </li>
                           
                            <li><a href="#">Program</a>
                                <ul>
                                    <li class="has-child-menu"><a href="#">Program Studi</a>
                                        <ul class="thired-level">
                                            <li><a href="">Teknik Komputer Jariangan</a></li>
                                            <li><a href="">Akuntansi</a></li>
                                            <li><a href="">Teknik Kendarangan Ringan</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-child-menu"><a href="#">Kegiatan</a>
                                        <ul class="thired-level">
                                            <li><a href="">Ekstrakurikuler</a></li>
                                            <li><a href="">Program Unggulan</a></li>
                                            <li><a href="">Komunitas</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="">Berita</a></li>
                            <li><a href="#">PPDB</a>
                                <ul>
                                    <li><a href="">Informasi Pendaftaran</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#">Lainnya</a>
                                <ul>
                                    <li><a href="">Perpustakaan</a></li>
                                    <li><a href="">Alumni</a></li>
                                </ul>
                            </li>
                            <li><a href="">Masuk</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End -->