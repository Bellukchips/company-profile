<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait RemoveImageFromMarkDownEditor
{
    protected  function removeImageFromUrl($record)
    {
        $envAppUrl = env('APP_URL');

        // Regular expression to match image URLs inside ![]()
        preg_match_all('/!\[\]\((.*?)\)/', $record, $matches);

        // Extract URLs
        $imageUrls = $matches[1];

        // Filter URLs to only include those matching the APP_URL domain
        $filteredUrls = array_filter($imageUrls, function ($url) use ($envAppUrl) {
            return strpos($url, $envAppUrl) === 0; // Only include URLs starting with APP_URL
        });

        $directoryImage = [];

        // Example of deletion or further processing for matching URLs
        foreach ($filteredUrls as $url) {
            // Split the URL into an array using '/' as the delimiter
            $extractUrl = explode('/', $url);

            // Combine the parts after the domain to get the directory path
            $directoryPath = implode('/', array_slice($extractUrl, 4)); // Skipping the domain parts (first 3 parts)

            // Add the directory path to the list
            $directoryImage[] = $directoryPath;
        }

        foreach ($directoryImage as $image) {
            Storage::disk('public')->delete($image);
        }
    }

    protected function removeAndCompareOldImageFromUrlwithNewestImageFromUrl($data, $record)
    {
        $envAppUrl = env('APP_URL');

        // Regular expression to match image URLs inside ![]()
        preg_match_all('/!\[\]\((.*?)\)/', $record, $matches);

        // Extract URLs
        $recordImageUrls = $matches[1];

        // Filter URLs to only include those matching the APP_URL domain
        $filteredRecordUrls = array_filter($recordImageUrls, function ($url) use ($envAppUrl) {
            return strpos($url, $envAppUrl) === 0; // Only include URLs starting with APP_URL
        });

        // Extract new image URLs from $data (assuming $data has a similar content structure)
        preg_match_all('/!\[\]\((.*?)\)/', $data, $newMatches);
        $dataImageUrls = $newMatches[1];
        $filteredDataUrls = array_filter($dataImageUrls, function ($url) use ($envAppUrl) {
            return strpos($url, $envAppUrl) === 0;
        });

        // Collect URLs to delete
        $urlsToDelete = [];

        // Find URLs from $record that are not in $data
        foreach ($filteredRecordUrls as $url) {
            if (!in_array($url, $filteredDataUrls)) {
                $urlsToDelete[] = $url; // Add to delete list if it's not in the new data
            }
        }

        // Delete old images that are no longer referenced
        foreach ($urlsToDelete as $url) {
            // Split the URL into an array using '/' as the delimiter
            $extractUrl = explode('/', $url);

            // Combine the parts after the domain to get the directory path
            $directoryPath = implode('/', array_slice($extractUrl, 4)); // Skipping the domain parts (first 3 parts)

            // Delete the image from storage
            Storage::disk('public')->delete($directoryPath);
        }
    }


    protected function removeFileFromFolderTmp()
    {
        $tempDir = storage_path('app/livewire-tmp');

        if (is_dir($tempDir)) {
            $files = glob($tempDir . '/*');

            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }
    }

    protected function removeFileFromFolderFilamentExport()
    {
        $tempDir = storage_path('app/public/filament_exports');

        if (is_dir($tempDir)) {
            $files = glob($tempDir . '/*');

            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file); // Hapus file
                }
            }

            // Hapus folder jika sudah kosong
            rmdir($tempDir);
        }
    }
}
