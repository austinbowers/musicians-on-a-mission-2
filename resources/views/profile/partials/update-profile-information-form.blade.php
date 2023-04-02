<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div class="flex flex-col md:flex-row items-center gap-6">
            @if(isset($user->image_path))
            <div style="background-image: url('{{ asset('/images/' . $user->image_path) }}');" class="h-40 w-40 rounded-full bg-cover bg-no-repeat bg-center"></div>
            @else
            <div class="h-40 w-40 rounded-full bg-gray-200"></div>
            @endif
            <label class="font-medium inline-flex text-sm md:text-base text-red-500 pb-1 cursor-pointer hover:text-red-600" for="image">
                <svg class="w-4 mr-2 fill-current" viewBox="0 0 182 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M57.4176 3.5124C59.1147 1.81475 61.4167 0.860742 63.8172 0.860229H118.128C120.528 0.860742 122.83 1.81475 124.528 3.5124L139.979 18.9638H163.387C168.188 18.9638 172.793 20.8711 176.188 24.2662C179.583 27.6613 181.49 32.266 181.49 37.0674V127.585C181.49 132.387 179.583 136.991 176.188 140.386C172.793 143.781 168.188 145.689 163.387 145.689H18.5583C13.7569 145.689 9.1522 143.781 5.75712 140.386C2.36205 136.991 0.454712 132.387 0.454712 127.585V37.0674C0.454712 32.266 2.36205 27.6613 5.75712 24.2662C9.1522 20.8711 13.7569 18.9638 18.5583 18.9638H41.9662L57.4176 3.5124ZM67.5646 18.9638L52.1132 34.4152C50.4161 36.1128 48.1141 37.0669 45.7136 37.0674H18.5583V127.585H163.387V37.0674H136.231C133.831 37.0669 131.529 36.1128 129.832 34.4152L114.38 18.9638H67.5646ZM90.9726 59.6968C86.1712 59.6968 81.5665 61.6042 78.1714 64.9992C74.7763 68.3943 72.869 72.999 72.869 77.8004C72.869 82.6018 74.7763 87.2065 78.1714 90.6016C81.5665 93.9966 86.1712 95.904 90.9726 95.904C95.7739 95.904 100.379 93.9966 103.774 90.6016C107.169 87.2065 109.076 82.6018 109.076 77.8004C109.076 72.999 107.169 68.3943 103.774 64.9992C100.379 61.6042 95.7739 59.6968 90.9726 59.6968ZM54.7654 77.8004C54.7654 68.1977 58.5801 58.9882 65.3702 52.1981C72.1604 45.4079 81.3698 41.5933 90.9726 41.5933C100.575 41.5933 109.785 45.4079 116.575 52.1981C123.365 58.9882 127.18 68.1977 127.18 77.8004C127.18 87.4031 123.365 96.6126 116.575 103.403C109.785 110.193 100.575 114.008 90.9726 114.008C81.3698 114.008 72.1604 110.193 65.3702 103.403C58.5801 96.6126 54.7654 87.4031 54.7654 77.8004Z"/>
                </svg>
                Change Profile Picture
            </label>
            <input
             class="appearance-none cursor-pointer rounded-md bg-gray-100 hover:bg-gray-200 p-5" type="file"
            id="image" name="image" hidden>
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="genre" :value="__('Genre')" />
            <x-text-input placeholder="ex. Pop, Folk, Americana" id="genre" name="genre" type="text" class="mt-1 block w-full" :value="old('genre', $user->genre)" autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('genre')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" rows="10" class="mt-1 block w-full rounded-md border-gray-300">{{ $user->bio }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 py-2 px-5 rounded bg-green-100 z-50"
                    >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>