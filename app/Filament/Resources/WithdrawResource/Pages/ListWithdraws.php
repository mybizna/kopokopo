<?php

namespace Modules\Kopokopo\Filament\Resources\WithdrawResource\Pages;

use Modules\Kopokopo\Filament\Resources\WithdrawResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWithdraws extends ListRecords
{
    protected static string $resource = WithdrawResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
