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
                    <h1 class="text-3xl text-gray-800 col-span-3">Play an Apocalypse</h1>
                    <p class="text-sm text-gray-500 italic col-span-3">There are {{ \App\Models\Apocalypse::count() }} Apocalypse's available for play. Once you create a campaign, have your friends register an account in the app and send an invite code.</p>
                    <div class="col-span-3 grid grid-cols-2 md:grid-cols-6 gap-4">
                        @foreach(\App\Models\Apocalypse::all() as $apocalypse)
                            <div>
                                <a class="rounded-md border border-gray-300">
                                    {{ $apocalypse->name }}
                                </a>
                                <form method="POST" action="{{ route('campaign.store', $apocalypse) }}">
                                    @csrf
                                    <button type="submit" class="rounded-full py-1 px-2 mt-6 border-2 border-green-600 text-green-600 items-center justify-center hover:outline-none hover:ring-4 hover:ring-green-500 hover:ring-opacity-50 hover:bg-green-100 hover:border-transparent">Create Campaign</button>
                                </form>
                            </div>
                        @endforeach
                        <div>
                            <a href="{{ route('apocalypse.create') }}" class="rounded-md border border-dashed border-gray-300 h-full">
                                Create an Apocalypse
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>