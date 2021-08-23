@props(['id' => null, 'maxWidth' => null, 'action' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    @if($action != null)
        <form wire:submit.prevent="{{ $action }}">
    @endif
        <div class="px-6 py-4">
            <div class="text-lg">
                {{ $title }}
            </div>

            <div class="mt-4">
                {{ $content }}
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            {{ $footer }}
        </div>
    @if($action != null)
        </form>
    @endif
</x-jet-modal>
