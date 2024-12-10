@props([
'title',
'button_text',
'button_link'
])
<section class="text-gray-600 body-font">
    <div class="container px-6 py-24 mx-auto">
        <div class="flex flex-col items-start mx-auto lg:w-2/3 sm:flex-row sm:items-center">
            <h1 class="flex-grow text-2xl font-medium text-gray-900 sm:pr-16 title-font">{{ $title }}</h1>
            <a title="" href="{{ $button_link }}"
                class="inline-flex flex-shrink-0 px-6 py-2 mt-10 text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600 sm:mt-0">{{
                $button_text }}</a>
        </div>
    </div>
</section>