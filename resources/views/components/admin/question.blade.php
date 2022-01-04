<x-admin.header_admin></x-admin.header_admin>

<nav class="main">
    <form action="{{ route('insert.question') }}" method="post">
        @csrf
        <div class="question">
            Câu hỏi:
            <textarea name="question" id="" cols="185" rows="5"></textarea>
            <br>
            Loại câu hỏi:
            <select name="type_question" id="">
                <option id="" value=""></option>
                @foreach($types as $type)
                <option id="{{$type->Question_Type}}" value="{{$type->ID_TP}}">{{$type->Question_Type}}</option>
                @endforeach
            </select>
            <br>
            <br>
            Danh sách đáp án:
            <div><input type="radio" name="answer" id="A" value="A" />
                <textarea name="A" id="" cols="100" rows="1" placeholder="Đáp án"></textarea>
            </div>
            <div><input type="radio" name="answer" id="B" value="B" />
                <textarea name="B" id="" cols="100" rows="1" placeholder="Đáp án"></textarea>
            </div>
            <div><input type="radio" name="answer" id="C" value="C" />
                <textarea name="C" id="" cols="100" rows="1" placeholder="Đáp án"></textarea>
            </div>
            <div><input type="radio" name="answer" id="D" value="D" />
                <textarea name="D" id="" cols="100" rows="1" placeholder="Đáp án"></textarea>
            </div>
            <br>
            <label>
            </label>
            <p class="notice">{{ session('notice') }}</p>
        </div>
        <button type="submit" class="btn_header">Thêm</button>
    </form>
</nav>
</div>
</body>

</html>