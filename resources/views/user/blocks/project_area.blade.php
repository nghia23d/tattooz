@if(count($data) > 0)
<div class="project-area bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="section-title text-center">
                    <h2>Những dự án tại Tattoo NghialeZ</h2>
                    <p> Là một tín đồ của Tattoo, bạn đang mong muốn tìm kiếm một hình xăm ấn tượng cùng ý nghĩa sâu sắc để đưa lên vai như một dấu ấn riêng dành cho mình Có lẽ, chủ đề ngày hôm nay sẽ góp phần một nào đó để làm thõa lòng mong đợi của mọi người…

                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="project-menu">
                  @php
                      $project = [];
                  @endphp
                    <button class="active" data-filter="*">All</button>
                    @foreach($data as $value)
                        <button data-filter=".cat-id-{{$value->id}}">{{$value->name}}</button>
                        @php
                            $arr = [];
                            foreach($value->getLimitProject as $k => $v){
                                $arr['category_id'] = $v->category_id;
                                $arr['thumb'] = $v->thumb;
                                $project[] = $arr;
                            }
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row grid">
            @foreach( $project as $key =>  $value)
                <div class="col-2 col-lg-3 cat-id-{{$value['category_id']}} project col-md-3 col-sm-6 col-xs-12">
                    <div class="project-wrap">
                        <img src="{{asset('admin/images/project/'.$value['thumb'])}}" alt="">
                        <a href="{{asset('admin/images/project/'.$value['thumb'])}}" class="popup">
                            <i class="fa fa-link"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif