<?php

namespace Modules\Kopokopo\Filament\Resources\WithdrawBankResource\Pages;

use Modules\Kopokopo\Filament\Resources\WithdrawBankResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWithdrawBanks extends ListRecords
{
    protected static string $resource = WithdrawBankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
