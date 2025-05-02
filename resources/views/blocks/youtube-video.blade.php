@php
    // 提取 YouTube 视频 ID（支持完整链接或 ID）
    $videoId = preg_replace('/^.*(?:youtu\.be\/|v=)([a-zA-Z0-9_-]{11}).*$/', '$1', $content ?? '');
@endphp

@if ($videoId)
    <div class="my-4 aspect-w-16 aspect-h-9">
        <iframe 
            src="https://www.youtube.com/embed/{{ $videoId }}" 
            class="w-full h-full rounded-lg shadow"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
        </iframe>
    </div>
@endif