<header class="fixed top-0 bg-white border-b border-gray-200 w-full p-4 z-50 shadow-sm">
  <div class="max-w-7xl mx-auto flex justify-between items-center">

    <!-- Logo -->
    <a href="/" class="flex items-center space-x-2">
      <img src="/images/logo.png" alt="Logo" class="h-10 w-auto">
      <span class="text-xl font-bold text-gray-800 hidden sm:inline">链道学堂</span>
    </a>

    <!-- Menu -->
    <nav id="menu" class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-6 absolute md:static left-0 top-full bg-white w-full md:w-auto border-t border-gray-100 md:border-none mt-4 md:mt-0 shadow-md md:shadow-none rounded-md md:rounded-none">
      @foreach($menuItems as $menu)
      <div class="relative group border-b border-gray-100 md:border-none">
        <!-- 主菜单 -->
        <button 
          class="flex items-center justify-between w-full md:w-auto hover:bg-gray-50 px-4 py-3 rounded-md cursor-pointer text-left transition-colors"
          onclick="toggleSubmenu(this)">
          {{$menu['label']}}
          <i class="text-xs fa fa-chevron-down ml-2 transition-transform duration-300"></i>
        </button>

        <!-- 子菜单 -->
        <div class="submenu hidden md:absolute md:left-0 md:top-full md:w-md md:space-y-2 bg-white text-black p-3 rounded-lg border border-gray-200 md:group-hover:block z-10 shadow-sm">
          <ul class="space-y-3">
            @foreach($menu['subMenu'] as $subMenu)
            <li class="flex items-center space-x-4 hover:bg-gray-50 cursor-pointer rounded-md p-2 transition">
              <a href="{{$subMenu['link']}}" class="flex items-center space-x-4 w-full">
                @if($subMenu['image'])
                <img src="{{$subMenu['image']}}" alt="{{$subMenu['title']}}" class="w-10 h-10 object-cover rounded-full">
                @endif
                <div>
                  <h3 class="text-base font-semibold text-gray-800">{{$subMenu['title']}}</h3>
                  <p class="text-sm text-gray-500">{{$subMenu['subtitle']}}</p>
                </div>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      @endforeach
    </nav>

    <!-- Right Side -->
    <div class="flex items-center space-x-4">
      <input type="text" placeholder="搜索..." class="px-4 py-2 rounded-md w-48 border border-gray-300 hidden md:block">
      <a href="/login" class="bg-red-700 hover:bg-red-500 text-white px-6 py-2 rounded-md hidden md:block">登录</a>
      <button id="hamburger-icon" class="md:hidden text-2xl text-gray-700">
        <i class="fa fa-bars"></i>
      </button>
    </div>
  </div>
</header>

<script>
  const hamburger = document.getElementById('hamburger-icon');
  const menu = document.getElementById('menu');
  let menuOpen = false;

  hamburger.addEventListener('click', () => {
    menuOpen = !menuOpen;
    menu.classList.toggle('hidden', !menuOpen);
    hamburger.innerHTML = menuOpen
      ? '<i class="fa fa-times"></i>'
      : '<i class="fa fa-bars"></i>';
  });

  function toggleSubmenu(button) {
    if (window.innerWidth >= 768) return;
    const submenu = button.nextElementSibling;
    const icon = button.querySelector('i');
    submenu.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
  }

  window.addEventListener('resize', () => {
    if (window.innerWidth >= 768) {
      menu.classList.remove('hidden');
    } else if (!menuOpen) {
      menu.classList.add('hidden');
    }
  });
</script>
