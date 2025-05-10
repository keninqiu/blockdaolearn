@extends('layouts.main')
@section('content')
<div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
  <!-- Card -->
   @foreach($courses as $course)
  <div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <a href="/course/{{$course->slug}}">
    <img src="/{{$course->image}}" alt="{{$course->title}}" class="w-full h-48 object-cover">
    <div class="p-4">
      <h2 class="text-xl font-semibold mb-2">{{$course->title}}</h2>

      <span class="inline-block px-2 py-1 text-xs font-semibold text-red-400 bg-red-200 rounded-full">
        +{{$course->xp}}经验值
      </span>

      <p class="mt-3 text-gray-500 text-sm line-clamp-3">
        {!! $course->content !!}
      </p>

      <div class="flex items-center justify-between p-4 w-full max-w-md">
        <!-- Left side: Avatar, Username, Date -->
        <div class="flex items-center space-x-4">
          <img src="{{$course->user->avatar ? $course->user->avatar : '/images/avatar.png'}}" alt="avatar" class="w-12 h-12 rounded-full object-cover">
          <div>
            <p class="font-semibold text-gray-800">{{$course->user->nickname}}</p>
            <p class="text-sm text-gray-500">{{ $course->updated_at->format('Y年m月d日') }}</p>
          </div>
        </div>

        <!-- Right side: View count badge -->
        <div class="bg-blue-100 text-blue-600 text-sm font-medium px-3 py-1 rounded-full">
        {{$course->views}}+
        </div>
      </div>

    </div>
    </a>
  </div>
  @endforeach
  <!-- Repeat the card as needed -->
</div>
@endsection