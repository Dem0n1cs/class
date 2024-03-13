<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FileService
{
    public function storeFile(UploadedFile $file): string
    {
        return Storage::putFile('/photo', $file);
    }

    public function handleFileUpload(Request $request): ?string
    {
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            return $this->storeFile($file);
        }

        return null;
    }
}
