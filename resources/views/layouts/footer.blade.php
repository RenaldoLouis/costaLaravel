<!-- Footer Area Start Here -->
<footer>
    <div class="container">
        <!-- Footer Middle Start -->
        <div class="footer-top ptb-80">
            <div class="row">
                <!-- Single Footer Start -->
                <div class="col-lg-4 col-md-6 mb-all-30">
                    <div class="single-footer">
                        <h4 class="footer-title">Costa.co.id</h4>
                        <div class="footer-content">
                            <p>
                                @if(session('locale') == 'id')
                                @if(!empty($settings['website_contact_description_in']))
                                {{ $settings['website_contact_description_in'] }}
                                @else
                                {{ !empty($settings['website_contact_description'])?$settings['website_contact_description']:'- Deskripsi belum didefinisikan -' }}
                                @endif
                                @else
                                {{ !empty($settings['website_contact_description'])?$settings['website_contact_description']:'- Deskripsi belum didefinisikan -' }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-6 mb-all-30">
                    <div class="single-footer">
                        <h4 class="footer-title">{{ __('footer.contact_us') }}</h4>
                        <div class="footer-content">
                            <ul class="footer-list contact-area">
                                <li class="address">
                                    {{ !empty($settings['website_address'])?$settings['website_address']:'- Alamat belum didefinisikan -' }}
                                </li>
                                <li class="phone">
                                    {{ !empty($settings['website_phone'])?$settings['website_phone']:'- Telepon belum didefinisikan -' }}
                                </li>
                                <li class="email">
                                    {{ !empty($settings['website_email'])?$settings['website_email']:'- Email belum didefinisikan -' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-3 col-md-6 mb-all-30">
                    <div class="single-footer">
                        <div class="single-footer">
                            <h4 class="footer-title">{{ __('footer.extras') }}</h4>
                            <div class="footer-content">
                                <ul class="footer-list">
                                    <li><a href="{{ route('affiliate',['locale'=>config('app.locale')]) }}">{{ __('footer.affiliate_program') }}</a></li>
                                    <li><a href="{{ route('become-reseller',['locale'=>config('app.locale')]) }}">{{ __('footer.how_to_become_reseller') }}</a></li>
                                    <li><a href="{{ route('login',['locale'=>config('app.locale')]) }}">{{ __('footer.my_account') }}</a></li>
                                    <li>
                                        <a href="{{ route('contact-us',['locale'=>config('app.locale')]) }}">{{ __('footer.contact_us') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('partnerships-page',['locale'=>config('app.locale')]) }}">{{ __('header.partnerships') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faq',['locale'=>config('app.locale')]) }}">{{ __('footer.faq') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('refund-policy',['locale'=>config('app.locale')]) }}">{{ __('footer.refund_policy') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-lg-2 col-md-6">
                    <div class="single-footer">
                        <div class="single-footer">
                            <h4 class="footer-title">{{ __('footer.social') }}</h4>
                            <div class="footer-content">
                                <x-social-media />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Footer Middle End -->
    </div>
    <!-- Footer Bottom Start -->
    <div class="footer-bottom light-blue-bg ptb-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="footer-copy-right ">
                        <p>{!! !empty($settings['website_copyright'])?$settings['website_copyright']:'-' !!}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    {{--
                            <div class="footer-bottom-right">
                        <ul class="footer-social-icon text-md-end">
                            <li><a href="#"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

</footer>
<!-- Footer Area End Here -->
