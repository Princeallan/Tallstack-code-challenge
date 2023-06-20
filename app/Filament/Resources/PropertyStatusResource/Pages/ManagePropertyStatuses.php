<?php

namespace App\Filament\Resources\PropertyStatusResource\Pages;

use App\Filament\Resources\PropertyStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePropertyStatuses extends ManageRecords
{
    protected static string $resource = PropertyStatusResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->mutateFormDataUsing(function (array $data): array {
                $data['user_id'] = auth()->id();

                return $data;
            }),
        ];
    }
}
