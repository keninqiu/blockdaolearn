@extends('layouts.main')
@section('content')
<div class="flex flex-col items-start justify-start min-h-screen p-4">
    <h4 class="text-4xl font-bold dark:text-white text-center">{{ $post->title }}</h4>
    @if($post->description)
    <p class="text-gray-500 text-center">
      {!! $post->description !!}
    </p>
    @endif

    <div class="flex items-center justify-between p-4 w-screen max-w-md">
        <!-- Left side: Avatar, Username, Date -->
        <div class="flex items-center space-x-4">
          <img src="{{$post->user->avatar ? $post->user->avatar : '/images/avatar.png'}}" alt="avatar" class="w-12 h-12 rounded-full object-cover">
          <div>
            <p class="font-semibold text-gray-800">{{$post->user->nickname}}</p>
            <p class="text-sm text-gray-500">{{ $post->updated_at->format('Y年m月d日') }}</p>
          </div>
        </div>

        <!-- Right side: View count badge -->
        <div class="bg-blue-100 text-blue-600 text-sm font-medium px-3 py-1 rounded-full">
        {{$post->views}}+
        </div>
    </div>  

    @if($post->image)
    <img src="/{{$post->image}}" alt="{{$post->title}}" class="mb-4 shadow-lg" />
    @endif
    <div class="space-y-1 container">
        @foreach($post['blocks'] as $block)
            @includeIf('blocks.' . ($block->type ?? 'paragraph'), ['content' => $block->content])
        @endforeach
    </div>    
</div>
@endsection