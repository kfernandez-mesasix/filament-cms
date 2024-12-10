<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // General settings
        rescue(fn () => $this->migrator->add('general.site_name', ''));
        rescue(fn () => $this->migrator->add('general.site_description', ''));
        rescue(fn () => $this->migrator->add('general.site_admin_email', ''));
        rescue(fn () => $this->migrator->add('general.site_favicon', ''));

        // Social media links
        rescue(fn () => $this->migrator->add('general.facebook_link', ''));
        rescue(fn () => $this->migrator->add('general.x_link', ''));
        rescue(fn () => $this->migrator->add('general.instagram_link', ''));
        rescue(fn () => $this->migrator->add('general.linkedin_link', ''));
        rescue(fn () => $this->migrator->add('general.tiktok_link', ''));

        // Header settings
        rescue(fn () => $this->migrator->add('general.header_logo', ''));
        rescue(fn () => $this->migrator->add('general.header_menu', []));
        rescue(fn () => $this->migrator->add('general.header_button_label', ''));
        rescue(fn () => $this->migrator->add('general.header_button_url', ''));

        // Footer settings
        rescue(fn () => $this->migrator->add('general.footer_logo', ''));
        rescue(fn () => $this->migrator->add('general.footer_menu', []));
        rescue(fn () => $this->migrator->add('general.footer_copyright', ''));

        // Scripts
        rescue(fn () => $this->migrator->add('general.header_script', ''));
        rescue(fn () => $this->migrator->add('general.footer_script', ''));
        rescue(fn () => $this->migrator->add('general.after_head_script', ''));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // General settings
        rescue(fn () => $this->migrator->delete('general.site_name', ''));
        rescue(fn () => $this->migrator->delete('general.site_description', ''));
        rescue(fn () => $this->migrator->delete('general.site_admin_email', ''));
        rescue(fn () => $this->migrator->delete('general.site_favicon', ''));

        // Social media links
        rescue(fn () => $this->migrator->delete('general.facebook_link', ''));
        rescue(fn () => $this->migrator->delete('general.x_link', ''));
        rescue(fn () => $this->migrator->delete('general.instagram_link', ''));
        rescue(fn () => $this->migrator->delete('general.linkedin_link', ''));
        rescue(fn () => $this->migrator->delete('general.tiktok_link', ''));

        // Header settings
        rescue(fn () => $this->migrator->delete('general.header_logo', ''));
        rescue(fn () => $this->migrator->delete('general.header_menu', []));
        rescue(fn () => $this->migrator->delete('general.header_button_label', ''));
        rescue(fn () => $this->migrator->delete('general.header_button_url', ''));

        // Footer settings
        rescue(fn () => $this->migrator->delete('general.footer_logo', ''));
        rescue(fn () => $this->migrator->delete('general.footer_menu', []));
        rescue(fn () => $this->migrator->delete('general.footer_copyright', ''));

        // Scripts
        rescue(fn () => $this->migrator->delete('general.header_script', ''));
        rescue(fn () => $this->migrator->delete('general.footer_script', ''));
        rescue(fn () => $this->migrator->delete('general.after_head_script', ''));
    }
};
