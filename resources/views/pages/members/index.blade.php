<x-main-layout>
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <div class="columns-1 space-y-3">
                        @foreach ($users as $user)
                            <a class="block text-red-500 hover:text-red-900 transition duration-200" href="/members/{{ $user->id }}">
                                {{ $user->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
</x-main-layout>