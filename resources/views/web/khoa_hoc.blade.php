<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <form action="" method="post"></form>
        <div class="column middle">
            <h2>Đề bài thi thử</h2>
            @php
            $type_exam = DB::table('type_exam')->get();
            foreach ($type_exam as $data_type_exam){
            @endphp
            <x-question :question='$data_type_exam->EX_NAME'>
            </x-question>
            @php
            }
            @endphp
        </div>
        <!-- <x-main_right></x-main_right> -->
    </nav>
</div>

<x-footer></x-footer>