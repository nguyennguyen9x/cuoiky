<x-head></x-head>
<div>
    <nav class="main">
        <div class="column middle">
            @if(Session::has('user_name'))
            <p>Xin chào {{ session('user_name')}}</p>
            <p>Bạn đang ở level {{ session('level')}}</p>
            @else
            <h1>Chào mừng bạn đến với website của chúng
                tôiiiiiiiiiiiiiiiiiiiiiiiiiiiiihttp://localhost:8080http://localhost:8080!!!</h1>
            @endif
        </div>
    </nav>

</div>

<x-footer></x-footer>