@props(['page'])
<x-filament-fabricator::layouts.base :title="$page->title">
    @include('components.header')

    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    @include('components.footer')

</x-filament-fabricator::layouts.base>
