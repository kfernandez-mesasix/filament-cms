@props(['page'])

<x-header :title="$page->title" :seo="$page->seo">
</x-header>
<x-filament-fabricator::page-blocks :blocks="$page->blocks" />
<x-footer></x-footer>
