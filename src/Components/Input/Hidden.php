<?php

namespace LaravelAlpineForms\Components\Input;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class Hidden extends Component
{
    /**
     * The input name attribute.
     */
    public string $name;
    /**
     * The input value.
     */
    public string|null $value;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $label
     *
     * @return void
     */
    public function __construct($name = "hidden", $value = null)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::input.hidden');
    }
}