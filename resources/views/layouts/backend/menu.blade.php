<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/home"><span class="brand-logo">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                    <h2 class="brand-text">Dashboard</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="/home"><i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                </a>
            </li>

            {{-- MENU ADMIN --}}
            @if (Auth::user()->role == 'Admin')
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Website</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('program-studi')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('program-studi.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Program</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-kegiatan')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-kegiatan.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Kegiatan</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-imageslider')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-imageslider.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Gambar Slider</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-about')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-about.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">About</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-video')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-video.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Video</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-kategori-berita')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-kategori-berita.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Kategori Berita</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-berita')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-berita.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-event')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-event.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Event</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-footer')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-footer.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Footer</span>
                        </a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Tentang</span></a>
                        <ul class="menu-content">
                            <li class="nav-item {{ (request()->is('backend-profile-sekolah')) ? 'active' : '' }}">
                                <a class="d-flex align-items-center" href="{{route('backend-profile-sekolah.index')}}"><span class="menu-item text-truncate" data-i18n="Third Level">Profile Sekolah</span></a>
                            </li>
                            <li class="nav-item {{ (request()->is('backend-visimisi')) ? 'active' : '' }}">
                                <a class="d-flex align-items-center" href="{{route('backend-visimisi.index')}}"><span class="menu-item text-truncate" data-i18n="Third Level">Visi dan Misi</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Pengguna</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('backend-pengguna-pengajar')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-pengajar.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Pengajar</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-pengguna-staf')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-staf.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Staf</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-pengguna-murid')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-murid.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Murid</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-pengguna-ppdb')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-ppdb.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">PPDB</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-pengguna-perpus')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-perpus.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Perpustakaan</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-pengguna-bendahara')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-bendahara.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Bendahara</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- MENU GURU --}}
            @elseif(Auth::user()->role == 'Guru')
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Data Murid</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href=""><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Kelas X</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href=""><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Kelas XI</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href=""><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Kelas XII</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- MENU GUEST --}}
            @elseif(Auth::user()->role == 'Guest')
            <li class="nav-item {{ (request()->is('ppdb/form-pendaftaran')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('ppdb.form-pendaftaran')}}"><i data-feather="book"></i>
                    <span class="menu-title text-truncate" data-i18n="Pendaftaran">Pendaftaran</span>
                </a>
            </li>

            {{-- MENU PPDB --}}
            @elseif(Auth::user()->role == 'PPDB')
            <li class="nav-item {{ (request()->is('ppdb/data-murid')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('data-murid.index')}}"><i data-feather="book"></i>
                    <span class="menu-title text-truncate" data-i18n="Data Calon Murid">Data Calon Murid</span>
                </a>
            </li>

            {{-- MENU PERPUSTAKAAN --}}
             @elseif(Auth::user()->role == 'Perpustakaan')
              <li class="nav-item {{ (request()->is('perpus/books')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{route('books.index')}} "><i data-feather="book"></i>
                    <span class="menu-title text-truncate" data-i18n="Books">Books</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('perpus/kategori')) ? 'active' : '' }}">
                 <a class="d-flex align-items-center" href=" {{route('kategori.index')}} "><i data-feather="list"></i>
                    <span class="menu-title text-truncate" data-i18n="Category">Category</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('perpus/member')) ? 'active' : '' }}">
                 <a class="d-flex align-items-center" href=" {{route('member.index')}} "><i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Members">Members</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('perpus/publisher')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('publisher.index')}}"><i data-feather="user"></i>
                    <span class="menu-title text-truncate" data-i18n="Publisher">Publisher</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('books/author')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('author.index')}}"><i data-feather="user-check"></i>
                    <span class="menu-title text-truncate" data-i18n="Authors">Authors</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('perpus/peminjam')) ? 'active' : '' }}">
                 <a class="d-flex align-items-center" href="{{route('peminjam.index')}}"><i data-feather="briefcase"></i>
                    <span class="menu-title text-truncate" data-i18n="Members">Peminjam</span>
                </a>
              </li>

            {{-- MENU MURID --}}
            @elseif(Auth::user()->role == 'Murid')
              <li class="nav-item {{ (request()->is('murid/perpustakaan')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{route('perpustakaan.index')}} "><i data-feather="book"></i>
                    <span class="menu-title text-truncate" data-i18n="Books">Perpustakaan</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('murid/pembayaran')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{route('pembayaran.index')}} "><i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Books">Pembayaran</span>
                </a>
              </li>

            {{-- MENU BENDAHARA --}}
            @elseif(Auth::user()->role == 'Bendahara')
              <li class="nav-item {{ (request()->is('spp/murid')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{route('spp.murid.index')}} "><i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Books">Pembayaran</span>
                </a>
              </li>
            @endif
        </ul>
    </div>
</div>