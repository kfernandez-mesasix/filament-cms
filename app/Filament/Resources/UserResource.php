<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Password;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Resources\UserResource\Pages;
use App\Notifications\UserInvitationNotification;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Name')
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email(),

                TextInput::make('password')
                ->label('Password')
                ->password()
                ->hidden(),

                Select::make('roles')
                    ->label('Roles')
                    ->multiple()
                    ->preload()
                    ->relationship('roles', 'name')
                    ->options(Role::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('roles.name')->label('Roles'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        // Create the user instance
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        // Assign roles
        if (isset($data['roles'])) {
            $user->assignRole($data['roles']);
        }

        // Generate a password reset token
        $token = Password::createToken($user);

        // Generate the password reset URL
        $setPasswordUrl = url(route('filament.admin.auth.password-reset.request', [
            'token' => $token,
            'email' => $user->email,
        ]));

        // Notify the user
        $user->notify(new UserInvitationNotification($setPasswordUrl));

        return $data;
    }
}
