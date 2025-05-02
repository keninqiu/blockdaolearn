<div class="space-y-1 container">
    @foreach($post['blocks'] as $block)
        @includeIf('blocks.' . ($block->type ?? 'paragraph'), ['content' => $block->content])
    @endforeach
</div>