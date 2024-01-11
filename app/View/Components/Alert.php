<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $level;
    /**
     * Create a new component instance.
     */
    public function __construct($level = 'success',$message = '')
    {
        $this->message = $message;
        $this->level = $level;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
