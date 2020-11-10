<?php


namespace App\Helpers;


use App\Utilits\FilesUtils;
use Exception;
use Illuminate\Http\UploadedFile;

class ImageUploaderHelper
{
    private const STORAGE = 'public';

    /**
     * @param UploadedFile $file Фотография
     * @return mixed|string Индекс фотографии с форматом
     * @throws Exception
     */
    public static function upload(UploadedFile $file)
    {
        $upload = FilesUtils::uploadFile($file, self::getAvatarPath(), self::STORAGE);

        if ($upload === false) {
            throw new Exception('Upload error');
        }

        return explode('/', $upload)[1];
    }

    private static function getAvatarPath(): string
    {
        return config('common.files.avatar_path');
    }

    /**
     * @param string $img_index Индекс фотографии
     * @return bool
     */
    public static function delete(string $img_index): bool
    {
        $path = self::getAvatarPath() . '/' . $img_index;
        return FilesUtils::deleteFile($path, self::STORAGE);
    }

    /**
     * @param string|null $img_index Индекс фотографии
     * @return string|null Ссылка на фотографию
     */
    public static function getURL(?string $img_index): ?string
    {
        if ($img_index === null) {
            return null;
        }

        return config('app.url') .
            config('common.files.upload_path') .
            config('common.files.avatar_path') .
            '/' .
            $img_index;
    }
}
