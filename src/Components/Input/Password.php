<?php

namespace LaravelAlpineForms\Components\Input;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class Password extends Component
{
    /**
     * The input name attribute.
     *
     * @var string
     */
    public $name;
    /**
     * The input label element.
     *
     * @var string
     */
    public $label;
    /**
     * Whether or not the password is obscured.
     *
     * @var bool
     */
    public $obscured = true;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $label
     *
     * @return void
     */
    public function __construct($name = "text", $label = "Text Input")
    {
        $this->name         = $name;
        $this->label        = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::input.password');
    }
}