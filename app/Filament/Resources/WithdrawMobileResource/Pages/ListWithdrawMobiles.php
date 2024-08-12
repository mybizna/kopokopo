<?php

namespace Modules\Kopokopo\Filament\Resources\WithdrawMobileResource\Pages;

use Modules\Kopokopo\Filament\Resources\WithdrawMobileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWithdrawMobiles extends ListRecords
{
    protected static string $resource = WithdrawMobileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
