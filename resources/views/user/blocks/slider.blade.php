 
 @if($data->count() > 0)
 <div class="slider-area">
    <div class="slider-active">
        @foreach($data as $value)
        <div class="slider-items">
            <img src="{{asset('admin/images/slider/'.$value->thumb)}}" alt="slider" class="slider">
            <div class="single-slider">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-sm-10 col-xs-12">
                            <h2>{{$value->name}}</h2>
                            <p>{{$value->description}}</p>
                            <a href="{{$value->link}}">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif