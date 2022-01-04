<x-head></x-head>
<div>
    <nav class="main">
        <x-main_left></x-main_left>
        @if(isset($history))
        <h2>Lịch sử làm bài :</h2>
        @php
        foreach ($history as $data_history){
        @endphp
        <div class="question">
            <p>{{$data_history->EX_NAME}}</p><br>
            <p>{{$data_history->DAY}}</p><br>
            <p>{{$data_history->SCORE}}</p><br>
        </div>
        @php
        }
        @endphp
        @endif
</div>
</nav>

</div>

<x-footer></x-footer>