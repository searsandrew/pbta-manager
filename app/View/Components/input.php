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
    public function __construct($name, $heading, string $value = '', bool $disabled = false, bool $help = false)
    {
        $this->name = $name;
        $this->heading = $heading;
        $this->value = $value;
        $this->disabled = $disabled;
        $this->help = $help;
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
