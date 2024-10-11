<?php

namespace Modules\Kopokopo\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Base\Filament\Resources\Pages;
use Modules\Kopokopo\Models\Withdraw;

class WithdrawResource extends BaseResource
{
    protected static ?string $model = Withdraw::class;

    protected static ?string $slug = 'kopokopo/withdraw';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('callback')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('destination_type')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('origination_time')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('destination_reference')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('transaction_reference')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('faking')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('published')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('callback')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destination_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('origination_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destination_reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('transaction_reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->searchable(),
                Tables\Columns\TextColumn::make('faking')
                    ->numeric()
                    ->sortable(),
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
