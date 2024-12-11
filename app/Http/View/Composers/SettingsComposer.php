<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Settings\GeneralSettings;

class SettingsComposer
{
    protected $settings;

    // Inject the GeneralSettings class via the constructor
    public function __construct(GeneralSettings $settings)
    {
        $this->settings = $settings;
    }

    public function compose(View $view)
    {
        // Share the settings with the view
        $view->with('settings', $this->settings);
    }
}
