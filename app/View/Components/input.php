<?php

namespace App\View\Components;

use Illuminate\View\Component;

class input extends Component
{
    public $name;
    public $heading;
    public $value;
    public $disabled;
    public $help;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $heading, $value = '', $disabled = false, $help = false)
    {
        $this->name = $name;
        $this->heading = $heading;
        $this->value = isset($value) ? $value : false;
        $this->disabled = isset($disabled) ? $disabled : false;
        $this->help = isset($help) ? $help : false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input');
    }
}
