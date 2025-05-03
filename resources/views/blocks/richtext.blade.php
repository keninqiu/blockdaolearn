@php
$html = $content;


// Define the classes for each element
$classes = [
    'ol' => ['ol-item'],
    'ul' => ['list-disc', 'pl-8'],
    'table' => ['w-full', 'border-collapse', 'border', 'border-gray-300'],
    'th' => ['border', 'border-gray-300', 'p-2'],
    'td' => ['border', 'border-gray-300', 'p-2']
];


// Process each element type (ol, ul, table) and add the classes
foreach ($classes as $element => $elementClasses) {
    // Combine the classes into a single string
    $classAttr = implode(' ', $elementClasses);

    // Regex to add class to elements that already have a class attribute
    $html = preg_replace_callback(
        '/<' . $element . '(.*?)class="(.*?)"(.*?)>/i',
        function ($matches) use ($element, $classAttr) {
            // Append the new class to existing ones
            return "<{$element}{$matches[1]}class=\"{$matches[2]} {$classAttr}\"{$matches[3]}>";
        },
        // Regex to add class to elements that do not have a class attribute
        preg_replace(
            '/<' . $element . '(?![^>]*class)/i',
            "<$element class=\"$classAttr\"",
            $html
        )
    );
}

@endphp
<div class="prose max-w-none ol-reset">
{!! $html !!}
</div>