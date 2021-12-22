<div class="question" >
    <label>Câu {{$index}} : {{$question}}
    </label>
    <br>
    <br>
        @php
        //echo print_r($answer);
        foreach ($answer as $data_answer){
        @endphp
        <div><input type="radio" name="gender" id="A" value="A" />
            <label for="A">
                @php
                echo $data_answer->ANSWER;
                @endphp    
            </label>
        </div>
        @php
        }
        @endphp
    <!-- <div><input type="radio" name="gender" id="A" value="A" />
        <label for="A">dap an A</label>
    </div>
    <div><input type="radio" name="gender" id="B" value="B" />
        <label for="B">dap an B</label>
    </div>
    <div><input type="radio" name="gender" id="C" value="C" />
        <label for="C">dap an C</label>
    </div>
    <div><input type="radio" name="gender" id="D" value="D" />
        <label for="D">dap an D</label> 
    </div>-->
</div>