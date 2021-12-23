<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class handle extends Controller
{
    public function show_question($index,$question,$arr_answer){
        return view('components.question', ['index'=>$index, 'question'=>$question,'answer'=>$arr_answer]);
    }
    public function read_question(){
        $question = DB::table('question')->where('ID_TP', '<',7)->inRandomOrder()->limit(20)->get();
        $index=0;
        foreach ($question as $data_question){
            $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();
            $arr_answer =[];
            foreach ($answer as $data_answer){
                array_push($arr_answer, $data_answer);
            }
            $index++;
            $this->show_question($index,$data_question->QUESTION,$arr_answer);
            // dd("<x-question :index='$index' :question='$data_question->QUESTION' :answer='$arr_answer'></x-question>");
        }
    }
}