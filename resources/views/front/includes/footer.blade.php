<!-- START FOOTER -->
<footer class="first-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                <div class="netabout">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset($footer_logo_path) }}" alt="footer Logo">
                        </a>
                        <p>@lang('front.footer_paragraph')</p>
                    </div>
                    <div class="contactus">
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p location-url"> <a href="{{ $contact_us_info->location_link }}"> {{ $contact_us_info->location_title }} </a> </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p">{{ $contact_us_info->phone }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti">{{ $contact_us_info->email }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="navigation">
                        <h3>Navigation</h3>
                        <div class="nav-footer">
                            <ul class="mx-5">
                                <li><a href="{{ route('front.index') }}">@lang('front.home')</a></li>
                                <li><a href="">@lang('front.properties')</a></li>
                                <li><a href="">@lang('front.properties')</a></li>
                                <li><a href="#">@lang('front.agencies')</a></li>
                                <li class="no-mgb"><a href="#">@lang('front.agencies')</a></li>
                            </ul>
                            <ul class="nav-right">
                                <li><a href="#">@lang('front.agencies')</a></li>
                                <li><a href="#">@lang('front.about_us')</a></li>
                                <li><a href="#">@lang('front.blog')</a></li>
                                <li><a href="#">@lang('front.blog')</a></li>
                                <li class="no-mgb"><a href="{{ route('front.create.contact-us') }}">@lang('front.contact')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget">
                        <h3>Twitter Feeds</h3>
                        <div class="twitter-widget contuct">
                            <div class="twitter-area">
                                <div class="single-item">
                                    <div class="icon-holder">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </div>
                                    <div class="text">
                                        <h5><a href="#">@findhouses</a> all share them with me baby said inspet.
                                        </h5>
                                        <h4>about 5 days ago</h4>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="icon-holder">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </div>
                                    <div class="text">
                                        <h5><a href="#">@findhouses</a> all share them with me baby said inspet.
                                        </h5>
                                        <h4>about 5 days ago</h4>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="icon-holder">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </div>
                                    <div class="text">
                                        <h5><a href="#">@findhouses</a> all share them with me baby said inspet.
                                        </h5>
                                        <h4>about 5 days ago</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="newsletters">
                        <h3>Newsletters</h3>
                        <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive
                            news in your inbox.</p>
                    </div>
                    <form class="bloq-email mailchimp form-inline" method="post">
                        <label for="subscribeEmail" class="error"></label>
                        <label for="subscribeEmail" class="success" style="color:#1cdc1c;"></label>
                        <div class="email">
                            @csrf
                            <input type="hidden" id="add_subscriber_url" name="add_subscriber_url" value="{{ route('front.subscriber.create') }}">
                            <input type="email" id="subscribeEmail" name="email" placeholder="Enter Your Email">
                            <input type="submit" value="Subscribe" id="add_subscriber_button">
                            <p class="subscription-success"></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="second-footer">
        <div class="container">
            <p>2020 © Copyright - All Rights Reserved.</p>
            <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> Elaraby</p>
        </div>
    </div>
</footer>

<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->
