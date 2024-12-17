@props([
'title',
'seo' => [],
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $seo->title ?? ($settings->site_name ?? config('app.name')) }}</title>

    <meta name="description" content="{{ $seo->description ?? $settings->site_description }}" />
    <meta name="author" content="{{ $seo->author }}">
    <meta name="robots" content="{{ $seo->robots ?? 'index, follow' }}">
    <link rel="icon" type="image/x-icon" href="{{ asset($settings->site_favicon) }}">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>


    @if(!empty($settings->header_script))
    {!! $settings->header_script !!}
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    @if(!empty($settings->after_head_script))
    {!! $settings->after_head_script !!}
    @endif
    <header class="text-gray-600 body-font">
        <div class="container flex flex-col flex-wrap items-center p-5 mx-auto md:flex-row">
            <a href="/" class="flex items-center mb-4 font-medium text-gray-900 title-font md:mb-0">
                @if($settings->header_logo)
                <img class="max-w-[180px]" src="{{ asset($settings->header_logo) }}"
                    alt="{{ $settings->site_name ?? config('app.name') }} logo">
                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 p-2 text-white bg-indigo-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">{{ $settings->site_name ?? config('app.name') }}</span>
                @endif
            </a>
            @php
            $header_menu = is_string($settings->header_menu)
            ? json_decode($settings->header_menu, true)
            : $settings->header_menu;
            @endphp

            @if($header_menu && is_array($header_menu))
            <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto">
                @foreach($header_menu as $menu)
                <a href="{{ $menu['url'] }}" class="mr-5 hover:text-gray-900">{{ $menu['label'] }}</a>
                @endforeach
            </nav>
            @endif

            @if($settings->header_button_url && $settings->header_button_label)
            <a href="{{ $settings->header_button_url }}"
                class="inline-flex items-center px-3 py-1 mt-4 text-base bg-gray-100 border-0 rounded focus:outline-none hover:bg-gray-200 md:mt-0">{{
                $settings->header_button_label }}
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
            @endif
        </div>
    </header>
