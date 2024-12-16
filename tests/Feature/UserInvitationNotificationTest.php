<?php

use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserInvitationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;

it('sends a user invitation notification', function () {
    Notification::fake();

    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'testuser@example.com',
    ]);

    $setPasswordUrl = 'https://example.com/password/reset?token=sampletoken';

    $user->notify(new UserInvitationNotification($setPasswordUrl));

    Notification::assertSentTo(
        $user,
        UserInvitationNotification::class,
        function ($notification, $channels) use ($user, $setPasswordUrl) {
            $mailMessage = $notification->toMail($user);

            return $mailMessage->actionUrl === $setPasswordUrl
                && $mailMessage->greeting === 'Hello ' . $user->name . ','
                && in_array('mail', $channels);
        }
    );
})->uses(RefreshDatabase::class);

