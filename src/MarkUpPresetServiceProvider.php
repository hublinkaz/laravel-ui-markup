<?php

namespace Hublinkaz\MarkUpPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;

class MarkUpPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        UiCommand::macro('markup', function (UiCommand $command) {
            $markUpPreset = new MarkUpPreset($command);
            $markUpPreset->install();

            $command->info('MarkUp scaffolding installed successfully.');

            if ($command->option('auth')) {
                $markUpPreset->installAuth();
                $command->info('MarkUp CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
