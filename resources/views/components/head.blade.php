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
            <div id="logo">
                <img src="https://scontent-sin6-3.xx.fbcdn.net/v/t39.30808-6/241042254_4686263994719451_6540534603638629438_n.png.jpg?_nc_cat=106&_nc_rgb565=1&ccb=1-5&_nc_sid=8631f5&_nc_ohc=XN3ury3hWEsAX_rVyGZ&_nc_ht=scontent-sin6-3.xx&oh=00_AT9QQwrhAlv_WNt9yQJcZsJngb9R_gNdl2CvyINuSHjohA&oe=61C54E25"
                    alt="Viện Công Nghệ Và Đào Tạo Devmaster">
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="#" title="Trang chủ">Trang chủ</a></li>
                <li><a href="#" title="Khóa học chuyên đề">Khóa học</a>
                    <!-- menu con sổ xuống cấp 1 -->
                    <ul>
                        <li>
                            <a href="#">Excel</a>
                            <!-- menu con sổ ngang cấp 2 -->
                            <ul>
                                <li><a href="#">Cơ Bản</a></li>
                                <li><a href="#">Nâng Cao</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Sử Dụng Máy Tính Cơ Bản</a>
                            <!-- menu con sổ ngang cấp 2 -->
                            <ul>
                                <li><a href="#">Cơ Bản</a></li>
                                <li><a href="#">Nâng Cao</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">HTML-CSS</a>
                            <!-- menu con sổ ngang cấp 2 -->
                            <ul>
                                <li><a href="#">Cơ Bản</a></li>
                                <li><a href="#">Nâng Cao</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#">Thi Trắc nghiệm</a>
                    <ul>
                        <li><a href="#">Làm Bài Thi</a></li>
                        <li><a href="#">Xem Lại Lịch Sử Làm Bài</a></li>
                    </ul>
                </li>
                <li><a href="#" title="Liện hệ">Liên hệ</a></li>

            </ul>
        </nav>