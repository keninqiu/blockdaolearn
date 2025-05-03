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
        $indents = array_filter(array_map(function ($line) {
            if (trim($line) === '') return null;
            preg_match('/^\s*/', $line, $matches);
            return strlen($matches[0]);
        }, $lines));
        $minIndent = $indents ? min($indents) : 0;

        return implode("\n", array_map(function ($line) use ($minIndent) {
            return preg_replace("/^\s{0,$minIndent}/", '', $line);
        }, $lines));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.code-block');
    }
}
