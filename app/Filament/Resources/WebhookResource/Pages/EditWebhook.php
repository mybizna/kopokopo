<?php

namespace Modules\Kopokopo\Filament\Resources\WebhookResource\Pages;

use Modules\Kopokopo\Filament\Resources\WebhookResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebhook extends EditRecord
{
    protected static string $resource = WebhookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}