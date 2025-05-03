@php
$html = $content;


// 处理 <ol>
$html = preg_replace(
    '/<ol(.*?)class="(.*?)"(.*?)>/i',
    '<ol$1class="$2 ol-item"$3>',
    preg_replace('/<ol(?![^>]*class)/i', '<ol class="ol-item"', $html)
);

// 处理 <ul>
$html = preg_replace(
    '/<ul(.*?)class="(.*?)"(.*?)>/i',
    '<ul$1class="$2 list-disc pl-8"$3>',
    preg_replace('/<ul(?![^>]*class)/i', '<ul class="list-disc pl-8"', $html)
);

@endphp
<div class="prose max-w-none ol-reset">
{!! $html !!}
</div>