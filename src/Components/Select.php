<?php

namespace LaravelAlpineForms\Components;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

class Select extends Component
{
    /**
     * The input name attribute.
     */
    public string $name;
    /**
     * The input label element.
     */
    public string $label;
    /**
     * The options for the select.
     */
    public Collection|null $options;
    /**
     * The selected option.
     */
    public $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name = "select", $label = "Select Input", $options = null)
    {
        $this->name     = $name;
        $this->label    = $label;
        // $this->options  = $options ?? new Collection([]);
        $this->options  = $options ?? \App\Models\User::all();
        $this->selected = null;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::select');
    }
}