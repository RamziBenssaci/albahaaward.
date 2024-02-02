<header class="header">
    <div class="container">
        <div class="header-inner">

            <div class="header-logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('images/'.get_setting('header_logo'))}}" alt="" class="img-fluid" loading="lazy">
                </a>
            </div>

            <div class="header-nav">

                <button class="rest-btn close-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                        <path fill="#082034" fill-rule="evenodd"
                              d="M11.782 4.032a.575.575 0 1 0-.813-.814L7.5 6.687L4.032 3.218a.575.575 0 0 0-.814.814L6.687 7.5l-3.469 3.468a.575.575 0 0 0 .814.814L7.5 8.313l3.469 3.469a.575.575 0 0 0 .813-.814L8.313 7.5l3.469-3.468Z"
                              clip-rule="evenodd"/>
                    </svg>
                </button>

                <ul>
                    @if(get_setting('home_page') == 1)
                        <li class="{{ areActiveRoutes(['home']) }}">
                            <a href="{{route('home')}}">
                                الرئيسية
                            </a>
                        </li>
                    @endif
                    @if(get_setting('about_page') == 1)

                        <li>
                            <a href="{{route('home') . '#about_sec'}}">
                                عن البرنامج
                            </a>
                        </li>
                    @endif
                    @if(get_setting('laws_page') == 1)

                        <li class="{{ areActiveRoutes(['all_laws']) }}">
                            <a href="{{route('all_laws')}}">
                                متابعة برنامج عمل الأمة
                            </a>
                        </li>
                    @endif
                    @if(get_setting('members_page') == 1)

                        <li class="{{ areActiveRoutes(['pledged_members','detail_member']) }}">
                            <a href="{{route('pledged_members')}}">
                                الأعضاء المتعهدين
                            </a>
                        </li>
                    @endif


                </ul>

            </div>

            <div class="header-action">


                @if(get_setting('laws_page') == 1)
                    <a href="{{route('all_laws')}}" class="header-action-link">
                        متابعة برنامج عمل الأمة
                    </a>
                @endif


                <button class="btn btn-primary contact-btn" data-bs-toggle="modal" data-bs-target=".contact-modals">
                    تواصل معنا
                </button>

                <button class="btn rest-btn menu-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="none" stroke="#3c69e3" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="1.5" d="M3 5h8m-8 7h13M3 19h18"/>
                    </svg>
                </button>

            </div>
        </div>
    </div>
</header>
