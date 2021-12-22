<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class question extends Component
{
    public $index;
    public $question;
    public $answer;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($index = 0 ,$question = "load question error",$answer = [])
    {
        $this->index=$index;
        $this->question=$question;
        $this->answer=$answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.question');
    }
}