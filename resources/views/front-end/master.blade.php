<!DOCTYPE html>
<html lang="en" data-ng-app="shop-front-end">
    <head>
    	<title>
    		@yield('title') | TATTOO XEKO VINH LONG
    	</title>
        @include('front-end.shared.head')
    </head>
    <body class="home hidden" data-ng-controller="MasterController">
        <div id="topbar">
            <div class="wrapper">
                <div class="logo">
                    <img src="/images/all/logo.png" alt=""/>
                </div>
                <div class="menu">
                    <table width="1235" height="111" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td id="logo" style="width: 494px; height: 111px;">
                            </td>
                            <td id="home" style="width: 147px; height: 111px;">
                            </td>
                            <td id="product" style="width: 141px; height: 111px;"> 
                            </td>
                            <td id="shop" style="width: 140px; height: 111px;"> 
                            </td>
                            <td id="contact" style="width: 166px; height: 111px;"> 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="slideContent">
            <div class="wrapper">
                <div id="slider2_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width:1236px; height: 342px; ">
                        <!-- Slides Container -->
                    <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1236px; height: 342px; overflow: hidden;">
                        <div><a href="#"><img src="/images/all/slide_1.png" alt="" /></a></div>
                        <div><a href="#"><img src="/images/all/slide_2.png" alt="" /></a></div>
                        <div><a href="#"><img src="/images/all/slide_3.png" alt="" /></a></div>
                        {{-- <div><a href="#"><img src="/images/all/slide_4.png" alt="" /></a></div>
                        <div><a href="#"><img src="/images/all/slide_5.png" alt="" /></a></div> --}}
                    </div>
                    
                    <!-- bullet navigator container -->
                    <div u="navigator" class="jssorb03" style="position: absolute; bottom: -30px; right: 14px;">
                        <!-- bullet navigator item prototype -->
                        <div u="prototype"><div u="numbertemplate"></div></div>
                    </div>
                    <!-- Bullet Navigator Skin End -->
                    <span u="arrowleft" class="jssora05l" style="width: 44px; height: 137px; top: 113px; left: -44px;">
                    </span>
                    <!-- Arrow Right -->
                    <span u="arrowright" class="jssora05r" style="width: 44px; height: 137px; top: 113px; right: -44px">
                    </span>
                    <!-- Arrow Navigator Skin End -->
                </div>
            </div>
        </div>
        <div id="content3">
            <div class="container_12">

                <!-- Menu -->
                <div class="grid_2">
                    <div id="menu" style="background-color: #000; margin-top: 10px; height: auto; border: solid #fff 1px;">
                        <ul class="category_menu">
                            @foreach (getCategories() as $category)
                                <li>
                                    <h3><a href="/category-detail/{{$category['id']}}" title="{{$category['name']}}">{{$category['name']}}</a></h3>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Menu -->

                @yield('content')

            </div>
        </div>
        <div id="footer">
            <div class="wrapper" style="margin-bottom: -100px">
                <img src="/images/all/gotop.png" style="position:absolute;top:-27px;left:50%;margin-left:-10px;" />
                <img src="/images/all/footer.png"/>
            </div>
        </div>
    </body>
    <!-- Script-->
    @include('front-end.shared.script')
    <script type="text/javascript">
        $('#home').click(function() {
            window.location.href = window.baseUrl;
        });
        $('#product').click(function() {
            window.location.href = window.baseUrl + '/list-product/tattoo';
        });
        $('#shop').click(function() {
            window.location.href = window.baseUrl + '/list-product/tattoo_machine';
        });
        $('#contact').click(function() {
            window.location.href = window.baseUrl + '/contact';
        });
    </script>
    <!-- End script -->
</html>