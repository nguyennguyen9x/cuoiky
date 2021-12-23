<div class="question">
    <input class="moveto" id="question{{$index}}" />
    @if($index)
    <label>Câu {{$index}} : {{$question}}
    </label>
    <br>
    <br>
    @php
    foreach ($answer as $data_answer){
    @endphp
    <div><input type="radio" name="{{$index}}" id="asw{{$data_answer->ID_AWS}}" value="{{$data_answer->ID_AWS}}" />
        <label for="asw{{$data_answer->ID_AWS}}">
            @php
            echo $data_answer->ANSWER;
            @endphp
        </label>
    </div>
    @php
    }
    @endphp
    <br>
    <label class="cam_co" for="answer{{$index}}">
        Đánh dấu câu !
    </label>
    @else
    <label>{{$question}}
    </label>
    @endif
</div>