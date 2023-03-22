<x-main-layout>
            <div class="relative px-6 lg:px-8">
                <div class="mx-auto max-w-3xl">
                    <div class="columns-1 space-y-3 py-16">
                         <div class="flex group items-center gap-x-4">
                            <div class="h-16 w-16 rounded-full bg-gray-200"></div>
                                 <div>
                                    <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">{{ $user->name }}</h3>
                                    <p class="text-sm font-semibold leading-6 text-red-500">Folk / Pop</p>
                                </div>
                                
                            </div>
                            <div>
                                    <svg class="fill-current text-red-500 w-8 h-8" xmlns="http://www.w3.org/2000/svg" height="800" width="1200" viewBox="-204.79995 -341.33325 1774.9329 2047.9995"><path d="M1365.333 682.667C1365.333 305.64 1059.693 0 682.667 0 305.64 0 0 305.64 0 682.667c0 340.738 249.641 623.16 576 674.373V880H402.667V682.667H576v-150.4c0-171.094 101.917-265.6 257.853-265.6 74.69 0 152.814 13.333 152.814 13.333v168h-86.083c-84.804 0-111.25 52.623-111.25 106.61v128.057h189.333L948.4 880H789.333v477.04c326.359-51.213 576-333.635 576-674.373"/><path d="M948.4 880l30.267-197.333H789.333V554.609C789.333 500.623 815.78 448 900.584 448h86.083V280s-78.124-13.333-152.814-13.333c-155.936 0-257.853 94.506-257.853 265.6v150.4H402.667V880H576v477.04a687.805 687.805 0 00106.667 8.293c36.288 0 71.91-2.84 106.666-8.293V880H948.4" fill="#FFF"/></svg>
                                </div>
                            <h4 class="font-bold">Bio</h4>
                            <p>
                                {{ $user->bio }}
                            </p>
                            
                            <p>
                                {{ $user->website }}
                            </p>
                            <p>
                                {{ $user->instagram }}
                            </p>
                            <p>
                                {{ $user->facebook }}
                            </p>
                    </div>
                </div>
            </div>
</x-main-layout>