<?php

namespace LaravelAlpineForms\Components\Input;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Text extends Input
{
    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $label
     *
     * @return void
     */
    public function __construct($name = "text", $label = "Text Input", $placeholder = null)
    {
        parent::__construct($name, $label, $placeholder);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::input.text');
    }
}