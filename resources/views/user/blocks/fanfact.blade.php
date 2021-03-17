@php
$data = config('frontend.home.fanfact');
@endphp
  <div class="fanfact-area black-opacity bg-img-2">
    <div class="container">
        <div class="row">
           @foreach($data as $key => $value)
            <div class="col-md-4 col-sm-4 col-xs-12 col-2">
                <div class="fanfact-wrap">
                    <div class="fanfact-content">
                        <h2>{{$key}} </h2>
                        <h3 class="counter">{{$value['counter']}}</h3>
                    </div>
                    <div class="fanfact-icon">
                        <i class="{{$value['icon']}}"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- fanfact-area end -->