<div class="book-now-area black-opacity bg-img-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="booknow-wrap">
                    <div class="section-title">
                        <h2>Đặt lịch xăm ngay</h2>
                        <p>Chúng tôi sẽ liên hệ bản sớm nhất trong thời gian sớm nhất</p>
                    </div>
                    <form action="{{route('booknow.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <p>Tên của bạn</p>
                                <input required type="text" placeholder="Nhập tên của bạn" name="name">
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <p>Chọn ngày</p>
                                <input id="time" placeholder="Chọn ngày" required type="date" name="time">
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <p>Email của bạn</p>
                                <input required type="email" name="email" placeholder="Nhập email của bạn">
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <p>Số điện thoại của bạn</p>
                                <input required type="text" name="phone" placeholder="Nhập số điện thoại của bạn">
                            </div>
                            <div class="col-md-12 col-sm-4 col-xs-12">
                                <p>Nhập mô tả (nếu có)</p>
                               <textarea style="height: auto" name="description" id="" cols="60" rows="5"></textarea>
                            </div>
                            <div class="col-xs-12">
                                <button>Đặt lịch ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1 hidden-sm hidden-xs">
                <div class="booknow-img">
                    <img src="{{asset('tattoo/assets/images/img1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $("#time").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        maxDate: new Date().fp_incr(7),
        minTime: "8:30",
        maxTime: "22:30",
    });
</script>
@endsection