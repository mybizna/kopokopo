<?php

namespace Modules\Kopokopo\Filament\Resources\StkpushResource\Pages;

use Modules\Kopokopo\Filament\Resources\StkpushResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStkpush extends EditRecord
{
    protected static string $resource = StkpushResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
