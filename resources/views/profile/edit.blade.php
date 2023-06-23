 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight ">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-950">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 profile-container">
            <div class="p-4 sm:p-8 bg-gray-900 border-2 border-indigo-500 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 border-2 border-indigo-500 bg-gray-900 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

