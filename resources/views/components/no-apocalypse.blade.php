<div class="grid grid-cols-3 gap-4">
    <h2 class="text-xl text-gray-700">{{ __('There are no Apocalypses.') }}</h2>
    <div x-data="{ open: false }">
        <button @click="open = true">{{ __('Create an Apocalypse') }}</button>
    </div>
    <a href="http://apocalypse-world.com" target="_new">{{ _('Visit Apocalypse World to learn more.') }}</a>
</div>

<x-jet-dialog-modal wire:model="confirmingUserDeletion">
    <x-slot name="title">
        Delete Account
    </x-slot>
    <x-slot name="content">
        Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted.
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
            Nevermind
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
            Delete Account
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>