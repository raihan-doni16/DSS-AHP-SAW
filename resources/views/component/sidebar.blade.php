
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">UT</a>
    </div>
    <a href="{{ route('home') }}" class="flex items-center text-white py-4 pl-6 {{ request()->routeIs('home') ? 'active-nav-link' : '' }}">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Dashboard
    </a>

            <div x-data="{ open: false }">
                <a @click="open = !open" class="flex items-center  text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item pr-2">
                <i class="fas fa-sticky-note mr-3"></i>
                Data
                <i class="fas fa-chevron-down ml-auto"></i>
                </a>
                <div x-show="open" @click.away="open = false" class="pl-6">
                <a href="{{route('alternative')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 {{ request()->routeIs('alternative') ? 'active-nav-link' : '' }}">
                    <i class="fas fa-user mr-3"></i>
                  Altenatif
                </a>
                <a href="{{route('kriteria')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 {{ request()->routeIs('kriteria') ? 'active-nav-link' : '' }}">
                    <i class="fas fa-cog mr-3"></i>
                   Kriteria
                </a>
                </div>
            </div>
        <a href="{{route('matriks')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item {{ request()->routeIs('matriks') ? 'active-nav-link' : '' }}">
            <i class="fas fa-table mr-3"></i>
            Matriks
        </a>
      

    </nav>
</aside>

