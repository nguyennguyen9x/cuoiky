<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class handle extends Controller
{
    public function __construct()
    {
        //
    }

    
    //tính điểm
    public function nop_bai(request $req){ 
        // dd($req->all()) ;
        // return view('web.ket_qua',['diem'=>$diem]);
        $diem=0;
        $notice=null;
        for ($i=0; $i <= 20 ; $i++) { 
            $answer = DB::table('asw')->where('ID_AWS', $req[$i])->get();
            foreach ($answer as $value) {
                if($value->STATUS==1){
                    $diem++;
                }
            }
        }
        DB::table('history')->insert([
            'USER' => session('user_name'),
            'DAY' => date('l jS \of F Y h:i:s A'),
            'SCORE' => $diem,
            'ID_EX' => session('question_level')
        ]);
        if( $diem >= 10 && session('level')==session('question_level')){
            $level= session('level')+1;
            DB::table('account')
            ->where('USER', session('user_name'))
            ->update(['level' => $level]);
            Session::put('level', $level);
            $notice='Bạn đã được uplevel lên '.$level.'! Bạn có thể làm bài thi của khối kiến thức tiếp theo';
        }
        return view('components.ket_qua',['diem'=>$diem,'notice'=>$notice]);
    }
    
    //load trang home
    public function login(request $request){
        $check_user = DB::table('account')->where('USER', $request->username)->get();
        
        $check_pass = DB::table('account')->where('USER', $request->username)->where('PASS', $request->password)->get();
        if(count($check_user)== 0){
            return redirect('login')->with('notice','Tài khoản không tồn tại! Vui lòng đăng nhập lại');
        } else {
            if(count($check_pass  )== 0){
                return redirect('login')->with('notice','Tài khoản hoặc mật khẩu không đúng! Vui lòng đăng nhập lại');
            }else{
                foreach ($check_user as $key => $value) {
                    session()->forget('user_name');
                    session()->forget('level');
                    $request->session()->put('user_name', $value->USER);
                    $request->session()->put('level', $value->level);
                    $request->session()->put('islogin', true);
                    if($value->role==1){
                        return view('components.admin.index');
                    }
                    if($value->role==2){
                        return view('components.trang_chu');
                        // ->with($value->ADMIN,$value->level);
                    }
                }
            }
        }
        return redirect('login')->with('notice','Đã có 1 lỗi không xác định!');

        // return view('components.trang_chu',['questions'=>$questions]);
    } 

    //đăng ký
    public function register(request $request){
        // dd($request->all());
        if($request->password&&$request->confirm&&$request->username&&$request->name){
            if($request->password!=$request->confirm) return redirect('register')->with('notice','Hãy đảm bảo 2 trường mật khẩu giống hệt nhau');
            $account = DB::table('account')->where('USER', $request->username)->get();
            $password = $request->password;
            $confirm = $request->confirm;
            $account1 = DB::table('account')->get();
            $count_account=count($account1);
            if(count($account)== 0){
                if( $password == $confirm && strlen($password) <> 0){
                    DB::table('account')->insert(['USER' => $request->username, 'PASS' => $request->password, 'NAME'=> $request->name,'role'=>2,'ID_MEM'=>$count_account]);
                    return view('components.trang_chu');
                }else{
                    return redirect('register')->with('notice','Đăng ký không thành công');
                }
            } else {
                return redirect('register')->with('notice','Tên đăng nhập đã tồn tại');
            }
        }else{
            return redirect('register')->with('notice','Bạn cần điền đầy đủ thông tin');
        }
    } 
    
    //load trang home
    public function load_bai_thi($level=1){
        if(session()->has('level'))
            if($level > session('level'))
                return view('components.thi_trac_nghiem',['notice'=>'Bạn chưa đủ điều kiện làm bài thi khối kiến thức này! Hãy hoàn thành trên 50% khối kiến thức trước đó!']);
        
                session()->forget('level');
                session()->put('question_level',$level);
        $question_easy = DB::table('question')->join('type', 'question.ID_TP', '=', 'type.ID_TP')->where('ID_EX', $level)->where('type_question', 1)->inRandomOrder()->limit(10)->get();
        $question_NOLMAL = DB::table('question')->join('type', 'question.ID_TP', '=', 'type.ID_TP')->where('ID_EX', $level)->where('type_question', 2)->inRandomOrder()->limit(6)->get();
        $question_HARD = DB::table('question')->join('type', 'question.ID_TP', '=', 'type.ID_TP')->where('ID_EX', $level)->where('type_question', 3)->inRandomOrder()->limit(4)->get();
        $question =[];
        foreach ($question_easy as $key => $value) {
            array_push($question,$value);
        }
        foreach ($question_NOLMAL as $key => $value) {
            array_push($question,$value);
        }
        foreach ($question_HARD as $key => $value) {
            array_push($question,$value);
        }
        $index=0;
        $questions=[];
        foreach ($question as $data_question){
            $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();
            $arr_answer =[];
            foreach ($answer as $data_answer){
                array_push($arr_answer, $data_answer);
            }
            $index++;
            array_push($questions, [$index,$data_question->QUESTION,$arr_answer]);
        }
        return view('components.thi_trac_nghiem',['questions'=>$questions]);
    }

    //load trang home
    public function load_history(){
        $history = DB::table('history')->join('type_exam', 'history.ID_EX', '=', 'type_exam.ID_EX')->where('USER',  session('user_name'))->get();
        return view('components.history',['history'=>$history]);
    }

    //load khóa học
    public function load_khoa_hoc(){
        $type_exam = DB::table('type_exam')->get();
        return view('components.khoa_hoc',['type_exam'=>$type_exam]);
    }

    
    public function set_data_question(request $data){

        // dd($data->all());
        // $type_exam = DB::table('type_exam')->get();
        return view('components.admin.question');
    }
    
    public function get_type_question(request $data){
        $types = DB::table('type')->get();
        return view('components.admin.question',['types'=>$types]);
    }

    public function load_logout(){
        session()->forget('user_name');
        session()->forget('level');
        session()->forget('islogin');
        session()->put('islogin', false);
        return view('components.login');
    }
    
    public function insert_question(request $data){
        // dd($data->all());
        // "question" => null //INSERT INTO `question`(`ID_QU`, `QUESTION`, `ID_TP`, `STT_Qu`)
        // "type_question" => "COMPUTER_NOLMAL"
        // "answer" => "B"
        // "A" => null INSERT INTO `asw`(`ID_AWS`, `ANSWER`, `ID_QU`, `STATUS`, `STT_Qu`)
        // "B" => null
        // "C" => null
        // "D" => null
        if($data->question==null) return redirect('admin/question')->with('notice','Bạn chưa nhập câu hỏi!');
        if($data->type_question==null) return redirect('admin/question')->with('notice','Bạn chọn loại câu hỏi!');
        if($data->answer==null) return redirect('admin/question')->with('notice','Bạn chưa chọn đáp án đúng!');
        else if(($data->answer=='A'&&$data->A==null)||($data->answer=='B'&&$data->B==null)||
        ($data->answer=='C'&&$data->C==null)||($data->answer=='D'&&$data->D==null))
            return redirect('admin/question')->with('notice','Bạn cần chọn đáp án đúng bạn chọn không hợp lệ!');
        $count_null=0;
        if($data->A!=null) $count_null++;
        if($data->B!=null) $count_null++;
        if($data->C!=null) $count_null++;
        if($data->D!=null) $count_null++;
        if($count_null>=2){
            // $types = DB::table('type')->where('Question_Type', $data->answer)->get();
            // $type=null;
            // foreach ($types as $key => $value) {
            //     $type=$value;
            // }
            $questions = DB::table('question')->get();
            $id_question=count($questions);
            DB::table('question')->insert([
                'ID_QU' => $id_question,
                'QUESTION' => $data->question,
                'ID_TP' => $data->type_question,
                'STT_Qu' => 'ID_TP_deno'
            ]);
            if($data->A!=null){
                $status=0;
                if($data->answer=='A') $status=1;
                DB::table('asw')->insert([
                    'ID_AWS' => 'EX'.($id_question*4+1),
                    'ANSWER' => $data->A,
                    'ID_QU' => $id_question,
                    'STATUS' => $status,
                    'STT_Qu' => 'ID_TP_deno'
                ]);}
            if($data->B!=null){
                $status=0;
                if($data->answer=='B') $status=1;
                DB::table('asw')->insert([
                    'ID_AWS' => 'EX'.($id_question*4+2),
                    'ANSWER' => $data->B,
                    'ID_QU' => $id_question,
                    'STATUS' => $status,
                    'STT_Qu' => 'ID_TP_deno'
                ]);}
            if($data->C!=null){
                $status=0;
                if($data->answer=='C') $status=1;
                DB::table('asw')->insert([
                    'ID_AWS' => 'EX'.($id_question*4+3),
                    'ANSWER' => $data->C,
                    'ID_QU' => $id_question,
                    'STATUS' => $status,
                    'STT_Qu' => 'ID_TP_deno'
                ]);}
            if($data->D!=null){
                $status=0;
                if($data->answer=='D') $status=1;
                DB::table('asw')->insert([
                    'ID_AWS' => 'EX'.($id_question*4+4),
                    'ANSWER' => $data->D,
                    'ID_QU' => $id_question,
                    'STATUS' => $status,
                    'STT_Qu' => 'ID_TP_deno'
                ]);}
            return redirect('admin/question')->with('notice','Bạn thêm thành công 1 câu hỏi!');
        }else{ 
            return redirect('admin/question')->with('notice','1 câu hỏi cần có ít nhất 2 lựa chọn đáp án!');
        }
        $type_exam = DB::table('type_exam')->get();
        return view('admin/question',['type_exam'=>$type_exam]);
    }
    
}