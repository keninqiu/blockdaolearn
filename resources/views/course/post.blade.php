<p class="text-gray-700 mb-4">Here is some scrollable content inside the modal...</p>
          <div class="space-y-4">
            @for ($i = 1; $i <= 20; $i++)
              <p class="text-gray-600">Scrollable line {{ $i }}</p>
            @endfor
          </div>