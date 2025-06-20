@extends('layouts.main')
@section('content')


<div class="container mx-auto px-4 py-8">
  <!-- 顶部标题 -->
  <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">链道学堂</h1>

  <div class="grid md:grid-cols-2 gap-8">
    <!-- 新闻板块 -->
    <div class="bg-white rounded-2xl shadow p-6">
      <h2 class="text-2xl font-semibold text-blue-600 mb-4 flex items-center gap-2">
        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h4l2-2h6a2 2 0 012 2v14a2 2 0 01-2 2z" />
        </svg>
        区块链新闻
      </h2>
      <ul class="space-y-3 text-gray-700">
        @foreach($posts as $post)
        <li>
          <a href="/post/{{$post->slug}}" class="hover:text-blue-500 font-medium">{{$post->emoji}} {{$post->title}}</a>
        </li>
        @endforeach
        <li>
          <a href="/posts" class="text-sm text-blue-400 hover:underline">查看更多 →</a>
        </li>
      </ul>
    </div>

    <!-- 学习板块 -->
    <div class="bg-white rounded-2xl shadow p-6">
      <h2 class="text-2xl font-semibold text-green-600 mb-4 flex items-center gap-2">
        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M12 20h9M12 4v16m0-16L3 9m9-5l9 5" />
        </svg>
        区块链学习
      </h2>
      <ul class="space-y-3 text-gray-700">
        @foreach($courses as $course)
        <li>
          <a href="/course/{{$course->slug}}" class="hover:text-green-500 font-medium">{{$course->emoji}} {{$course->title}}</a>
        </li>
        @endforeach
        <li>
          <a href="/courses" class="text-sm text-green-400 hover:underline">查看更多 →</a>
        </li>
      </ul>
    </div>
  </div>
</div>

@endsection