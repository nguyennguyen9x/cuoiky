<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <div class="column middle">
            <h2>kết quả bài làm : đúng {{$diem}}/20 câu </h2>
            <p class="notice">{{isset($notice) ?$notice:null }}</p>
        </div>
    </nav>
</div>
<x-footer></x-footer>