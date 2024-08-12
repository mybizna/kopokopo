<?php

namespace Modules\Kopokopo\Filament\Resources\WithdrawMobileResource\Pages;

use Modules\Kopokopo\Filament\Resources\WithdrawMobileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWithdrawMobile extends EditRecord
{
    protected static string $resource = WithdrawMobileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
