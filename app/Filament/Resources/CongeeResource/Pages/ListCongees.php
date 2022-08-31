<?php

namespace App\Filament\Resources\CongeeResource\Pages;

use App\Filament\Resources\CongeeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCongees extends ListRecords
{
    protected static string $resource = CongeeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
