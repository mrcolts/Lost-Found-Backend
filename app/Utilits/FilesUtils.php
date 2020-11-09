<?php


namespace App\Utilits;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class FilesUtils
{
    /**
     * Отдает содержимое файла
     * @param string $file_name Название файла
     * @param string $storage Место хранения
     * @return string|null Файл
     * @throws FileNotFoundException
     */
    public static function getFile(string $file_name, string $storage = 'local'): ?string
    {
        if (!Storage::disk($storage)->exists($file_name)) {
            return null;
        }

        return Storage::disk($storage)->get($file_name);
    }

    /**
     * Путь к файлу
     * @param string $file_name Название файла
     * @param string $storage Место хранения
     * @return string|null Путь
     */
    public static function getFilePath(string $file_name, string $storage = 'local'): ?string
    {
        if (!Storage::disk($storage)->exists($file_name)) {
            return null;
        }

        return Storage::disk($storage)->path($file_name);
    }

    public static function fileIsExist(string $path, $storage = 'local')
    {
        return Storage::disk($storage)->exists($path);
    }

    public static function uploadFile($file, string $path, string $storage = 'local')
    {
        return Storage::disk($storage)->put($path, $file);
    }

    public static function deleteFile(string $path, string $storage = 'local')
    {
        return Storage::disk($storage)->delete($path);
    }
}
