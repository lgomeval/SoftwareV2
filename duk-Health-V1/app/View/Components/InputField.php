<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public string $label;
    public string $name;
    public string $model;
    public string $type;
    public string $autocomplete;
    public string $placeholder;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label = '',
        string $model = '',
        string $type = 'text',
        string $autocomplete = 'off',
        string $placeholder = ''
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->model = $model;
        $this->type = $type;
        $this->autocomplete = $autocomplete;
        $this->placeholder = $placeholder;
    }   

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-field');
    }
}
