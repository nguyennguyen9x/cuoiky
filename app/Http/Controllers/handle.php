<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class handle extends Controller
{
    
    //tính điểm
    public function nop_bai(request $req){ 
        // $diem = $req->all();
        // return view('web.ket_qua',['diem'=>$diem]);
        $diem=0;
        for ($i=0; $i <= 20 ; $i++) { 
            $answer = DB::table('asw')->where('ID_AWS', $req[$i])->get();
            foreach ($answer as $value) {
                if($value->STATUS==1){
                    $diem++;
                }
            }
        }
        DB::table('history')->insert([
            'USER' => 'user_demo',
            'DAY' => date('l jS \of F Y h:i:s A'),
            'SCORE' => $diem,
            'ID_TP' => 'ID_TP_deno'
        ]);
        return view('components.ket_qua',['diem'=>$diem]);
    }
    
    //load trang home
    public function login(request $req){
        dd($req->all());
        // $question = DB::table('question')->where('ID_TP', '<',7)->inRandomOrder()->limit(20)->get();
        // $index=0;
        // $questions=[];
        // foreach ($question as $data_question){
        //     $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();
        //     $arr_answer =[];
        //     foreach ($answer as $data_answer){
        //         array_push($arr_answer, $data_answer);
        //     }
        //     $index++;
        //     array_push($questions, [$index,$data_question->QUESTION,$arr_answer]);
        // }
        // return view('components.trang_chu',['questions'=>$questions]);
    } 

    //đăng ký
    public function register(request $req){
        dd($req->all());
        // $question = DB::table('question')->where('ID_TP', '<',7)->inRandomOrder()->limit(20)->get();
        // $index=0;
        // $questions=[];
        // foreach ($question as $data_question){
        //     $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();
        //     $arr_answer =[];
        //     foreach ($answer as $data_answer){
        //         array_push($arr_answer, $data_answer);
        //     }
        //     $index++;
        //     array_push($questions, [$index,$data_question->QUESTION,$arr_answer]);
        // }
        // return view('components.trang_chu',['questions'=>$questions]);
    } 
    
    //load trang home
    public function load_home(){
        $question = DB::table('question')->where('ID_TP', '<',7)->inRandomOrder()->limit(20)->get();
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
        return view('components.trang_chu',['questions'=>$questions]);
    }

    //load khóa học
    public function load_khoa_hoc(){
        $type_exam = DB::table('type_exam')->get();
        return view('components.khoa_hoc',['type_exam'=>$type_exam]);
    }
}