@extends('front-end.master')
@section('title')
    Liên hệ
@endsection
@section('content')
<div class="columns-container" >
	<div class="grid_10" style="padding-bottom: 30px; background-color: #fff; margin-top: 10px;">
    	<div class="contact" style="padding: 20px">
    		{!! $contact['description'] !!}
    	</div>
	</div>
</div>
@endsection

@section('script')
    <script>
    	$('#contact').css('background-image', "url('../images/menu/contact_active.gif')");
    </script>
@endsection
