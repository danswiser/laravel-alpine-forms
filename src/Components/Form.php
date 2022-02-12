<?php

namespace LaravelAlpineForms\Components;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

class Form extends Component
{
    /**
     * Request method.
     */
    public string $method;

    /**
     * Form method spoofing to support PUT, PATCH and DELETE actions.
     * https://laravel.com/docs/master/routing#form-method-spoofing
     */
    public bool $spoofMethod = false;

    /**
     * A model to bind the form to.
     *
     * @var Mixed
     */
    public $binding;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method = 'POST')
    {
        $this->method = strtoupper($method);

        $this->spoofMethod = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return View::make('components::form');
    }
}