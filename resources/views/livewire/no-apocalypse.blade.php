<div class="grid grid-cols-1 col-span-3 gap-4">
    <h2 class="text-3xl text-gray-700 col-auto">{{ __('There are no Apocalypses.') }}</h2>
    <a href="{{ route('apocalypse.create') }}" class="w-full flex items-center justify-center px-8 py-3 mb-0 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 col-auto">{{ __('Create an Apocalypse') }}</a>
    <a href="http://apocalypse-world.com" target="_new" class="text-sm text-gray-400 italic text-center hover:text-green-500">{{ _('Visit Apocalypse World to learn more.') }}</a>
</div>

<x-jet-dialog-modal wire:model="creatingApocalypse" action="createApocalypse">
    <x-slot name="title">
        {{ __('Create an Apocalypse') }}
    </x-slot>
    <x-slot name="content">
        {{ $errors }}
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="col-span-4">            
                <x-jet-label for="stats" value="{{ __('Stats') }}" />
                <x-jet-input id="stats" type="text" class="mt-1 block w-full" wire:model.defer="stats" autocomplete="stats" />
                <small class="p-l3 text-gray-500 italic">{{ __('Use a comma-seperated list for each stat name') }}</small>
                <x-jet-input-error for="stats" class="mt-2" />
            </div>
            <div class="col-span-1">            
                <x-jet-label for="luck" value="{{ __('Luck') }}" />
                <x-jet-input id="luck" type="text" class="mt-1 block w-full" wire:model.defer="luck" autocomplete="luck" />
                <x-jet-input-error for="luck" class="mt-2" />
            </div>
            <div class="col-span-1">            
                <x-jet-label for="harm" value="{{ __('Harm') }}" />
                <x-jet-input id="harm" type="text" class="mt-1 block w-full" wire:model.defer="harm" autocomplete="harm" />
                <x-jet-input-error for="harm" class="mt-2" />
            </div>
            <div class="col-span-1">            
                <x-jet-label for="unstable" value="{{ __('Unstable') }}" />
                <x-jet-input id="unstable" type="text" class="mt-1 block w-full" wire:model.defer="unstable" autocomplete="unstable" />
                <x-jet-input-error for="unstable" class="mt-2" />
            </div>
            <div class="col-span-1">            
                <x-jet-label for="experience" value="{{ __('Experience') }}" />
                <x-jet-input id="experience" type="text" class="mt-1 block w-full" wire:model.defer="experience" autocomplete="experience" />
                <x-jet-input-error for="experience" class="mt-2" />
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('creatingApocalypse')" wire:loading.attr="disabled">
            {{ __('Nevermind') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:loading.attr="disabled">
            {{ __('Create Apocalypse') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
