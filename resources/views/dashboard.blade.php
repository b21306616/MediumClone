<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div x-data="{ activeTab: 'all' }" class="w-full">
                        <!-- Tab Navigation -->
                        <ul class="flex flex-wrap justify-center gap-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400" role="tablist">
                            <li>
                                <button
                                    type="button"
                                    @click="activeTab = 'all'"
                                    :class="activeTab === 'all'
                                        ? 'text-white bg-indigo-600 dark:bg-indigo-500 shadow-sm'
                                        : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700'"
                                    class="inline-block px-4 py-2.5 rounded-lg transition-colors duration-150"
                                    role="tab"
                                    :aria-selected="activeTab === 'all'">
                                    {{ __('All') }}
                                </button>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <button
                                        type="button"
                                        @click="activeTab = {{ $category->id }}"
                                        :class="activeTab === {{ $category->id }}
                                            ? 'text-white bg-indigo-600 dark:bg-indigo-500 shadow-sm'
                                            : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700'"
                                        class="inline-block px-4 py-2.5 rounded-lg transition-colors duration-150"
                                        role="tab"
                                        :aria-selected="activeTab === {{ $category->id }}">
                                        {{ $category->name }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab Content Panels -->
                        <div class="mt-6">
                            <div
                                x-show="activeTab === 'all'"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                role="tabpanel">
                                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-700">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ __('All Stories') }}</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __('Showing all articles across all categories.') }}</p>
                                    @forelse ($posts as $post)
                                        <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                                            <a href="#">
                                                <img class="rounded-base" src="/docs/images/blog/image-1.jpg" alt="" />
                                            </a>
                                            <a href="#">
                                                <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">Streamlining your design process today.</h5>
                                            </a>
                                            <p class="mb-6 text-body">In today’s fast-paced digital landscape, fostering seamless collaboration among Developers and IT Operations.</p>
                                            <a href="#" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                Read more
                                                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                                            </a>
                                        </div>
                                    @empty

                                    @endforelse
                                </div>
                            </div>

                            @foreach($categories as $category)
                                <div
                                    x-show="activeTab === {{ $category->id }}"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    role="tabpanel"
                                    style="display: none;">
                                    <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-700">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $category->name }}</h3>
                                        <p class="mt-2 text-gray-600 dark:text-gray-400">Content for {{ $category->name }}.</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
