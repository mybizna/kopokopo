<?php

namespace Modules\Kopokopo\Filament\Resources\PayResource\Pages;

use Modules\Kopokopo\Filament\Resources\PayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPay extends EditRecord
{
    protected static string $resource = PayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
