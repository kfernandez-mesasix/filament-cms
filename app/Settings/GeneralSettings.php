<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $site_description;
    public string $site_admin_email;
    public ?string $site_favicon;

    public ?string $facebook_link;
    public ?string $x_link;
    public ?string $instagram_link;
    public ?string $linkedin_link;
    public ?string $tiktok_link;

    public ?string $header_logo;
    public ?array $header_menu;

    public ?string $footer_logo;
    public ?array $footer_menu;
    public ?string $footer_copyright;

    public ?string $header_script;
    public ?string $footer_script;
    public ?string $after_head_script;

    public static function group(): string
    {
        return 'general';
    }
}
