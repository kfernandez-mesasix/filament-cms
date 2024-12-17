<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use App\Notifications\UserInvitationNotification;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        $user = $this->record;
        $token = app('auth.password.broker')->createToken($user);
        $notification = new \Filament\Notifications\Auth\ResetPassword($token);
        $notification->url = \Filament\Facades\Filament::getResetPasswordUrl($token, $user);
        $user->notify(new UserInvitationNotification($notification->url));
    }
}
