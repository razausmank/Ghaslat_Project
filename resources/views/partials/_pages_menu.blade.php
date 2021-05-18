<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

    <!--begin::Header Menu-->
    <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default ">

        <!--begin::Header Nav-->
        <ul class="menu-nav ">


            @foreach($pages as $parent_page )

                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="{{ $parent_page->url == "#" ? '#' : route($parent_page->url)  }}" class="menu-link menu-toggle"><span class="menu-text">{{ $parent_page->name }} </span><span class="menu-desc"></span><i class="menu-arrow"></i></a>
                    @if( $parent_page->sub_pages->isNotEmpty() )
                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">

                        <ul class="menu-subnav">

                            @foreach ($parent_page->sub_pages as $page)

                                <li class="menu-item  menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true"><a href="{{ $page->url == "#" ? '#' : route($page->url)  }}" class="menu-link "><span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Gift.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000" />
                                            <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        </g>
                                    </svg>

                                    <!--end::Svg Icon--></span><span class="menu-text">{{ $page->name }}</span>
                                    @if($page->sub_pages->isNotEmpty() )
                                    <i class="menu-arrow"></i>
                                    @endif
                                </a>
                                    @if($page->sub_pages->isNotEmpty() )
                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                        @foreach ($page->sub_pages as $sub_page)

                                            <ul class="menu-subnav">
                                            @include('partials.child_pages', ['child_category' => $sub_page])
                                            </ul>

                                        @endforeach
                                    </div>
                                    @endif
                                </li>
                            @endforeach

                        </ul>

                    </div>
                    @endif
                </li>

            @endforeach

        </ul>

    </div>

</div>
