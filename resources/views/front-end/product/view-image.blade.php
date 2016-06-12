
@extends('front-end.master')
@section('title')
    Sản phẩm
@endsection
@section('breadcrumb')
    Sản phẩm
@endsection
@section('content')
<div class="columns-container" data-ng-controller="ProductController">
    <div class="grid_10">
        <!-- Product Content -->
        <div class="image-view">
        	<center>
        		<img class="image-zoom" ng-src="/images/products/{{$productImage['folder']}}/{{$productImage['stored_file_name']}}" data-zoom-image="/images/products/{{$productImage['folder']}}/{{$productImage['stored_file_name']}}"/> 
        	</center>
        </div>
        <!-- End Product Content -->
    </div>
@endsection

@section('script')
    {!! Html::script('/app/components/front-end/product/ProductService.js?v='.getVersionScript())!!}
    {!! Html::script('/app/components/front-end/product/ProductController.js?v='.getVersionScript())!!}
@endsection