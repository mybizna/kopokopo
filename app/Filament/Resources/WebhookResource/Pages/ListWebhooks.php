<?php

namespace Modules\Kopokopo\Filament\Resources\WebhookResource\Pages;

use Modules\Kopokopo\Filament\Resources\WebhookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebhooks extends ListRecords
{
    protected static string $resource = WebhookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
