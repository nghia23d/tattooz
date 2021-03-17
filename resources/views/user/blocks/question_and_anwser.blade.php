@if(count($data) > 0)
<div class="about-area ptb-100 bg-1 about-area3 about-page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="about-wrap" style="height: 476px;">
                    <h3>Những câu hỏi thường gặp </h3>
                    <p>Chúng tôi sẽ luống hỗ trợ tới mọi khách hàng để phát triển ngày một tiến xa hơn nữa. Đó chính là mục tiêu hàng đầu của đại gia đình NGHIALEZ</p>
                    <div class="faq-wrap">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach($data as $value)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#{{$value->id}}" aria-expanded="false" aria-controls="{{$value->id}}" class="collapsed">
                                           {{$value->question}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$value->id}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">
                                        <p> {{$value->anwser}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 hidden-sm hidden-xs">
                <div class="about-img" style="background-image: url("{{asset('tattoo/assets/images/about/4.jpg')}}"); background-size: cover; background-position: center center;">
                <img src="{{asset('tattoo/assets/images/about/4.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endif