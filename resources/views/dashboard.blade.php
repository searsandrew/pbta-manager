<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5 grid grid-cols-3 gap-4">
                @if(\App\Models\Apocalypse::count() == 0)
                    <livewire:no-apocalypse />
                @else
                    {{ \App\Models\Apocalypse::count() }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
