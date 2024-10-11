<?php

namespace Modules\Kopokopo\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Base\Filament\Resources\Pages;
use Modules\Kopokopo\Models\Gateway;

class GatewayResource extends BaseResource
{
    protected static ?string $model = Gateway::class;

    protected static ?string $slug = 'kopokopo/gateway';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('client_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('client_secret')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('api_key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('base_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('published')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_secret')
                    ->searchable(),
                Tables\Columns\TextColumn::make('api_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('base_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {

        Pages\ListBase::setResource(static::class);

        return [
            'index' => Pages\ListBase::route('/'),
            'create' => Pages\CreateBase::route('/create'),
            'edit' => Pages\EditBase::route('/{record}/edit'),
        ];
    }
}
