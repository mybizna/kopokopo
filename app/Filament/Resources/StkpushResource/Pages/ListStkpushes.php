<?php

namespace Modules\Kopokopo\Filament\Resources\StkpushResource\Pages;

use Modules\Kopokopo\Filament\Resources\StkpushResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStkpushes extends ListRecords
{
    protected static string $resource = StkpushResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
