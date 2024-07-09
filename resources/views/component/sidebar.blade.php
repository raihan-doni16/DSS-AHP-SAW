
<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">UT</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="index.html" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
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
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2">
                    <i class="fas fa-user mr-3"></i>
                  Altenatif
                </a>
                <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2">
                    <i class="fas fa-cog mr-3"></i>
                   Bobot & Kriteria
                </a>
                </div>
            </div>
        <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            Matriks
        </a>
        <a href="forms.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-align-left mr-3"></i>
            Nilai Preferensi
        </a>

    </nav>
</aside>

