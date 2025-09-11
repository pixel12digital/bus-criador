<!--====== Header Section start ======-->
<header class="header-three sticky-header
@if (!request()->routeIs('front.user.detail.view')) bg-white @endif
">
    <!-- Header Menu  -->
    <div class="header-nav">
        <div class="container-fluid">
            <div class="nav-container mobile-rs-nav">
                <!-- Site Logo -->
                <div class="site-logo">
                    @if (!empty($userBs->logo))
                        <a href="{{ route('front.user.detail.view', getParam()) }}"><img
                                src="{{ asset('assets/front/img/user/' . $userBs->logo) }}" alt="Logo"></a>
                    @endif
                </div>

                <!-- Main Menu -->
                <div class="nav-menu d-lg-flex align-items-center">

                    <!-- Navbar Close Icon -->
                    <div class="navbar-close">
                        <div class="cross-wrap"><span></span><span></span></div>
                    </div>

                    <!-- Pushed Item -->
                    <div class="nav-pushed-item"></div>

                    <!-- Mneu Items -->
                    <div class="menu-items">
                        <ul>
                            @php
                                $links = json_decode($userMenus, true);
                            @endphp
                            @foreach ($links as $link)
                                @php
                                    $href = getUserHref($link);
                                @endphp
                                @if (!array_key_exists('children', $link))
                                    <li><a href="{{ $href }}"
                                            target="{{ $link['target'] }}">{{ $link['text'] }}</a></li>
                                @else
                                    <li class="has-submemu">
                                        <a href="{{ $href }}"
                                            target="{{ $link['target'] }}">{{ $link['text'] }}</a>
                                        <ul class="submenu">
                                            @foreach ($link['children'] as $level2)
                                                @php
                                                    $l2Href = getUserHref($level2);
                                                @endphp
                                                <li><a href="{{ $l2Href }}"
                                                        target="{{ $level2['target'] }}">{{ $level2['text'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Navbar Extra  -->
                <div class="navbar-extra d-flex align-items-center">
                    <!-- Social Link -->
                    <div class="menu-social nav-push-item">
                        <div class="menu-social-link">
                            @if (isset($social_medias))
                                @foreach ($social_medias as $social_media)
                                    <a href="{{ $social_media->url }}" class="facebook" target="_blank"><i
                                            class="{{ $social_media->icon }}"></i></a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- Navbar Toggler -->
                    <div class="navbar-toggler">
                        <span></span><span></span><span></span>
                    </div>

                    <div class="info nav-push-item">
                        @if (in_array('Ecommerce',$packagePermissions)||
                                in_array('Hotel Booking', $packagePermissions) ||
                                in_array('Course Management', $packagePermissions))
                            @guest('customer')
                                <a
                                    href="{{ route('customer.login', getParam()) }}">{{ $keywords['Login'] ?? __('Login') }}</a>
                                <a
                                    href="{{ route('customer.signup', getParam()) }}">{{ $keywords['Signup'] ?? __('Signup') }}</a>
                            @endguest
                            @auth('customer')
                                @php $authUserInfo = Auth::guard('customer')->user(); @endphp
                                <a
                                    href="{{ route('customer.dashboard', getParam()) }}">{{ $keywords['Dashboard'] ?? __('Dashboard') }}</a>
                                <a
                                    href="{{ route('customer.logout', getParam()) }}">{{ $keywords['Logout'] ?? __('Logout') }}</a>
                            @endauth
                        @endif
                    </div>
                    {{-- <div class="login-button">
                        <a href="#" title="customer" ><i class="fas fa-user"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</header>
<!--====== Header Section end ======-->
