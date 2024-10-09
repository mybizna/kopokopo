<?php

namespace Modules\Kopokopo\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Kopokopo\Models\TransactionReversal;

class TransactionReversalResource extends BaseResource
{
    protected static ?string $model = TransactionReversal::class;

    protected static ?string $slug = 'kopokopo/transaction/reversal';

    protected static ?string $navigationGroup = 'Kopokopo';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('trans_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('passed_created_at')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('event_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('resource_id')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reference')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('origination_time')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sending_till')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sender_phone_number')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('till_number')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('system_str')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sender_first_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sender_middle_name')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('sender_last_name')
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
                Tables\Columns\TextColumn::make('trans_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('passed_created_at')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('resource_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('origination_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sending_till')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('till_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('system_str')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_first_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_middle_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender_last_name')
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

}
