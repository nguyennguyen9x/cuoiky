<?php

namespace App\View\Components;

use Illuminate\View\Component;

class trang_chu extends Component
{
    public $questions;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($questions=[])
    {
        $question = DB::table('question')->where('ID_TP', '<',7)->inRandomOrder()->limit(20)->get();
        
        $index=0;
        foreach ($question as $data_question){
            $answer = DB::table('asw')->where('ID_QU', $data_question->ID_QU)->get();
            $arr_answer =[];
            foreach ($answer as $data_answer){
                array_push($arr_answer, $data_answer);
            }
            $index++;
            array_push($questions, [$index,$data_question->QUESTION,$arr_answer]);
            // $this->show_question($index,$data_question->QUESTION,$arr_answer);
        // <x-question :index='$index' :question='$data_question->QUESTION' :answer='$arr_answer'>
        // </x-question>
        }
        $this->questions=$questions;
        //
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trang_chu');
    }
}