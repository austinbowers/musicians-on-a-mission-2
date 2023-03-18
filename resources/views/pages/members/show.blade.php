<x-main-layout>
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <div class="columns-1 space-y-3">
                        <div>
                            {{ $user->name }}
                        </div>
                        <div>
                            {{ $user->bio }}
                        </div>
                    </div>
                </div>
            </div>
</x-main-layout>