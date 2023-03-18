<x-main-layout>
            <div class="relative px-6 lg:px-8 py-16">
                <div class="mx-auto max-w-3xl">
                    <h1 class="text-4xl font-bold tracking-tight pb-4 text-gray-900 sm:text-5xl">Members</h1>
                    <p class="border-b text-lg text-gray-500 pb-5 mb-5">To be apart of our members list, you must have a registered account and be subscribed to our <a class="text-red-500 font-medium hover:underline" href="/membership">membership program</a>.</p>

                    <div class="columns-1 md:columns-2 lg:columns-3 space-y-3">
                        
                        @foreach ($users as $user)
                            <a class="block text-red-500 hover:text-red-900 transition duration-200" href="/members/{{ $user->id }}">
                                {{ $user->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
</x-main-layout>