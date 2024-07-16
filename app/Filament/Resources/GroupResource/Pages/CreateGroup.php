<?php

namespace App\Filament\Resources\GroupResource\Pages;

use App\Filament\Resources\GroupResource;
use App\Models\Group;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateGroup extends CreateRecord
{
    protected static string $resource = GroupResource::class;

    protected function afterCreate(): void
    {
        /** @var Group $group */
        $group = $this->record;

        /** @var User $user */
        $user = auth()->user();

        Notification::make()
            ->title('New Group')
            ->icon('heroicon-o-shopping-bag')
            ->body("**{$group->title} is created successfully.**")
            ->actions([
                Action::make('View')
                    ->url(GroupResource::getUrl('edit', ['record' => $group])),
            ])
            ->sendToDatabase($user);
    }
}
