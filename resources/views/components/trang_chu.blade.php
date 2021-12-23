<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        <form action="{{ route('ket_qua') }}" method="post">
            @csrf
            <div class="column middle">
                <h2>Đề bài thi thử :</h2>
                @php
                foreach ($questions as $data_question){
                @endphp
                <x-question :index='$data_question[0]' :question='$data_question[1]' :answer='$data_question[2]'>
                </x-question>
                @php
                }
                @endphp

                <button type="submit" class="btn_header">Nộp bài</button>
            </div>
        </form>
        <div class="column side">
            <h2>Side</h2>
            @php
            foreach ($questions as $data_question){
            @endphp
            <div class="answer">
                <label for="$data_question[0]"> Câu {{$data_question[0]}}</label>
                <br>
                <input type="checkbox" id="answer{{$data_question[0]}}" value="answer{{$data_question[0]}}" />
            </div>
            @php
            }
            @endphp
        </div>
    </nav>

</div>

<x-footer></x-footer>