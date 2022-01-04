<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <div class="column middle form">
            <h2>Đăng ký</h2>
            <form action="{{ route('register') }}" method="post">
                {{csrf_field()}}
                <br>
                <span>Tên</span><br>
                <input type="text" name="name" placeholder="Tên" />
                <br>
                <br>
                <span>Tên đăng nhập</span><br>
                <input type="text" name="username" placeholder="Tên đăng nhập" />
                <br>
                <br>
                <span>Mật khẩu</span><br>
                <input type="password" name="password" placeholder="Mật khẩu" />
                <br>
                <br>
                <span>Xác nhận mật khẩu</span><br>
                <input type="password" name="confirm" placeholder="Nhập lại mật khẩu" />
                <br>
                <br><br>
                <input type="submit" value="Đăng ký">
                <br><br>
                <p class="notice">{{ session('notice') }}</p>
            </form>
        </div>
        <!-- <x-main_right></x-main_right> -->
    </nav>
</div>

<x-footer></x-footer>