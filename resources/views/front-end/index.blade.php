@extends('front-end.master')
@section('title')
    Trang chủ
@endsection
@section('breadcrumb')
    Trang chủ
@endsection
@section('content')

<div class="content hidden" data-ng-controller="HomeController">
    <div class="grid_10" style="padding-bottom: 30px">
        <div class="introduce">
            <img width="981" height="241px" src="images/all/gioithieu1.png"/>
            <div class="show-more"><a href="/about">Xem thêm</a></div>
        </div>
        <div class="image-success">
            <div class="center-content-art">
                <div id="product-art">
                    @foreach ($tattooImages as $product)
                        <a href="view-image/{{$product['id']}}">
                            <img class="image-product" src="images/products/{{$product['images']['folder']}}{{$product['images']['stored_file_name']}}" data-zoom-image="images/products/{{$product['images']['folder']}}{{$product['images']['stored_file_name']}}"/>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content">

            <!-- Title -->
            <div class="title-product">
                <center>
                    <strong>
                        <div class="text-title">Bán hàng</div>
                    </strong>
                </center>
            </div>
            <!-- End Title -->

            <!-- Product Content -->
            @foreach ($tattooMachines as $product)
                <div class="product-content">
                    <div class="product-content-image">
                        <img class="image-product" src="images/products/{{$product['images']['folder']}}{{$product['images']['stored_file_name']}}" data-zoom-image="images/products/{{$product['images']['folder']}}{{$product['images']['stored_file_name']}}"/>
                    </div>
                    <div class="product-content-name">
                        <center><a href="#">Tên: {{$product['name']}} </a></center>
                        <center><a href="#">Giá: {{number_format($product['price'])}} ₫ </a></center>
                    </div>
                </div>
            @endforeach
            <!-- End Product Content -->
        </div>

        <!-- Button face -->
        <div class="social-buttons button-right hidden-phone hidden-tablet">
            <a class="itemsocial" href="https://www.facebook.com/profile.php?id=100003878464100" id="facebook-btn" target="_blank"><span class="social-icon" style="overflow: hidden;"></span></a>
            <!-- <a class="itemsocial" href="#" id="twitter-btn" target="_blank"><span class="social-icon" style="overflow: hidden;"><span class="social-text">Follow via Twitter</span></span></a>
            <a class="itemsocial" href="#" id="google-btn" target="_blank"><span class="social-icon"><span class="social-text">Follow via Google</span></span></a>
            <a class="itemsocial" href="#" id="pinterest-btn" target="_blank"><span class="social-icon">
            <span class="social-text">Follow via Pinterest</span></span></a>
            <a class="itemsocial" href="#" id="youtube-btn" target="_blank"><span class="social-icon"><span class="social-text">Follow via Youtube</span></span></a>
            <a class="itemsocial" href="#" id="rss-btn" target="_blank"><span class="social-icon"><span class="social-text">Follow via RSS</span></span></a> -->
        </div>
        <!-- End Button face -->
    </div>

</div>

@endsection

@section('script')
    <script>
        window.tattooImages   = {!! json_encode($tattooImages) !!};
        window.tattooMachines = {!! json_encode($tattooMachines) !!};
        $('#home').css('background-image', "url('../images/menu/home_active.gif')");
    </script>
    {!! Html::script('/app/components/front-end/home/HomeService.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/home/HomeController.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/product/ProductService.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/product/ProductController.js?v='.getVersionScript())!!}
@endsection

