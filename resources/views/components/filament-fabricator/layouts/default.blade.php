@props(['page'])

<x-header :title="$page->title" :seo-title="$page->seo_title ?? $page->title" :seo-description="$page->seo_description"
    :seo-author-name="$page->seo_author_name" :seo-meta-tag-robots="$page->seo_meta_tag_robots">
</x-header>
<x-filament-fabricator::page-blocks :blocks="$page->blocks" />
<x-footer></x-footer>
