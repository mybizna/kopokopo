<?php

namespace Modules\Kopokopo\Filament\Resources\PayResource\Pages;

use Modules\Kopokopo\Filament\Resources\PayResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPays extends ListRecords
{
    protected static string $resource = PayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
