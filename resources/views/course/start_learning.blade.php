<!-- Alpine Component Wrapper -->
<div class="relative z-0">

  <!-- Trigger Button -->


  <!-- Modal -->
  <template x-if="showModal">
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
      <!-- Modal Container -->
      <div class="relative w-full h-full bg-white flex flex-col">

        <!-- Header -->
        <div class="fixed top-0 w-full z-10 flex items-center justify-between px-6 py-4 bg-gray-50 border-b border-gray-200">
          <div class="flex items-center gap-2">
            <img src="/{{$course->user->avatar ? $course->user->avatar : 'images/avatar.png'}}" alt="{{$course->user->nickname}}" class="w-12 h-12 rounded-full mr-4" />

            <span class="text-sm font-medium text-gray-700">{{$course->user->nickname}}</span>
          </div>
          <h2 class="text-lg font-semibold text-gray-900 text-center absolute left-0 right-0 mx-auto w-max">{{$course->title}}</h2>
          <button @click="showModal = false" class="text-gray-500 hover:text-gray-700" aria-label="Close">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Scrollable Content -->
        <div x-ref="modalContent" class="flex-1 overflow-y-auto mt-20 mb-20 px-6 py-4">
          @foreach ($posts as $index => $p)
            <div x-show="currentIndex === {{ $index }}" x-cloak>
              @include('course.post', ['post' => $p])
            </div>
          @endforeach
        </div>

        <!-- Footer -->
        <div class="fixed bottom-0 w-full z-10 flex items-center justify-between px-6 py-4 bg-gray-50 border-t border-gray-200">
          <button class="text-blue-600 hover:underline" @click="back" :disabled="currentIndex === 0">← 上一页</button>
          <h2 class="text-base font-medium text-gray-900" x-text="currentPost.title"></h2>
          <!-- Display "Finish" button when on the last post, hide "Next" button -->
          <template x-if="currentIndex === posts.length - 1">
            <button @click="close" class="text-blue-600 hover:underline">完成</button>
          </template>
          
          <!-- Display "Next" button except on the last post -->
          <template x-if="currentIndex < posts.length - 1">
            <button class="text-blue-600 hover:underline" @click="next">下一页 →</button>
          </template>
        </div>

      </div>
    </div>
  </template>

</div>