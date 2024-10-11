<?php

namespace Modules\Kopokopo\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Base\Filament\Resources\Pages;
use Modules\Kopokopo\Models\Stkpush;

class StkpushResource extends BaseResource
{
    protected static ?string $model = Stkpush::class;

    protected static ?string $slug = 'kopokopo/stkpush';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('payment_channel')
                    ->required()
                    ->maxLength(255)
                    ->default('M-PESA STK Push'),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('module')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('item_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('till_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('first_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('callback')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('customer_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('reference')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('notes')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('link_self')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('link_resource')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('result')
                    ->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('payment_channel')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('module')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('item_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('till_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('callback')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('notes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_self')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link_resource')
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
