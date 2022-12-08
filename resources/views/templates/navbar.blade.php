<div class="container-fluid">
    <div class="nk-header-wrap">
        <div class="nk-menu-trigger d-xl-none ml-n1">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-header-brand d-xl-none">
            <a href="{{URL('/')}}" class="logo-link">
                <!-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark"> -->
                <img class="logo-light logo-img" src="{{asset('assets/images/logo-balimed.png')}}" srcset="{{asset('assets/images/logo-balimed.png')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('assets/images/logo-balimed.png')}}" srcset="{{asset('assets/images/logo-balimed.png')}}" alt="logo-dark">
            </a>
        </div><!-- .nk-header-brand -->
        <div class="nk-header-news d-none d-xl-block">
            <div class="nk-news-list">
                <a class="nk-news-item" href="#">
                    <div class="nk-news-icon">
                        <em class="icon ni ni-card-view"></em>
                    </div>
                    <div class="nk-news-text">
                        <!-- <p>Do you know the latest update of 2022? <span> A overview of our is now available on YouTube</span></p> -->
                        <p>Sistem Informasi Manajemen <span>CRUD<span></p>
                        <em class="icon ni ni-external"></em>
                    </div>
                </a>
            </div>
        </div><!-- .nk-header-news -->
        <div class="nk-header-tools">
            <ul class="nk-quick-nav">
                <li class="dropdown language-dropdown d-none d-sm-block mr-n1">
                    <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-toggle="dropdown">
                        <div class="quick-icon border border-light">
                            <img class="icon" src="./images/flags/english-sq.png" alt="">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-s1">
                        <ul class="language-list">
                            <li>
                                <a href="#" class="language-item">
                                    <img src="./images/flags/english.png" alt="" class="language-flag">
                                    <span class="language-name">English</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                    <span class="language-name">Español</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="./images/flags/french.png" alt="" class="language-flag">
                                    <span class="language-name">Français</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="language-item">
                                    <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                    <span class="language-name">Türkçe</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li><!-- .dropdown -->
                <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>substr(auth()->user()->name, 0, 1)</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">auth()->user()->name</span>
                                        <span class="sub-text">auth()->user()->email</span>
                                    </div>
                                    <div class="user-action">
                                        <a class="btn btn-icon mr-n2" href="html/user-profile-setting.html"><em class="icon ni ni-setting"></em></a>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner user-account-info">
                                <h6 class="overline-title-alt">Role Active</h6>
                                <div class="form-group">
                                    <select class="form-control select2" name="user_role" id="user_role">
                                        {{-- @foreach (session('roles') as $role)
                                            <option value="{{$role['role_id']}}" {{(session('role_active')['role_id'] == $role['role_id'] ? 'selected':'')}}>{{$role['role_name']}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>    
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="#"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="#">
                                            <em class="icon ni ni-dashboard"></em><span>Dashboard SSO</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="route('logout')"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <em class="icon ni ni-signout"></em><span>Sign out</span>
                                        </a>
                                        <form id="logout-form" action="route('logout')" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li><!-- .dropdown -->
                
            </ul><!-- .nk-quick-nav -->
        </div><!-- .nk-header-tools -->
    </div><!-- .nk-header-wrap -->
</div><!-- .container-fliud -->