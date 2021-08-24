<?php

namespace App\View\Components;

use Illuminate\View\Component;

class select extends Component
{
    public $name;
    public $label;
    public $datasource;
    public $value;
    public $disabled;
    public $help;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $heading, $datasource, $value = '', $disabled = false, $help = false)
    {
        $this->name = $name;
        $this->label = $heading;
        $this->datasource = json_decode($datasource, true);
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
        return view('components.select');
    }
}
