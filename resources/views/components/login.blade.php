<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>

        <div class="column middle form">
            <h2>Đăng nhập</h2>
            <form action="{{ route('login') }}" method="post">
                {{csrf_field()}}
                <br>
                <br>
                <span>Tài khoản</span><br>
                <input type="text" name="username" placeholder="Tên đăng nhập" />
                <br>
                <br>
                <span>Mật khẩu</span><br>
                <input type="password" name="password" placeholder="Mật khẩu" />
                <br><br>
                <br>
                <input type="submit" name="" value="Đăng nhập">
                <br><br>
                <p class="notice">{{ session('notice') }}</p>
            </form>
        </div>
        <!-- <x-main_right></x-main_right> -->
    </nav>
</div>

<x-footer></x-footer>