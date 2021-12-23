<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <form action="" method="post"></form>
        <div class="column middle">
            <h2>Đề bài thi thử</h2>
            @php
            foreach ($questions as $data_question){
            @endphp
            <x-question :index='$data_question[0]' :question='$data_question[1]' :answer='$data_question[2]'>
            </x-question>
            @php
            }
            @endphp
        </div>
        <div class="column side">
            <h2>Side</h2>

        </div>
        <!-- <x-main_right></x-main_right> -->
    </nav>
</div>

<x-footer></x-footer>