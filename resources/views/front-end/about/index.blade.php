@extends('front-end.master')
@section('title')
    Giới thiệu
@endsection
@section('content')
<div class="columns-container" >
    <div class="grid_10" style="padding-bottom: 30px; background-color: #fff; margin-top: 10px;">
    	<div class="about" style="padding: 20px">
    		{!! $about['description'] !!}
    	</div>
	</div>
</div>
@endsection

@section('script')
    <script>
    </script>
@endsection