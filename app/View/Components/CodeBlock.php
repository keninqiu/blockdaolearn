<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CodeBlock extends Component
{

    public string $content;

    public function __construct(string $content)
    {
        $this->content = $this->normalize($content);
    }

    private function normalize(string $code): string
    {
        $lines = explode("\n", trim($code));
    
        if (empty($lines)) return '';
    
        // Normalize just the first line's leading whitespace
        $firstLine = ltrim($lines[0]);
        $remainingLines = array_slice($lines, 1);
    
        return implode("\n", array_merge([$firstLine], $remainingLines));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.code-block');
    }
}
