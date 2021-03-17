@php
    use Illuminate\Support\Str;
@endphp
<header class="header-area" id="sticky-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-bottom">
                     <div class="row">
                        <div class="col-md-3 col-sm-9 col-xs-6">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{asset('tattoo/assets/images/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <div class="mainmenu text-right">
                                <ul id="navigation">
                                    <li class="active"><a href="index.html">Trang chủ</a> </li>
                                    <li><a href="blog.html">Thể loại</a>
                                        <ul>
                                            @foreach($generalData['dataMenu']['category'] as $value)
                                                <li><a href="{{Str::slug($value->name)}}-{{$value->id}}.html">{{$value->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li> <a href="#">Sản phẩm</a> </li>
                                    <li> <a href="#">Blog</a> </li>
                                    <li> <a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-2 col-xs-4">
                            <div class="search-wrap text-right">
                                <ul>
                                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i><span>3</span></a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                        <ul>
                                            <li>
                                                <form action="#">
                                                    <input type="text" placeholder="Search Here...">
                                                    <button><i class="fa fa-search"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class=" col-xs-2 col-sm-1 hidden-md hidden-lg">
                            <div class="responsive-menu-wrap floatright"></div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</header>