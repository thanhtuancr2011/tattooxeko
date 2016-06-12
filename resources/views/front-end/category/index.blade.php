
@extends('front-end.master')
@section('title')
    Danh mục
@endsection
@section('breadcrumb')
    Danh mục
@endsection
@section('content')
<div class="columns-container" data-ng-controller="CategoryController">
    <div class="grid_10">
        <div class="title-product1">
            <center><strong><div class="text-title">Hình ảnh</div></strong></center>
        </div>
    </div>

    <div class="grid_10">
        <!-- Product Content -->
        <div class="product-content" ng-repeat="product in products">
            <div class="product-content-image">
                <a href="/view-image/@{{product.id}}">
                    <img class="image-zoom" ng-src="/images/products/@{{product.images.folder}}/@{{product.images.stored_file_name}}" data-zoom-image="/images/products/@{{product.images.folder}}/@{{product.images.stored_file_name}}"/> 
                </a>
            </div>
            <div class="product-content-name" ng-if="product.type=='tattoo_machine'">
                <center><a href="#">Tên: @{{product.name}} </a></center>
                <center><a href="#">Giá: @{{product.price}} ₫ </a></center>
            </div>
            <div class="product-content-name1" ng-if="product.type=='tattoo'">
                <center><a href="#">Tên: @{{product.name}} </a></center>
            </div>
        </div>
        <!-- End Product Content -->

        <div class="grid_10">
            <ul class="pagination" style="float: right; padding-bottom: 20px">
                <li ng-if="backPage"><a href="javascript:void(0)" ng-click="changePage(currentPage - 1)">«</a></li>
                <li ng-repeat="i in getNumber(totalPage) track by $index">
                    <a href="javascrip:void(0)" ng-click="changePage($index+1)" ng-class="{active: ($index+1)==currentPage}" 
                                ng-if="($index + 1) <= (currentPage + 2) && ($index + 1) >= (currentPage - 2)" >
                        @{{$index + 1}}
                    </a>
                </li>
                <li ng-if="nextPage && totalPage > 1"><a href="javascript:void(0)" ng-click="changePage(currentPage + 1)">»</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        window.products = {!! json_encode($products) !!};
        window.totalProducts = {!! json_encode($totalProducts) !!};
        @if ($typeProduct == 'tattoo')
            $('#product').css('background-image', "url('../images/menu/product_active.gif')");
        @else
            $('#shop').css('background-image', "url('../images/menu/shop_active.gif')");
        @endif
    </script>
    {!! Html::script('/app/components/front-end/category/CategoryService.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/category/CategoryController.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/product/ProductService.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/product/ProductController.js?v='.getVersionScript())!!}
@endsection