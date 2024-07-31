<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListingResource\Pages;
use App\Filament\Resources\ListingResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class ListingResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
{
    return $form
        ->schema([
            Components\TextInput::make('name')->autofocus()->required(),
            Components\TextInput::make('email')->email()->required(),
            Components\Select::make('type')
                ->placeholder('Select a type')
                ->options([
                    'individual' => 'Individual',
                    'organization' => 'Organization',
                ]),
            Components\DatePicker::make('birthday'),
        ])
        ->columns(2);
}

public static function table(Table $table)
{
    return $table
        ->columns([
            Columns\Text::make('id')->primary(),
            Columns\Text::make('title'),
            Columns\Boolean::make('is_active')->label('Active?'),
        ])
        ->filters([
            Filter::make('individuals', fn ($query) => $query->where('type', 'individual')),
            Filter::make('organizations', fn ($query) => $query->where('type', 'organization')),
            Filter::make('active', fn ($query) => $query->where('is_active', true)),
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
            Pages\ListListings::routeTo('/', 'index'),
            Pages\CreateListing::routeTo('/create', 'create'),
            Pages\EditListing::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
