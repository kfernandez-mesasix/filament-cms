<?php

namespace App\Providers;

use App\Policies\PagePolicy;
use App\Policies\RolePolicy;
use App\Policies\MediaPolicy;
use App\Policies\ActivityPolicy;
use RalphJSmit\Filament\SEO\SEO;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\SettingsComposer;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', SettingsComposer::class);
        FilamentFabricator::registerSchemaSlot('sidebar.after', [
            Section::make('Meta')
            ->schema([
                SEO::make(),
            ])
        ]);

        Gate::policy(\Z3d0X\FilamentFabricator\Models\Page::class, PagePolicy::class);
        Gate::policy(\Awcodes\Curator\Models\Media::class, MediaPolicy::class);
        Gate::policy(\Spatie\Permission\Models\Role::class, RolePolicy::class);
        Gate::policy(\Spatie\Activitylog\Models\Activity::class, ActivityPolicy::class);

        Model::unguard();
    }
}
