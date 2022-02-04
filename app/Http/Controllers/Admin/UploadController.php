<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filename = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->storeAs('public/images', $filename);
            $url = asset( 'storage/images/' . $filename);
            return response()->json([
                'fileName' => $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);
        }
    }
    /**
     * Upload file
     *
     * @param Request $request
     * @return array
     */
    public function file(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return [
                'success' => 0
            ];
        }

        $path = $request->file('image')->store(
            'public/images',
            'local'
        );

        // if (config('nova-editor-js.toolSettings.image.disk') !== 'local') {

        //     $tempPath = $request->file('image')->store(
        //         config('nova-editor-js.toolSettings.image.path'),
        //         'local'
        //     );

        //     $this->applyAlterations(Storage::disk('local')->path($tempPath));
        //     $thumbnails = $this->applyThumbnails($tempPath);

        //     $this->deleteThumbnails(Storage::disk('local')->path($tempPath));
        //     Storage::disk('local')->delete($tempPath);
        // } else {
        //     $this->applyAlterations(Storage::disk(config('nova-editor-js.toolSettings.image.disk'))->path($path));
        //     $thumbnails = $this->applyThumbnails($path);
        // }

        return [
            'success' => 1,
            'file' => [
                'url' => Storage::url($path),
                // 'thumbnails' => $thumbnails
            ]
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function url(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'url' => [
                'required',
                'active_url',
                function ($attribute, $value, $fail) {
                    $imageDetails = getimagesize($value);

                    if (!in_array($imageDetails['mime'] ?? '', [
                        'image/jpeg',
                        'image/webp',
                        'image/gif',
                        'image/png',
                        'image/svg+xml',
                    ])) {
                        $fail($attribute . ' is invalid.');
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return [
                'success' => 0
            ];
        }

        $url = $request->input('url');
        $imageContents = file_get_contents($url);
        $name = parse_url(substr($url, strrpos($url, '/') + 1))['path'];
        $nameWithPath = config('nova-editor-js.toolSettings.image.path') . '/' . uniqid() . $name;

        Storage::disk(config('nova-editor-js.toolSettings.image.disk'))->put($nameWithPath, $imageContents);

        return [
            'success' => 1,
            'file' => [
                // 'url' => Storage::disk(config('nova-editor-js.toolSettings.image.disk'))->url($nameWithPath)
            ]
        ];
    }

    // /**
    //  * @param $path
    //  * @param array $alterations
    //  */
    // private function applyAlterations($path, $alterations = [])
    // {
    //     try {
    //         $image = Image::load($path);

    //         $imageSettings = config('nova-editor-js.toolSettings.image.alterations');

    //         if (!empty($alterations)) {
    //             $imageSettings = $alterations;
    //         }

    //         if (empty($imageSettings))
    //             return;

    //         if (!empty($imageSettings['resize']['width'])) {
    //             $image->width($imageSettings['resize']['width']);
    //         }

    //         if (!empty($imageSettings['resize']['height'])) {
    //             $image->height($imageSettings['resize']['height']);
    //         }

    //         if (!empty($imageSettings['optimize'])) {
    //             $image->optimize();
    //         }

    //         if (!empty($imageSettings['adjustments']['brightness'])) {
    //             $image->brightness($imageSettings['adjustments']['brightness']);
    //         }

    //         if (!empty($imageSettings['adjustments']['contrast'])) {
    //             $image->contrast($imageSettings['adjustments']['contrast']);
    //         }

    //         if (!empty($imageSettings['adjustments']['gamma'])) {
    //             $image->gamma($imageSettings['adjustments']['gamma']);
    //         }

    //         if (!empty($imageSettings['effects']['blur'])) {
    //             $image->blur($imageSettings['effects']['blur']);
    //         }

    //         if (!empty($imageSettings['effects']['pixelate'])) {
    //             $image->pixelate($imageSettings['effects']['pixelate']);
    //         }

    //         if (!empty($imageSettings['effects']['greyscale'])) {
    //             $image->greyscale();
    //         }
    //         if (!empty($imageSettings['effects']['sepia'])) {
    //             $image->sepia();
    //         }

    //         if (!empty($imageSettings['effects']['sharpen'])) {
    //             $image->sharpen($imageSettings['effects']['sharpen']);
    //         }

    //         $image->save();

    //     } catch (InvalidManipulation $exception) {
    //         report($exception);
    //     }
    // }

    // /**
    //  * @param $path
    //  * @return array
    //  */
    // private function applyThumbnails($path)
    // {
    //     $thumbnailSettings = config('nova-editor-js.toolSettings.image.thumbnails');

    //     $generatedThumbnails = [];

    //     if (!empty($thumbnailSettings)) {
    //         foreach ($thumbnailSettings as $thumbnailName => $setting) {
    //             $filename = pathinfo($path, PATHINFO_FILENAME);
    //             $extension = pathinfo($path, PATHINFO_EXTENSION);

    //             $newThumbnailName = $filename . $thumbnailName . '.' . $extension;
    //             $newThumbnailPath = config('nova-editor-js.toolSettings.image.path') . '/' . $newThumbnailName;

    //             Storage::disk(config('nova-editor-js.toolSettings.image.disk'))->copy($path, $newThumbnailPath);

    //             if (config('nova-editor-js.toolSettings.image.disk') !== 'local') {
    //                 Storage::disk('local')->copy($path, $newThumbnailPath);
    //                 $newPath = Storage::disk('local')->path($newThumbnailPath);
    //             } else {
    //                 $newPath = Storage::disk(config('nova-editor-js.toolSettings.image.disk'))->path($newThumbnailPath);
    //             }

    //             $this->applyAlterations($newPath, $setting);

    //             $generatedThumbnails[] = Storage::disk(config('nova-editor-js.toolSettings.image.disk'))->url($newThumbnailPath);
    //         }
    //     }

    //     return $generatedThumbnails;
    // }


    // /**
    //  * @param $path
    //  */
    // private function deleteThumbnails($path)
    // {
    //     $thumbnailSettings = config('nova-editor-js.toolSettings.image.thumbnails');

    //     if (!empty($thumbnailSettings)) {
    //         foreach ($thumbnailSettings as $thumbnailName => $setting) {
    //             $filename = pathinfo($path, PATHINFO_FILENAME);
    //             $extension = pathinfo($path, PATHINFO_EXTENSION);

    //             $newThumbnailName = $filename . $thumbnailName . '.' . $extension;
    //             $newThumbnailPath = config('nova-editor-js.toolSettings.image.path') . '/' . $newThumbnailName;

    //             Storage::disk('local')->delete($path, $newThumbnailPath);
    //         }
    //     }
    // }
}
