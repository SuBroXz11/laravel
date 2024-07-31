<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class UserResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
{
    
}

public static function table(Table $table)
{
    return $table
        ->columns([
            Columns\Text::make('id')->primary(),
            Columns\Text::make('name'),
            Columns\Text::make('email')->url(fn ($customer) => "mailto:{$customer->email}"),
            Columns\Text::make('created_at'),
        ]);
}

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListUsers::routeTo('/', 'index'),
            Pages\CreateUser::routeTo('/create', 'create'),
            Pages\EditUser::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
