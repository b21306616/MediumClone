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

                                    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                                        @forelse ($posts as $post)
                                            @php($displayDate = $post->published_at ?? $post->created_at)

                                            <article
                                                class="flex h-full flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition duration-200 hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700 dark:bg-gray-800"
                                                data-testid="post-card-{{ $post->id }}">
                                                <div class="aspect-video overflow-hidden bg-gray-100 dark:bg-gray-700" x-data="{ imageFailed: false }">
                                                    @if ($post->image)
                                                        <img
                                                            x-show="!imageFailed"
                                                            x-on:error="imageFailed = true"
                                                            class="h-full w-full object-cover"
                                                            src="{{ $post->image }}"
                                                            alt="{{ $post->title }}"
                                                            loading="lazy">

                                                        <div
                                                            x-show="imageFailed"
                                                            class="flex h-full w-full flex-col items-center justify-center gap-2 text-gray-400 dark:text-gray-500"
                                                            style="display: none;"
                                                            data-testid="post-image-fallback-{{ $post->id }}">
                                                            <svg class="h-10 w-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m3 16 4-4 4 4 4-4 6 6M14 8h.01M5 21h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2Z" />
                                                            </svg>
                                                            <span class="text-sm font-medium">{{ __('Image unavailable') }}</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="flex h-full w-full flex-col items-center justify-center gap-2 text-gray-400 dark:text-gray-500"
                                                            data-testid="post-image-fallback-{{ $post->id }}">
                                                            <svg class="h-10 w-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m3 16 4-4 4 4 4-4 6 6M14 8h.01M5 21h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2Z" />
                                                            </svg>
                                                            <span class="text-sm font-medium">{{ __('No image available') }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="flex flex-1 flex-col gap-4 p-5">
                                                    <div class="flex flex-wrap items-center justify-between gap-2">
                                                        <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300">
                                                            {{ $post->category->name }}
                                                        </span>
                                                        <time class="text-xs text-gray-500 dark:text-gray-400" datetime="{{ $displayDate->toDateString() }}">
                                                            {{ $displayDate->format('M j, Y') }}
                                                        </time>
                                                    </div>

                                                    <h4 class="line-clamp-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-gray-100">
                                                        {{ $post->title }}
                                                    </h4>

                                                    <p class="line-clamp-3 text-sm leading-6 text-gray-600 dark:text-gray-300">
                                                        {{ Illuminate\Support\Str::limit(strip_tags($post->content), 160) }}
                                                    </p>
                                                </div>
                                            </article>
                                        @empty
                                            <div class="col-span-full rounded-xl border border-dashed border-gray-300 bg-white px-6 py-12 text-center dark:border-gray-700 dark:bg-gray-800">
                                                <h4 class="text-base font-semibold text-gray-900 dark:text-gray-100">{{ __('No stories yet') }}</h4>
                                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{ __('New articles will appear here when they are available.') }}</p>
                                            </div>
                                        @endforelse
                                    </div>
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
