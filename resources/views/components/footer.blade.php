<footer class="text-gray-600 body-font">
    <div class="container flex flex-col items-center px-5 py-8 mx-auto sm:flex-row">
        <a href="/" class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
            @if($settings->footer_logo)
            <img class="max-w-[180px]" src="{{ asset($settings->footer_logo) }}"
                alt="{{ $settings->site_name ?? config('app.name') }} footer logo">
            @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" class="w-10 h-10 p-2 text-white bg-indigo-500 rounded-full"
                viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">{{ $settings->site_name ?? config('app.name') }}</span>
            @endif
        </a>
        <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0">©
            {{ $settings->footer_copyright }}
        </p>
        <span class="inline-flex justify-center mt-4 sm:ml-auto sm:mt-0 sm:justify-start">
            @if($settings->facebook_link)
            <a href="{{ $settings->facebook_link }}" target="_blank" title="Facebook Link" class="text-gray-500">
                <svg fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                    class="w-5 h-5">
                    <!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                </svg>

            </a>
            @endif
            @if($settings->x_link)
            <a href="{{ $settings->x_link }}" target="_blank" title="X Link" class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    class="w-5 h-5">
                    <path
                        d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                </svg>
            </a>
            @endif
            @if($settings->instagram_link)
            <a href="{{ $settings->instagram_link }}" target="_blank" title="Instagram Link" class="ml-3 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-5 h-5" viewBox="0 0 24 24">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
            </a>
            @endif
            @if($settings->linkedin_link)
            <a href="{{ $settings->linkedin_link }}" target="_blank" title="Linkedin Link" class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                    <path stroke="none"
                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                    </path>
                    <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
            </a>
            @endif
            @if ($settings->tiktok_link)
            <a href="{{ $settings->tiktok_link }}" target="_blank" title="Tiktok Link" class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" viewBox="0 0 448 512" class="w-5 h-5">
                    <path
                        d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                </svg>
            </a>

            @endif
        </span>
    </div>
</footer>
@filamentScripts
@vite('resources/js/app.js')

@if(!empty($settings->footer_script))
{!! $settings->footer_script !!}
@endif

</body>

</html>