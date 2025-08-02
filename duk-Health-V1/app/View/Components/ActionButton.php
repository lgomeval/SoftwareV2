<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
 public $label;
    public $type;
    public $variant;
    public $disabled;
    public $icon;
    public $loading;


    /**
     * Create a new component instance.
     */
    public function __construct(
       $label = 'Enviar',
        $type = 'submit',
        $variant = 'primary',
        $disabled = false,
        $icon = null,
        $loading = true,


    ) {
       $this->label = $label;
        $this->type = $type;
        $this->variant = $variant;
        $this->disabled = $disabled;
        $this->icon = $icon;
        $this->loading = $loading;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}
