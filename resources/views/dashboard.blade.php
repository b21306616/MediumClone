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
                    <div x-data="{ activeTab: 'tab1' }" class="w-full">
                        <!-- Tab Navigation -->
                        <ul class="flex flex-wrap justify-center gap-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400" role="tablist">
                            <li>
                                <button 
                                    type="button"
                                    @click="activeTab = 'tab1'"
                                    :class="activeTab === 'tab1' 
                                        ? 'text-white bg-indigo-600 dark:bg-indigo-500 shadow-sm' 
                                        : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700'"
                                    class="inline-block px-4 py-2.5 rounded-lg transition-colors duration-150"
                                    role="tab"
                                    :aria-selected="activeTab === 'tab1'">
                                    Tab 1
                                </button>
                            </li>
                            <li>
                                <button 
                                    type="button"
                                    @click="activeTab = 'tab2'"
                                    :class="activeTab === 'tab2' 
                                        ? 'text-white bg-indigo-600 dark:bg-indigo-500 shadow-sm' 
                                        : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700'"
                                    class="inline-block px-4 py-2.5 rounded-lg transition-colors duration-150"
                                    role="tab"
                                    :aria-selected="activeTab === 'tab2'">
                                    Tab 2
                                </button>
                            </li>
                            <li>
                                <button 
                                    type="button"
                                    @click="activeTab = 'tab3'"
                                    :class="activeTab === 'tab3' 
                                        ? 'text-white bg-indigo-600 dark:bg-indigo-500 shadow-sm' 
                                        : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700'"
                                    class="inline-block px-4 py-2.5 rounded-lg transition-colors duration-150"
                                    role="tab"
                                    :aria-selected="activeTab === 'tab3'">
                                    Tab 3
                                </button>
                            </li>
                            <li>
                                <button 
                                    type="button"
                                    @click="activeTab = 'tab4'"
                                    :class="activeTab === 'tab4' 
                                        ? 'text-white bg-indigo-600 dark:bg-indigo-500 shadow-sm' 
                                        : 'hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700'"
                                    class="inline-block px-4 py-2.5 rounded-lg transition-colors duration-150"
                                    role="tab"
                                    :aria-selected="activeTab === 'tab4'">
                                    Tab 4
                                </button>
                            </li>
                            <li>
                                <button 
                                    type="button"
                                    disabled
                                    class="inline-block px-4 py-2.5 rounded-lg text-gray-400 dark:text-gray-600 cursor-not-allowed opacity-60"
                                    role="tab"
                                    aria-disabled="true">
                                    Tab 5 (Disabled)
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content Panels -->
                        <div class="mt-6">
                            <div x-show="activeTab === 'tab1'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" role="tabpanel">
                                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-700">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tab 1 Content</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">This is the content for Tab 1. You can put your dashboard metrics, feeds, or any content here.</p>
                                </div>
                            </div>
                            <div x-show="activeTab === 'tab2'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" role="tabpanel" style="display: none;">
                                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-700">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tab 2 Content</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">This is the content for Tab 2. You can manage stories, drafts, or statistics here.</p>
                                </div>
                            </div>
                            <div x-show="activeTab === 'tab3'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" role="tabpanel" style="display: none;">
                                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-700">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tab 3 Content</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">This is the content for Tab 3. View your bookmarks, saved articles, or reading list.</p>
                                </div>
                            </div>
                            <div x-show="activeTab === 'tab4'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" role="tabpanel" style="display: none;">
                                <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900/50 border border-gray-100 dark:border-gray-700">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Tab 4 Content</h3>
                                    <p class="mt-2 text-gray-600 dark:text-gray-400">This is the content for Tab 4. Account settings, notifications, or activity log.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
