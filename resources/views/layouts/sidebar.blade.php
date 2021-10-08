<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
        <a href="{{ route('dashboard') }}"
            class="text-center text-white text-3xl font-semibold uppercase hover:text-gray-300">{{config('app.name', 'Laravel')}}</a>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{ route('dashboard') }}"
            class="{{(request()->routeIs('dashboard') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>

        {{-- Admin --}}
        @if (Auth::user()->hasRole('admin'))
        <a href="{{ route('admin-portofolio') }}"
            class="{{(request()->routeIs('admin-portofolio') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Portofolio
        </a>
        <a href="{{ route('admin-user') }}"
            class="{{(request()->routeIs('admin-user') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-table mr-3"></i>
            User Account
        </a>
        <a href="{{ route('admin-kegiatan') }}"
            class="{{(request()->routeIs('admin-kegiatan') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-calendar mr-3"></i>
            Kegiatan
        </a>
        @endif

        {{-- Pembimbing Akademik --}}
        @if (Auth::user()->hasRole('pa'))
        <a href="{{ route('pa-mahasiswa') }}"
            class="{{(request()->routeIs('pa-mahasiswa') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Mahasiswa
        </a>
        @endif

        {{-- Mahasiswa --}}
        @if (Auth::user()->hasRole('mahasiswa'))
        <a href="{{ route('mhs-portofolio') }}"
            class="{{(request()->routeIs('mhs-portofolio') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-sticky-note mr-3"></i>
            Portofolio
        </a>
        <a href="{{ route('mhs-kegiatan') }}"
            class="{{(request()->routeIs('mhs-kegiatan') ? 'active-nav-link ' : 'opacity-75 hover:opacity-100 ')}}flex items-center text-white py-4 pl-6 nav-item">
            <i class="fas fa-calendar mr-3"></i>
            Kegiatan
        </a>
        @endif
    </nav>

</aside>
