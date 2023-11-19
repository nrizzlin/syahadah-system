<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{asset('logo/logo.png')}}" width="60px">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :hover="request()->routeIs('home')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @Auth
                        @if(auth()->user()->usertype == 'admin')
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('list_users')" :hover="request()->routeIs('list_users')">
                                    {{ __('User Management') }}
                                </x-nav-link>
                                <x-nav-link :href="route('event.index')" :hover="request()->routeIs('event.index')">
                                    {{ __('Event Management') }}
                                </x-nav-link>
                                <x-nav-link :href="route('resources.index')" :hover="request()->routeIs('resources.index')">
                                    {{ __('Resources Management') }}
                                </x-nav-link>
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <x-nav-link>
                                                    {{ __('Report') }}
                                                </x-nav-link>
                    
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                    
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('attendance.list')" :hover="request()->routeIs('attendance.list')">
                                                {{ __('Report Clock-in/Clock-out') }}
                                            </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        @endif
                    @endauth

                    @Auth
                        @if(auth()->user()->usertype == 'daie')
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('mualaf.index')" :hover="request()->routeIs('mualaf.index')">
                                    {{ __('Mualaf Registration') }}
                                </x-nav-link>
                                <x-nav-link :href="route('journals.index')" :hover="request()->routeIs('journals.index')">
                                    {{ __('Journal Progress') }}
                                </x-nav-link>
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <x-nav-link>
                                                    {{ __('Attendance') }}
                                                </x-nav-link>
                    
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                    
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('attendance.index-daie')" :hover="request()->routeIs('attendance.index-daie')">
                                                {{ __('Clock-in/Clock-out') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('attendance.list-user')" :hover="request()->routeIs('attendance.list-user')">
                                                {{ __('List Clock-in/Clock-out') }}
                                            </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>                     
                                <x-nav-link :href="route('event.list')" :hover="request()->routeIs('event.list')">
                                    {{ __('Event') }}
                                </x-nav-link>
                            </div>
                    @endif
                   @endauth

                   @Auth
                   @if(auth()->user()->usertype == 'mentor')
                       <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                           <x-nav-link :href="route('journals.index')" :hover="request()->routeIs('journals.index')">
                               {{ __('Journal Progress') }}
                           </x-nav-link>
                           <x-nav-link :href="route('event.list')" :hover="request()->routeIs('event.list')">
                            {{ __('Event Information') }}
                            </x-nav-link>
                            <x-nav-link :href="route('mualaf.list')" :hover="request()->routeIs('mualaf.list')">
                                {{ __('Mualaf Information') }}
                            </x-nav-link>
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <x-nav-link>
                                                {{ __('Attendance') }}
                                            </x-nav-link>
                
                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('attendance.index-mentor')" :hover="request()->routeIs('attendance.index-daie')">
                                            {{ __('Clock-in/Clock-out') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('attendance.list-user')" :hover="request()->routeIs('attendance.list-user')">
                                            {{ __('List Clock-in/Clock-out') }}
                                        </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div> 
                       </div>
                    @endif
                    @endauth


                    @Auth
                    @if(auth()->user()->usertype == 'mualaf')
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('dailyprogress.index')" :hover="request()->routeIs('dailyprogress.index')">
                                {{ __('Progress Daily') }}
                            </x-nav-link>
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <x-nav-link>
                                                {{ __('Attendance') }}
                                            </x-nav-link>
                
                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('attendance.index-mentor')" :hover="request()->routeIs('attendance.index-daie')">
                                            {{ __('Clock-in/Clock-out') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link :href="route('attendance.list-user')" :hover="request()->routeIs('attendance.list-user')">
                                            {{ __('List Clock-in/Clock-out') }}
                                        </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div> 
                            <x-nav-link :href="route('event.list')" :hover="request()->routeIs('event.list')">
                                {{ __('Event Information') }}
                            </x-nav-link>
                            <x-nav-link :href="route('resources.list')" :hover="request()->routeIs('resources.list')">
                                {{ __('Resources Information') }}
                            </x-nav-link>
                        </div>
                     @endif
                     @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

                @auth
                @if(auth()->user()->usertype == 'admin')
                    <x-responsive-nav-link :href="route('list_users')" :active="request()->routeIs('list_users')">
                        {{ __('User Management') }}
                    </x-responsive-nav-link>
                @endif

                @if(auth()->user()->usertype == 'daie')
                    <x-responsive-nav-link :href="route('list_users')" :active="request()->routeIs('list_users')">
                        {{ __('List of Mualaf') }}
                    </x-responsive-nav-link>

                    {{-- <x-responsive-nav-link :href="route('add_mualaf')" :active="request()->routeIs('add_mualaf')">
                        {{ __('Add New Mualaf') }}
                    </x-responsive-nav-link> --}}

                    <x-responsive-nav-link :href="route('journals.index')" :active="request()->routeIs('daie.journals.index')">
                        {{ __('Journal Management') }}
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
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
