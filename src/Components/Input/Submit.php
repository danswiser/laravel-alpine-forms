<?php

namespace LaravelAlpineForms\Components\Input;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class Submit extends Component
{
    /**
     * The input label element.
     *
     * @var string
     */
    public $label;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $label
     *
     * @return void
     */
    public function __construct($label = "Submit")
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::input.submit');
    }
}