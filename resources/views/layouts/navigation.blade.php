<nav x-data="{ open: false }" class="bg-green-500 border-b-2 border-gray-400">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-14 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @switch(auth()->user()->user_type)
                        @case('superadmin')
                            <x-nav-link :href="route('superadmin.dashboard')" :active="request()->routeIs('superadmin.dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('superadmin.barangay')" :active="request()->routeIs('superadmin.barangay')">
                                {{ __('Barangays') }}
                            </x-nav-link>
                            <x-nav-link :href="route('superadmin.purok')" :active="request()->routeIs('superadmin.purok')">
                                {{ __('Puroks') }}
                            </x-nav-link>
                            <x-nav-link :href="route('superadmin.waste')" :active="request()->routeIs('superadmin.waste')">
                                {{ __('Wastes') }}
                            </x-nav-link>
                            <x-nav-link :href="route('superadmin.violation')" :active="request()->routeIs('superadmin.violation')">
                                {{ __('Violation') }}
                            </x-nav-link>
                            <x-nav-link :href="route('superadmin.reports')" :active="request()->routeIs('superadmin.reports')">
                                {{ __('Reports') }}
                            </x-nav-link>
                            <x-nav-link :href="route('superadmin.users')" :active="request()->routeIs('superadmin.users')">
                                {{ __('Users') }}
                            </x-nav-link>
                        @break

                        @case('admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.complaints')" :active="request()->routeIs('admin.complaints')">
                                {{ __('Complaints') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')">
                                {{ __('Reports') }}
                            </x-nav-link>
                        @break

                        @case('complainant')
                            <x-nav-link :href="route('complainant.dashboard')" :active="request()->routeIs('complainant.dashboard')">
                                {{ __('My Profile') }}
                            </x-nav-link>
                            <x-nav-link :href="route('complainant.complaint')" :active="request()->routeIs('complainant.complaint')">
                                {{ __('Send Complaints') }}
                            </x-nav-link>
                            <x-nav-link :href="route('complainant.records')" :active="request()->routeIs('complainant.records')">
                                {{ __('Records') }}
                            </x-nav-link>
                        @break

                        @default
                    @endswitch
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div x-data="{
                    dropdownOpen: false
                }" class="relative">

                    <button @click="dropdownOpen=true"
                        class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">

                        <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                            <span>{{ auth()->user()->name }}</span>
                            <span class="text-xs font-light text-neutral-400">{{ auth()->user()->email }}</span>
                        </span>
                        <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                        x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                        x-transition:enter-end="translate-y-0"
                        class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                        <div
                            class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                            <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                            <a href="#_"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Profile</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                            </a>

                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" x2="9" y1="12" y2="12"></line>
                                    </svg>
                                    <span>Log out</span>
                                    <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center bg-white justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @switch(auth()->user()->user_type)
                @case('superadmin')
                    <x-responsive-nav-link :href="route('superadmin.dashboard')" :active="request()->routeIs('superadmin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('superadmin.barangay')" :active="request()->routeIs('superadmin.barangay')">
                        {{ __('Barangays') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('superadmin.purok')" :active="request()->routeIs('superadmin.purok')">
                        {{ __('Puroks') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('superadmin.waste')" :active="request()->routeIs('superadmin.waste')">
                        {{ __('Wastes') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('superadmin.violation')" :active="request()->routeIs('superadmin.violation')">
                        {{ __('Violation') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('superadmin.reports')" :active="request()->routeIs('superadmin.reports')">
                        {{ __('Reports') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('superadmin.users')" :active="request()->routeIs('superadmin.users')">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                @break

                @case('admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.complaints')" :active="request()->routeIs('admin.complaints')">
                        {{ __('Complaints') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.reports')" :active="request()->routeIs('admin.reports')">
                        {{ __('Reports') }}
                    </x-responsive-nav-link>
                @break

                @case('complainant')
                    <x-responsive-nav-link :href="route('complainant.dashboard')" :active="request()->routeIs('complainant.dashboard')">
                        {{ __('My Profile') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('complainant.complaint')" :active="request()->routeIs('complainant.complaint')">
                        {{ __('Send Complaints') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('complainant.records')" :active="request()->routeIs('complainant.records')">
                        {{ __('Records') }}
                    </x-responsive-nav-link>
                @break

                @default
            @endswitch
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
