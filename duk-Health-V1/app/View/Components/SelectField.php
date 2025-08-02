<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    public string $label;
    public string $name;
    public string $model;
    public array $options;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name, string $label = '', string $model = '', array $options = [])
    {
        $this->name = $name;
        $this->label = $label;
        $this->model = $model;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-field');
    }
}
