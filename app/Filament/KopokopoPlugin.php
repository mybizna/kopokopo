<?php

namespace Modules\Kopokopo\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class KopokopoPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Kopokopo';
    }

    public function getId(): string
    {
        return 'kopokopo';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
