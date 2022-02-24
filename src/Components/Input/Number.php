<?php

namespace LaravelAlpineForms\Components\Input;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Number extends Input
{
    /**
     * The maximum value to accept for this input.
     */
    public int|string $max;
    /**
     * The minimum  value to accept for this input.
     */
    public int|string $min;
    /**
     * A number that specifies the granularity that the value must adhere to.
     */
    public float|string $step;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $label
     *
     * @return void
     */
    public function __construct($name = "text", $label = "Number Input", $placeholder = null, $max = "none", $min = "none", $step = 1)
    {
        parent::__construct($name, $label, $placeholder);

        $this->max  = $max;
        $this->min  = $min;
        $this->step = $step;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::input.number');
    }
}