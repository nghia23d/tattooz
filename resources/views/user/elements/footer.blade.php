<footer class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-5 col-sm-6 col-xs-12">
                    <div class="footer-widget footer-content">
                        <h2>About US</h2>
                        <p>{{$generalData['dataFooter']['desc']}} </p>
                        <ul>
                            @foreach($generalData['dataFooter']['phone'] as $value)
                                <li><i class="fa fa-phone"></i> {{$value}}</li>
                            @endforeach

                            @foreach($generalData['dataFooter']['email'] as $value)
                                <li><i class="fa fa-envelope"></i> {{$value}}</li>
                            @endforeach

                            @foreach($generalData['dataFooter']['address'] as $value)
                                <li><i class="fa fa-map-marker"></i> {{$value}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div style="padding-left:40px" class="col-2 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget  footer-content footer-time">
                        <h2>Our Working Time</h2>
                        <ul>
                            @foreach($generalData['dataFooter']['work_time'] as $key => $value)
                                <li style="padding-left: 0px"> {{$key}} <span class="pull-right @if($value == 'NGOÀI GIỜ') color @endif ">{{$value}}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div style="padding-left:80px" class="col-2 col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-widget footer-menu">
                        <h2>Short Link</h2>
                        <ul>
                            <li><a href="service.html">Service </a></li>
                            <li><a href="about.html">About US </a></li>
                            <li><a href="#">Booking </a></li>
                            <li><a href="shop.html">Shop </a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="blog.html">Latest News</a></li>
                            <li><a href="blog.html">Latest News</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">NL</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="socil-media-icon">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>