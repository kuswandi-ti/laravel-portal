<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    function handleImageUpload(Request $request, string $fieldName, ?string $oldPath = null, string $dir = 'uploads'): ?String
    {
        if (!$request->hasFile($fieldName)) { // Nama control di view harus sama dengan nama field di tabel
            return null;
        }

        if ($oldPath && Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }

        $file = $request->file($fieldName);
        $extension = $file->getClientOriginalExtension();
        $updatedFileName = $dir . '_' . date('Ymdhis') . '.' . $extension;

        Storage::disk('public')->putFileAs("/images/$dir", $file, $updatedFileName);

        $filePath = "/images/$dir/$updatedFileName";

        return $filePath;
    }
}
