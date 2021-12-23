<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <form action="" method="post"></form>
        <div class="column middle">
            <h2>Các khóa học hiện có</h2>
            @php
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