<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">

    <!--begin::Header Menu-->
    <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default ">

        <!--begin::Header Nav-->
        <ul class="menu-nav ">


            @foreach($pages as $parent_page )
                @if( auth()->user()->pages()->contains($parent_page->name))
                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true"><a href="{{ $parent_page->url == "#" ? '#' : route($parent_page->url)  }}" class="menu-link menu-toggle"><span class="menu-text">{{ $parent_page->name }} </span><span class="menu-desc"></span><i class="menu-arrow"></i></a>
                    @if( $parent_page->sub_pages->isNotEmpty() )
                    <div class="menu-submenu menu-submenu-classic menu-submenu-left">

                        <ul class="menu-subnav">

                            @foreach ($parent_page->sub_pages as $page)
                                @if(auth()->user()->pages()->contains($page->name))

                                <li class="menu-item  menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true"><a href="{{ $page->url == "#" ? '#' : route($page->url)  }}" class="menu-link "><span class="menu-text">{{ $page->name }}</span>
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
                                @endif
                            @endforeach

                        </ul>

                    </div>
                    @endif
                </li>
                @endif
            @endforeach

        </ul>

    </div>

</div>
