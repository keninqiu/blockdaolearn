@extends('layouts.main')
@section('content')

<script>
  window.coursePosts = @json($posts);
</script>

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
          <img src="/images/xp.png" alt="Profile" class="w-16 h-16 rounded-full mr-4" />

          <!-- Title and Subtitle -->
          <div>
              <p class="text-sm text-gray-500">经验值</p>
              <h2 class="text-lg font-semibold text-gray-800">{{$course->xp}}</h2>
          </div>
      </div>
      <div class="h-5 w-px bg-gray-400"></div>
      <div class="flex items-center p-4 rounded-xl max-w-md">
          <!-- Circular Image -->
          <img src="/images/reading_time.png" alt="Profile" class="w-16 h-16 rounded-full mr-4" />

          <!-- Title and Subtitle -->
          <div>
              <p class="text-sm text-gray-500">阅读时间</p>
              <h2 class="text-lg font-semibold text-gray-800">{{ $course->reading_time }}分钟</h2>
          </div>
      </div>
    </div>
  </div>


  @include('course.start_learning')

  <div class="container mt-6">

  <ul class="w-full divide-y divide-gray-200 bg-white rounded-xl shadow-md">
    @foreach($posts as $post)
    <li class="flex items-center justify-between px-4 py-3 hover:bg-gray-50">
      <div class="flex items-center gap-2">
        <!-- Reading icon -->
        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 19.5A2.5 2.5 0 016.5 17H20m-16 2.5V6.5A2.5 2.5 0 016.5 4H20v13H6.5A2.5 2.5 0 014 19.5z" />
        </svg>
        <span class="text-gray-800 text-sm">{{$post['title']}}</span>
      </div>
      <!-- Progress icon -->
      @if($post['read']) 
      <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
      </svg>
      @else
      <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
      </svg>      
      @endif
    </li>
    @endforeach
  </ul>

</div>

</div>
@endsection