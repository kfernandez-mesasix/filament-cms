<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        rescue(fn () => $this->migrator->add('general.site_name', ''));
        rescue(fn () => $this->migrator->add('general.site_description', ''));
    }
};
