<header class="fixed top-0 bg-white border-b border-gray-300 w-full p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        
        <!-- Left Side: Menu (desktop) -->
        <div class="flex space-x-6 md:flex">
            
            <!-- Menu 1 with Dropdown Arrow -->
            @foreach($menuItems as $menu)
            <div class="relative group">
                <button class="flex items-center hover:bg-gray-100 px-4 py-2 rounded-md cursor-pointer">
                    {{$menu['label']}}
                    <i class="text-xs fa fa-chevron-down ml-2 transition duration-300 ease-in-out transition-transform rotate-transition group-hover:rotate-180"></i>
                </button>
                <div class="absolute w-md p-3 left-0 hidden mt-1 space-y-2 bg-white text-black p-3 rounded-md group-hover:block border border-gray-300">

                <ul class="space-y-4">
                    @foreach($menu['subMenu'] as $subMenu)
                    <li class="flex items-center space-x-4 hover:bg-gray-100 cursor-pointer rounded-md">
                        <!-- Image -->
                        <img src="{{$subMenu['image']}}" alt="{{$subMenu['title']}}" class="w-12 h-12 object-cover rounded-full">

                        <!-- Text Content -->
                        <div>
                            <h3 class="text-lg font-semibold">{{$subMenu['title']}}</h3>
                            <p class="text-sm text-gray-500">{{$subMenu['subtitle']}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Right Side: Search and Sign In -->
        <div class="flex items-center space-x-4">
            <!-- Search Box -->
            <input type="text" placeholder="Search..." class="px-4 py-2 rounded-md w-48 border border-gray-300">

            <!-- Sign In Button -->
            <a href="/login" class="bg-red-700 hover:bg-red-500 text-white px-6 py-2 rounded-md">Sign In</a>
        </div>

        <!-- Hamburger Icon (Mobile) -->
        <div class="md:hidden flex items-center">
            <button id="hamburger-icon" class="text-2xl text-gray-700">
                <i class="fa fa-bars"></i> <!-- Hamburger Icon -->
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
     <!--
    <div id="mobile-menu" class="md:hidden bg-white border-t border-gray-300 hidden">
    <ul class="space-y-2 mt-3">
        @foreach($menuItems as $menu)
        <li class="border-b border-gray-300 py-2">
            <a href="#" class="block font-semibold text-gray-800 hover:text-blue-600">{{$menu['label']}}</a>
            <ul class="mt-1 space-y-1 pl-5">
                @foreach($menu['subMenu'] as $subMenu)
                <li>
                <a href="#" class="block text-sm font-medium text-gray-600 hover:text-blue-500">{{$subMenu['title']}}</a>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
    </div>
-->
</header>

<script>
    document.getElementById('hamburger-icon').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>