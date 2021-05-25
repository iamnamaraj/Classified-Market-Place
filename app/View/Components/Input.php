<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Input extends Component
{
   
    public function __construct(
        public $text,
        public $field,
        public $type ="text",
        public $current="",
        public $required = false,
    )
    {
        
    }

   
    public function render(): View
    {
        return view('components.input');
    }
}