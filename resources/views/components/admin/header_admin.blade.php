<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luyện Thi</title>
    <link href="{{ URL::asset('/css/web.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div>
        <header>
            <button class="btn_header"><a href="{{ route('logout') }}">Đăng xuất</button>
        </header>
        <nav>
            <ul>
                <li><a href="{{ route('admin.home') }}" title="Trang chủ">Trang chủ Admin</a></li>
                <li><a href="#" title="Khóa học chuyên đề">Quản lý Database</a>
                    <ul>
                        <!-- <li><a href="{{ route('admin.set_data.user') }}">User</a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.set_data.user') }}">Thêm</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.set_data.user') }}">Cập nhật</a>
                                </li>
                            </ul>
                        </li> -->
                        <li><a href="{{ route('admin.set_data.question') }}">Câu hỏi trắc nghiệm</a>
                            <ul>
                                <li>
                                    <a href="{{ route('admin.set_data.question') }}">Thêm</a>
                                </li>
                                <!-- <li>
                                    <a href="#">Cập nhật</a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li><a href="{{ route('admin.set_data.exam') }}">Quản lý khóa học</a>
                            <ul>
                                <li>
                                    <a href="#">Thêm</a>
                                </li>
                                <li>
                                    <a href="#">Cập nhật</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
                <!-- <li><a href="#">Thống kê</a>
                    <ul>
                        <li><a href="{{ route('admin.get_data') }}">User</a></li>
                        <li><a href="{{ route('admin.get_data') }}">Lịch sử làm bài</a></li>
                        <li><a href="{{ route('admin.get_data') }}">Câu hỏi trắc nghiệm</a></li>
                        <li><a href="{{ route('admin.get_data') }}">Khóa học</a></li>
                    </ul>
                </li> -->
            </ul>
        </nav>