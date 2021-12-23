<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <div class="column middle">
            <h2>Đề bài thi thử</h2>
            @php
            $question = DB::table('question')->where('ID_TP', '<',7)->inRandomOrder()->limit(20)->get();
                $index=0;
                foreach ($question as $data_question){
                $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();
                $arr_answer =[];
                foreach ($answer as $data_answer){
                array_push($arr_answer, $data_answer);
                }
                $index++;
                @endphp
                <x-question :index='$index' :question='$data_question->QUESTION' :answer='$arr_answer'>
                </x-question>
                @php
                }
                @endphp

                <button class="btn_header">Nộp bài</button>
        </div>
        <div class="column side">
            <h2>Side</h2>
            @php
            $index=0;
            foreach ($question as $data_question){
            $index++;
            @endphp
            <div class="answer">
                <label for="question{{$index}}"> Câu {{$index}}</label>
                <br>
                <input type="checkbox" id="answer{{$index}}" value="answer{{$index}}" />
            </div>
            @php
            }
            @endphp
        </div>
        <!-- <x-main_right></x-main_right> -->
    </nav>

</div>

<x-footer></x-footer>