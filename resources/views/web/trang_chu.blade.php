<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <div class="column middle">
            <h2>Main Content</h2>
            @php
            $tesst='daksd';
            $question = DB::table('question')->inRandomOrder()->limit(20)->get();
            //->join('asw', 'question.ID_QU', '=','asw.ID_QU')
            $index=0;
            foreach ($question as $data_question){
            $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();

            $arr_answer =[];
            foreach ($answer as $data_answer){
            array_push($arr_answer, $data_answer);
            //echo "1 ";
            }
            $index++;
            @endphp
            <x-question :index='$index' :question='$data_question->QUESTION' :answer='$arr_answer'>
            </x-question>
            @php
            }
            @endphp
        </div>
        <x-main_right></x-main_right>
    </nav>
</div>

<x-footer></x-footer>