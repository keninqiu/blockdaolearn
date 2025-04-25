@extends('layouts.main')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 px-4 w-full">
  <!-- Image -->
  <img src="/{{$course->image}}" alt="{{$course->title}}" class="mb-4 rounded-xl shadow-lg" />

  <!-- Title -->
  <h1 class="text-3xl font-bold text-gray-800 mb-2">{{$course->title}}</h1>

  <!-- Description -->
  <p class="text-gray-600 text-center max-w-md">
    {{$course->content}}
  </p>

  <div class="flex justify-center items-center space-x-4 my-3">
  <div class="flex items-center space-x-4">
    <div class="flex items-center p-4 rounded-xl max-w-md">
        <!-- Circular Image -->
        <img src="/{{$course->user->avatar ? $course->user->avatar : 'images/avatar.png'}}" alt="{{$course->user->nickname}}" class="w-16 h-16 rounded-full mr-4" />

        <!-- Title and Subtitle -->
        <div>
            <p class="text-sm text-gray-500">作者</p>
            <h2 class="text-lg font-semibold text-gray-800">{{$course->user->nickname}}</h2>
        </div>
    </div>
    <div class="h-5 w-px bg-gray-400"></div>
    <div class="flex items-center p-4 rounded-xl max-w-md">
        <!-- Circular Image -->
        <img src="https://via.placeholder.com/64" alt="Profile" class="w-16 h-16 rounded-full mr-4" />

        <!-- Title and Subtitle -->
        <div>
            <p class="text-sm text-gray-500">经验值</p>
            <h2 class="text-lg font-semibold text-gray-800">{{$course->xp}}</h2>
        </div>
    </div>
    <div class="h-5 w-px bg-gray-400"></div>
    <div class="flex items-center p-4 rounded-xl max-w-md">
        <!-- Circular Image -->
        <img src="https://via.placeholder.com/64" alt="Profile" class="w-16 h-16 rounded-full mr-4" />

        <!-- Title and Subtitle -->
        <div>
            <p class="text-sm text-gray-500">阅读时间</p>
            <h2 class="text-lg font-semibold text-gray-800">{{ $course->updated_at->format('Y年m月d日') }}</h2>
        </div>
    </div>
  </div>
</div>
</div>

@endsection