@extends('layouts.main')
@section('content')
<div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
  <!-- Card -->
   @foreach($posts as $post)
  <div class="bg-white rounded-2xl shadow-md overflow-hidden">
    <img src="{{$post->image}}" alt="{{$post->title}}" class="w-full h-48 object-cover">
    <div class="p-4">
      <h2 class="text-xl font-semibold mb-2">{{$post->title}}</h2>
      <p class="text-gray-400 line-clamp-3">
        {!! $post->content !!}
      </p>
    </div>
  </div>
  @endforeach
  <!-- Repeat the card as needed -->
</div>
@endsection