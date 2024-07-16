<?php

namespace App\Observers;

use App\Filament\Resources\TaskResource;
use App\Models\Task;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class TaskObserver
{
    public function created(Task $task): void
    {
        Notification::make()->title('New task')->icon('heroicon-o-adjustments-horizontal')
            ->body("**{$task->title} is assigned to {$task->student->name} successfully.**")
            ->actions([
                Action::make('View Task')->url(TaskResource::getUrl('edit', ['record' => $task])),
            ])->sendToDatabase($task->student);
    }
}
