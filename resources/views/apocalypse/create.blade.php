<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Apocalypse') }}
        </h2>
    </x-slot>

    <form class="py-12" method="POST" action="{{ route('apocalypse.store') }}">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-4 grid grid-cols-1">
                        <x-input name="name" heading="{{ __('Name') }}" value="" :disabled="false" :help="false" />
                        <x-input name="stats" heading="{{ __('Stats') }}" help="{{ __('Use a comma-seperated list for each stat name') }}" value="" :disabled="false" />
                        <div class="grid grid-cols-4 gap-3">
                            <x-input name="luck" heading="{{ __('Luck') }}" value="" :disabled="false" :help="false" />
                            <x-input name="harm" heading="{{ __('Harm') }}" value="" :disabled="false" :help="false" />
                            <x-input name="unstable" heading="{{ __('Unstable') }}" value="" :disabled="false" :help="false" />
                            <x-input name="experience" heading="{{ __('Experience') }}" value="" :disabled="false" :help="false" />
                        </div>
                    </div>
                    <button type="submit" class="rounded-full py-3 px-6 mt-6 bg-green-600 col-span-4 text-green-50 flex items-center justify-center hover:bg-green-500 hover:text-green-900">{{ __('Create Apocalypse') }}</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>