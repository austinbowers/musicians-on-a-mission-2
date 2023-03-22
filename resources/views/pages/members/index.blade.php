<x-main-layout>
            <div class="relative px-6 lg:px-8 py-16">
                <div class="mx-auto max-w-screen-lg">
                    <h1 class="text-4xl font-bold tracking-tight pb-4 text-gray-900 sm:text-5xl">Members</h1>
                    <p class="text-lg text-gray-500 pb-5 mb-5">To be apart of our members list, you must have a registered account and be subscribed to our <a class="text-red-500 font-medium hover:underline" href="/membership">membership program</a>.</p>
                    <ul role="list" class="grid gap-x-8 gap-y-12 md:grid-cols-2 lg:grid-cols-3 sm:gap-y-16 xl:col-span-2">
                        @foreach ($users as $user)
                        <li>
                            <a href="/members/{{ $user->id }}" class="flex group items-center gap-x-4">
                                <div class="h-16 w-16 rounded-full group-hover:border group-hover:border-red-300 bg-gray-200"></div>
                                <div>
                                    <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $user->name }}</h3>
                                    <p class="text-sm font-semibold leading-6 text-red-500">Folk / Pop</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
</x-main-layout>