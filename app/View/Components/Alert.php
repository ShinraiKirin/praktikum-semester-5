<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $message;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = 'info', string $message = '')
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // Langsung return HTML alert tanpa file Blade terpisah
        return <<<HTML
        <div class="alert alert-{$this->type}">
            {$this->message}
        </div>
        HTML;
    }
}
