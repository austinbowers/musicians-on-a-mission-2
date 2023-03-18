<x-main-layout>
            <div class="relative px-6 lg:px-8 py-16">
                <div class="mx-auto max-w-3xl">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl border-b pb-5 mb-5">Members
            </h1>
                    <div class="columns-3 space-y-3">
                        
                        @foreach ($users as $user)
                            <a class="block text-red-500 hover:text-red-900 transition duration-200" href="/members/{{ $user->id }}">
                                {{ $user->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
</x-main-layout>