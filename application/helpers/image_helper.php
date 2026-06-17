<?php

/**
 * Compress and convert an uploaded image to WebP format.
 *
 * After CI's upload library saves the original file, call this function
 * to replace it with a compressed WebP version. The original file is
 * deleted and a new .webp file (with the same base name) is written.
 *
 * @param  string $file_path   Absolute/relative path to the uploaded file.
 * @param  int    $quality     WebP quality 0-100 (default 80).
 * @param  int    $max_width   Max width in px; 0 = no resize (default 1920).
 * @param  int    $max_height  Max height in px; 0 = no resize (default 1080).
 * @return string|false        New filename (with .webp extension) or false on failure.
 */
function compressToWebp(string $file_path, int $quality = 80, int $max_width = 1920, int $max_height = 1080)
{
    if (!file_exists($file_path)) {
        return false;
    }

    $mime = mime_content_type($file_path);

    switch ($mime) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($file_path);
            break;
        case 'image/png':
            $src = imagecreatefrompng($file_path);
            break;
        case 'image/webp':
            $src = imagecreatefromwebp($file_path);
            break;
        default:
            return false;
    }

    if (!$src) {
        return false;
    }

    // Resize if needed while keeping aspect ratio
    $orig_w = imagesx($src);
    $orig_h = imagesy($src);

    $new_w = $orig_w;
    $new_h = $orig_h;

    if ($max_width > 0 && $orig_w > $max_width) {
        $new_w = $max_width;
        $new_h = (int) round($orig_h * ($max_width / $orig_w));
    }

    if ($max_height > 0 && $new_h > $max_height) {
        $new_w = (int) round($new_w * ($max_height / $new_h));
        $new_h = $max_height;
    }

    if ($new_w !== $orig_w || $new_h !== $orig_h) {
        $resampled = imagecreatetruecolor($new_w, $new_h);

        // Preserve transparency for PNG/WebP
        imagealphablending($resampled, false);
        imagesavealpha($resampled, true);
        $transparent = imagecolorallocatealpha($resampled, 0, 0, 0, 127);
        imagefill($resampled, 0, 0, $transparent);

        imagecopyresampled($resampled, $src, 0, 0, 0, 0, $new_w, $new_h, $orig_w, $orig_h);
        imagedestroy($src);
        $src = $resampled;
    }

    // Build new file path with .webp extension
    $dir      = dirname($file_path);
    $basename = pathinfo($file_path, PATHINFO_FILENAME);
    $webp_path = $dir . '/' . $basename . '.webp';

    $result = imagewebp($src, $webp_path, $quality);
    imagedestroy($src);

    if ($result) {
        // Remove original if it was a different format
        if ($file_path !== $webp_path && file_exists($file_path)) {
            unlink($file_path);
        }
        return $basename . '.webp';
    }

    return false;
}
