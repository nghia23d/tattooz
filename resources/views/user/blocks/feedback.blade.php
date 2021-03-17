@if(count($data) > 0)
<div class="tetsmonial-area bg-1 ptb-130">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="section-title text-center">
                    <h2>Cảm nhận của Khách hàng</h2>
                    <p> Chúng tôi luôn cố gắng để phát triển để làm hài lòng khách hàng nhất</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="test-active">
                    @foreach($data as $value)
                    <div class="test-items text-center">
                        <div class="test-img">
                            <img class="img-circle" src="{{asset('admin/images/feedback/'.$value->thumb)}}" alt="">
                        </div>
                        <h2>{{$value->name}}</h2>
                        <div class="rating">
                            @for($i = 1; $i<=5; $i++)
                                @if($i <= $value->star)
                                    <span class="fa fa-star" style="color: yellow"></span>
                                @else
                                    <span class="fa fa-star"></span>
                                @endif
                            @endfor
                        </div>
                        <p><i class="fa fa-quote-left"></i> {{$value->description}} <i class="fa fa-quote-right"></i> </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif