@if(count($data) > 0)
<div class="team-area bg-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                <div class="section-title text-center">
                    <h2>Đội ngũ của chúng tôi</h2>
                    <p> Xăm hình là một hình thức để khẳng định và thể hiện cá tính cũng như những suy nghĩ, tính cách bên trong của mỗi người, không bao giờ phai nhạt. Ngoài ra, đây còn là một phương tiện làm đẹp giúp tôn vinh vẻ đẹp của cơ thể.</p>
                </div>
            </div>
        </div>
        <div class="row">
            
            @foreach($data as $value)
                <div class="col-2 col-md-3 col-sm-6 col-xs-12">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="{{asset('admin/images/team/'.$value->thumb)}}" alt="">
                            <div class="team-icon">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                </ul>
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                                <ul>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3>{{$value->name}}</h3>
                            <p>{{$value->position}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif