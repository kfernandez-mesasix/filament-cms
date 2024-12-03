<x-filament-panels::page>
    <h2>Site Settings</h2>

    <div class="space-y-4">
        <form wire:submit.prevent="save">
            @csrf
            <x-filament::card>
                <x-filament::form :schema="$form->getSchema()" />
            </x-filament::card>

            <x-filament::button type="submit" color="primary">Save Settings</x-filament::button>
        </form>
    </div>
</x-filament-panels::page>
