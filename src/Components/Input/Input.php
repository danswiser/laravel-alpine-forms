<?php

namespace LaravelAlpineForms\Components\Input;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class Input extends Component
{
    /**
     * The input id attribute.
     */
    public string $id;
    /**
     * The input name attribute.
     */
    public string $name;
    /**
     * The input label element.
     */
    public string $label;
    /**
     * The input placeholder.
     */
    public null|string $placeholder;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string  $label
     *
     * @return void
     */
    public function __construct($name = "input", $label = "Input", $placeholder = null)
    {
        $this->id           = 'x-input-' . Str::kebab(class_basename(get_class($this))) . '-' . md5($name);
        $this->name         = $name;
        $this->label        = $label;
        $this->placeholder  = $placeholder ?? "Enter $label";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return null;
    }
}