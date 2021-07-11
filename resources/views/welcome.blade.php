<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Farmer's Market</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/backend_css/welcome.css')}}" />
        <!-- Styles -->
        <style>
            html, body {
    background-image:url("{{asset('/images/backend_images/bg1.jpg')}}");
    color: Crimson;
    font-family: 'Nunito', sans-serif;
    font-weight: bold;
    height: 100vh;
    margin-top:-25px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

}
           
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="font-size:20px; color:white; border:1px solid red; border-radius:40px; background-color:crimson;">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="font-size:20px; color:white; border:1px solid red; border-radius:40px; background-color:crimson;">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content ">
                <div class="title m-b-md " >
                    <p> <id="div1">
                        Farmer's Market  
                       <img src="{{asset('/images/backend_images/trans_logo.png')}}" 
                       alt="Image" style="height:100px;"> </p>
                
            
                       
                    
<div class="word"> 
	<span>A</span>
	<span>n </span> &nbsp;
	<span>E</span>
	<span>c</span>
	<span>o</span>
    <span>m</span>
    <span>m</span>
    <span>e</span>
    <span>r</span>
    <span>c</span>
    <span>e</span> &nbsp;
    <span>B</span>
    <span>a</span>
    <span>s</span>
    <span>e</span>
    <span>d</span> &nbsp;
    <span>W</span>
    <span>e</span>
    <span>b</span>
    <span>s</span>
    <span>i</span>
    <span>t</span>
    <span>e</span>
 </div>
 </div>
 </div>            
                
        </div>
    </body>

    <script>
        const spans = document.querySelectorAll('.word span');

spans.forEach((span, idx) => {
	span.addEventListener('click', (e) => {
		e.target.classList.add('active');
	});
	span.addEventListener('animationend', (e) => {
		e.target.classList.remove('active');
	});
	
	// Initial animation
	setTimeout(() => {
		span.classList.add('active');
	}, 750 * (idx+1))
});
    </script>
</html>
