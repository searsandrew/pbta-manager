<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a Class') }}
        </h2>
    </x-slot>

    <form class="py-12" method="POST" action="{{ route('class.store', $apocalypse) }}">
        @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-4 grid grid-cols-1">
                        <x-input name="name" heading="{{ __('Name') }}" />
                        <x-input name="flavor" heading="{{ __('Flavor Text') }}" />
                        <x-input name="image" heading="{{ __('Image') }}" help="{{ __('For now, use an external URL') }}" />
                        <div class="grid grid-cols-2 gap-3">
                            <p class="col-span-2 text-gray-800">{{ __('Class Options') }}<br/>
                            <small class="italic">{{ __('Use JSON, see documentation for formatting.') }}</small></p>
                            <x-select name="type" heading="{{ __('Class Type') }}" datasource='{"pc":"PC","npc":"NPC","any":"Any"}' />
                            <x-input name="rules" heading="{{ __('Class Rules') }}" />
                            <x-input name="attacks" heading="{{ __('Class Attacks') }}" />
                            <x-input name="gear" heading="{{ __('Class Gear') }}" />
                            <x-input name="moves" heading="{{ __('Class Moves') }}" />
                            <x-input name="ratings" heading="{{ __('Class Ratings') }}" />
                            <x-input name="special" heading="{{ __('Class Special Actions') }}" />
                            <x-input name="luck" heading="{{ __('Class Luck Special') }}" />
                            <x-input name="history" heading="{{ __('Class History') }}" />
                            <x-input name="looks" heading="{{ __('Class Looks') }}" />
                            <x-input name="inprovements" heading="{{ __('Class Improvements') }}" />
                        </div>
                    </div>
                    <button type="submit" class="rounded-full py-3 px-6 mt-6 bg-green-600 col-span-4 text-green-50 flex items-center justify-center hover:bg-green-500 hover:text-green-900">{{ __('Create Apocalypse') }}</button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>