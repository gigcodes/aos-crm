<div class="pb-8">
    <h1 class="sr-only">Profile</h1>
    <!-- Main 3 column grid -->
    <div class="grid grid-cols-1 items-start gap-4">
        <!-- Left column -->
        <div class="grid grid-cols-1 gap-4 lg:col-span-2">
            <!-- Welcome panel -->
            <section aria-labelledby="profile-overview-title">
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                    <div class="bg-white p-6">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div class="sm:flex sm:space-x-5">
                                <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                    <p class="text-sm font-medium text-gray-600">Welcome back,</p>
                                    <p class="text-xl font-bold text-gray-900 sm:text-2xl">{{ \Illuminate\Support\Str::title($user->name) }}</p>
                                    <p class="text-sm font-medium text-gray-600">Just few more steps to expore...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Actions panel -->
            <section aria-labelledby="quick-links-title">
                <div
                    class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-gray-200 shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
                    <div
                        class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                  <span class="inline-flex rounded-lg p-3 bg-teal-50 text-teal-700 ring-4 ring-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                          class="w-6 h-6">
  <path fill-rule="evenodd"
        d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z"
        clip-rule="evenodd"/>
</svg>
                  </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Fill out this Questionnaire Form
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus
                                officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et
                                molestiae.</p>
                        </div>
                    </div>
                    <div
                        class="sm:rounded-tr-lg group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                  <span class="inline-flex rounded-lg p-3 bg-purple-50 text-purple-700 ring-4 ring-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/>
                    </svg>
                  </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Complete and sign service agreement
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus
                                officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et
                                molestiae.</p>
                        </div>
                        <span
                            class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                            aria-hidden="true">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                  </svg>
                </span>
                    </div>
                    <div
                        class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                  <span class="inline-flex rounded-lg p-3 bg-sky-50 text-sky-700 ring-4 ring-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3"/>
</svg>

                  </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Ship Product Samples
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus
                                officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et
                                molestiae.</p>
                        </div>
                        <span
                            class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                            aria-hidden="true">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                  </svg>
                </span>
                    </div>
                    <div
                        class="group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                  <span class="inline-flex rounded-lg p-3 bg-yellow-50 text-yellow-700 ring-4 ring-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.042 21.672 13.684 16.6m0 0-2.51 2.225.569-9.47 5.227 7.917-3.286-.672Zm-7.518-.267A8.25 8.25 0 1 1 20.25 10.5M8.288 14.212A5.25 5.25 0 1 1 17.25 10.5"/>
</svg>

                  </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Book an appointment
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus
                                officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et
                                molestiae.</p>
                        </div>
                        <span
                            class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                            aria-hidden="true">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                  </svg>
                </span>
                    </div>
                    <div
                        class="sm:rounded-bl-lg group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                  <span class="inline-flex rounded-lg p-3 bg-rose-50 text-rose-700 ring-4 ring-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/>
</svg>

                  </span>
                        </div>
                        <div class="mt-8">
                            <h3 class="text-lg font-medium">
                                <a href="#" class="focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Join Our Skool Community
                                </a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus
                                officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et
                                molestiae.</p>
                        </div>
                        <span
                            class="pointer-events-none absolute right-6 top-6 text-gray-300 group-hover:text-gray-400"
                            aria-hidden="true">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                  </svg>
                </span>
                    </div>
                    <div
                        class="rounded-bl-lg rounded-br-lg sm:rounded-bl-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>

                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
