<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Http\UploadedFile;

final class StoreAvatarAction
{
    /**
     * Сохранение аватара пользователя.
     *
     * @param  UploadedFile  $file Файл, который нужно сохранить.
     * @return string Строка с путем до файла.
     *
     * @throws \Exception
     */
    public function __invoke(UploadedFile $file): string
    {
        return $file->store('avatars', 'public');
    }
}
