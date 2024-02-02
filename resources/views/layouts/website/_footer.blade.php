<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-top">
                <div class="footer-info">
                    <div class="footer-logo" style="width:95px; height:96px;">
                        <img src="{{asset('images/'.get_setting('footer_logo'))}}" alt="" class="img-fluid">
                    </div>
                    <p>
                        {{get_setting('description_footer')}}
                    </p>
                    <div class="footer-social">
                        <ul>
                            <li>
                                <a href="{{get_setting('instagram_link')}}" target="_blank">
                                    <img src="{{asset('assets/img/instagram-icon.svg')}}" alt="" class="img-fluid"
                                         loading="lazy">
                                </a>
                            </li>

                            <li>
                                <a href="{{get_setting('twitter_link')}}" target="_blank">
                                    <img src="{{asset('assets/img/twitter-icon.svg')}}" alt="" class="img-fluid"
                                         loading="lazy">
                                </a>
                            </li>

                            <li>
                                <a href="{{get_setting('facebook_link')}}" target="_blank">
                                    <img src="{{asset('assets/img/facebook-icon.svg')}}" alt="" class="img-fluid"
                                         loading="lazy">
                                </a>
                            </li>

                            <li>
                                <a href="{{get_setting('snapchat_link')}}" target="_blank">
                                    <img src="{{asset('assets/img/snapchat-icon.svg')}}" alt="" class="img-fluid"
                                         loading="lazy">
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>

                <div class="footer-list">
                    <h4>القائمة</h4>
                    <ul>
                        @if(get_setting('home_page') == 1)
                            <li>
                                <a href="{{route('home')}}">
                                    الرئيسية
                                </a>
                            </li>
                        @endif
                        @if(get_setting('about_page') == 1)

                            <li>
                                <a href="{{route('home') . '#about_sec'}} " class="about-nav">
                                    عن البرنامج
                                </a>
                            </li>
                        @endif
                        @if(get_setting('laws_page') == 1)

                            <li>
                                <a href="{{route('all_laws')}}">
                                    متابعة برنامج عمل الأمة
                                </a>
                            </li>
                        @endif
                        @if(get_setting('members_page') == 1)

                            <li>
                                <a href="{{route('pledged_members')}}">
                                    الأعضاء المتعهدين
                                </a>
                            </li>
                        @endif

                    </ul>
                </div>

                <div class="footer-list">
                    <h4>المساعدة</h4>
                    <ul>
                        <li>
                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target=".contact-modals">
                                تواصل معنا
                            </a>
                        </li>
                        @foreach(\App\Models\Page::query()->active()->get() as $page)
                            <li>
                                <a href="{{route('page',$page->slug)}}">
                                    {{$page->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="footer-list">
                    <h4>روابط مهمة</h4>
                    <ul>
                        @foreach(\App\Models\UsefulLink::query()->get() as $link)
                            <li>
                                <a href="{{$link->url}}">
                                    {{$link->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="footer-copyright-inner">
                <p>
                    جميع الحقوق محفوظة لدى برنامج عمل الأمة &copy; 2023
                </p>
                <p>
                    صنع ب <img src="{{asset('assets/img/love.svg')}}" alt="" class="img-fluid loveapex"> بواسطة <a
                        href="https://apex.ps" target="_blank" class="text-decoration-underline"> أبكس </a>
                </p>
            </div>
        </div>
    </div>

    <div class="footer-pattern">
        <img src="{{asset('assets/img/footer-pattern.svg')}}" alt="" class="img-fluid" loading="lazy">
    </div>

</footer>



