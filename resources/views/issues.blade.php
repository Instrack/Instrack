<x-app-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!--
      This example requires updating your template:

      ```
      <html class="h-full bg-gray-100">
      <body class="h-full">
      ```
    -->
    <div class="min-h-full" x-data="{mn:false}">
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{route('dashboard')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

                                <a href="{{route('teams')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Teams</a>

                                <a href="{{route('projects')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                                <a href="{{route('repositories')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Repositories</a>

                                <a href="{{route('issues')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Issues</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="ml-3 relative" x-data="{menu:false}">
                                <div>
                                    <button @click="menu = true" @click.away="menu = false" type="button" class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="{{auth()->user()->getProfilePhotoUrlAttribute()}}" alt="{{auth()->user()->name & "'s profile photo."}}">
                                    </button>
                                </div>

                                <!--
                                  Dropdown menu, show/hide based on menu state.

                                  Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                  Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                                -->
                                <div x-show="menu" x-cloak class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                    <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>

                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="mn = true" @click.away="mn = false" type="button" class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!--
                              Heroicon name: outline/menu

                              Menu open: "hidden", Menu closed: "block"
                            -->
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <!--
                              Heroicon name: outline/x

                              Menu open: "block", Menu closed: "hidden"
                            -->
                            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show="mn" x-cloak class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{route('dashboard')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>

                    <a href="{{route('teams')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Teams</a>

                    <a href="{{route('projects')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

                    <a href="{{route('repositories')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Repositories</a>

                    <a href="{{route('issues')}}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Issues</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{auth()->user()->getProfilePhotoUrlAttribute()}}" alt="{{auth()->user()->name & "'s profile photo."}}">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{auth()->user()->name}}</div>
                            <div class="text-sm font-medium text-gray-400">{{auth()->user()->email}}</div>
                        </div>
                        <button type="button" class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 px-2 space-y-1">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Profile</a>

                        <a href="{{route('profile.show')}}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Settings</a>

                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                <h1 class="text-lg leading-6 font-semibold text-gray-900">Issues</h1>
            </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
                <div>
                    <div class="sm:hidden">
                        <label for="tabs" class="sr-only">Select a tab</label>
                        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                        <select id="tabs" name="tabs" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option>Applied</option>

                            <option>Phone Screening</option>

                            <option selected>Interview</option>

                            <option>Offer</option>

                            <option>Disqualified</option>
                        </select>
                    </div>
                    <div class="hidden sm:block">
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200" -->
                                <a href="?" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm">
                                    All

                                    <!-- Current: "bg-indigo-100 text-indigo-600", Default: "bg-gray-100 text-gray-900" -->
                                    <span class="bg-gray-100 text-gray-900 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{auth()->user()->Issue()->count()}}</span>
                                </a>

                                <a href="?open=true" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-200 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm">
                                    Open

                                    <span class="bg-gray-100 text-gray-900 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{auth()->user()->Issue()->where('open', true)->count()}}</span>
                                </a>

                                <a href="?open=false" class="border-indigo-500 text-indigo-600 whitespace-nowrap flex py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                                    Closed

                                    <span class="bg-indigo-100 text-indigo-600 hidden ml-3 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{auth()->user()->Issue()->where('open', false)->count()}}</span>
                                </a>

                                </nav>
                        </div>
                    </div>
                </div>


                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow overflow-hidden sm:rounded-md">
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($issues as $i)
                        <li>
                            <a href="#" class="block hover:bg-gray-50">
                                <div class="flex items-center px-4 py-4 sm:px-6">
                                    <div class="min-w-0 flex-1 flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full" src="{{$i->User->getProfilePhotoUrlAttribute()}}" alt="">
                                        </div>
                                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                            <div>
                                                <p class="text-sm font-medium text-indigo-600 truncate">{{$i->title}}</p>
                                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                                    {{--<!-- Heroicon name: solid/mail -->
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                                    </svg>--}}
                                                    <span class="truncate">{{$i->description}}</span>
                                                </p>
                                            </div>
                                            <div class="hidden md:block">
                                                <div>
                                                    <p class="text-sm text-gray-900">
                                                        Opened on
                                                        <time datetime="2020-01-07">{{$i->created_at}} by {{$i->User->name}}</time>
                                                    </p>
                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                        <!-- Heroicon name: solid/check-circle -->
                                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                        </svg>
                                                        {{$i->Repository->name}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- Heroicon name: solid/chevron-right -->
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>


                <!-- /End replace -->
            </div>
        </main>
    </div>

</x-app-layout>
