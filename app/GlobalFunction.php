<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Google\Client;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function Psy\debug;

class GlobalFunction extends Model
{

    public static function sendPushNotificationToAllUsers($title, $description)
    {
        $client = new Client();
        $client->setAuthConfig('googleCredentials.json');
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $client->fetchAccessTokenWithAssertion();
        $accessToken = $client->getAccessToken();
        $accessToken = $accessToken['access_token'];

        $contents = File::get(base_path('googleCredentials.json'));
        $json = json_decode(json: $contents, associative: true);

        $url = 'https://fcm.googleapis.com/v1/projects/' . $json['project_id'] . '/messages:send';
        $notificationArray = array('title' => $title, 'body' => $description);

        $fields = array(
            'message' => [
                'topic' => env('NOTIFICATION_TOPIC'),
                'notification' => $notificationArray,
                'android' => ['priority' => 'high'],
                'apns' => [
                    'payload' => [
                        'aps' => ['sound' => 'default']
                    ]
                ],
            ],

        );

        $headers = array(
            'Content-Type:application/json',
            'Authorization:Bearer ' . $accessToken
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        // print_r(json_encode($fields));
        $result = curl_exec($ch);
        // Log::debug($result);

        if ($result === FALSE) {
            die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);

        if ($result) {
            return json_encode(['status' => true, 'message' => 'Notification sent successfully']);
        } else {
            return json_encode(['status' => false, 'message ' => 'Not sent!']);
        }
    }

    public static function deleteFile($url)
    {
        if ($url == null) {
            return;
        }
        // Define the base URLs for AWS, DigitalOcean, and Local storage
        $baseURLAWS = rtrim(env('ITEM_BASE_URL'), '/') . '/';
        $baseURLDO = rtrim(env('DO_SPACE_URL'), '/') . '/';
        $baseURLLocal = rtrim(env('APP_URL'), '/') . '/storage/';

        // Remove the base URLs from the given URL to get the file paths
        $fileNameAWS = str_replace($baseURLAWS, '', $url);
        $fileNameDO = str_replace($baseURLDO, '', $fileNameAWS);
        $fileNameLocal = str_replace($baseURLLocal, '', $url);

        // Check and delete the file from local storage
        if (Storage::disk('local')->exists('public/' . $fileNameLocal)) {
            Storage::disk('local')->delete('public/' . $fileNameLocal);
        }

        try {
            if (Storage::disk('digitalocean')->exists($fileNameDO)) {
                Storage::disk('digitalocean')->delete($fileNameDO);
            }
        } catch (\Exception $e) {
            
        }
        
        try {
            if (Storage::disk('s3')->exists($fileNameAWS)) {
                Storage::disk('s3')->delete($fileNameAWS);
            }
        } catch (\Exception $e) {
            
        }
        
    }

    public static function saveFileAndGivePath($file)
    {
        $storageType = GlobalSettings::first()->storage_type;

        $storageConfig = [
            1 => ['disk' => 's3', 'base_url' => env('ITEM_BASE_URL')],
            2 => ['disk' => 'digitalocean', 'base_url' => env('DO_SPACE_URL')],
        ];

        $storageDisk = $storageConfig[$storageType]['disk'] ?? 'public';
        $baseUrl = $storageConfig[$storageType]['base_url'] ?? env('APP_URL') . 'storage/';

        $fileName = time().'_'.env('APP_NAME').'_'.str_replace(" ", "_", $file->getClientOriginalName());
        $appName = env('APP_NAME') ? env('APP_NAME') . '/' : '';
        $filePath = ($storageDisk === 'public') ? 'uploads/' . $fileName : $appName . 'uploads/' . $fileName;

        Storage::disk($storageDisk)->put($filePath, file_get_contents($file), 'public');

        return $baseUrl . $filePath;
    }

    public static function saveImageFromUrl($url)
    {
        if ($url != null) {
            $storageType = GlobalSettings::first()->storage_type;

            $storageConfig = [
                1 => ['disk' => 's3', 'base_url' => env('ITEM_BASE_URL')],
                2 => ['disk' => 'digitalocean', 'base_url' => env('DO_SPACE_URL')],
            ];

            $storageDisk = $storageConfig[$storageType]['disk'] ?? 'public';
            $baseUrl = $storageConfig[$storageType]['base_url'] ?? env('APP_URL') . 'storage/';

            $contents = file_get_contents($url);
            $fileName = uniqid() . '_' . basename($url);
            $appName = env('APP_NAME') ? env('APP_NAME') . '/' : '';
            $filePath = ($storageDisk === 'public') ? 'uploads/' . $fileName : $appName . 'uploads/' . $fileName;

            Storage::disk($storageDisk)->put($filePath, $contents, 'public');

            return $baseUrl . $filePath;
        } else {
            return null;
        }
    }


    public static function saveSubtitleFileAsSrt($file)
    {
        if ($file != null) {
            $storageType = GlobalSettings::first()->storage_type;

            $storageConfig = [
                1 => ['disk' => 's3', 'base_url' => env('ITEM_BASE_URL')],
                2 => ['disk' => 'digitalocean', 'base_url' => env('DO_SPACE_URL')],
            ];

            $storageDisk = $storageConfig[$storageType]['disk'] ?? 'public';
            $baseUrl = $storageConfig[$storageType]['base_url'] ?? env('APP_URL') . 'storage/';

            $extension = $file->getClientOriginalExtension(); // Get the original file extension
            $filename = time() . uniqid() . '.' . $extension; // Create a unique filename with the correct extension
            $appName = env('APP_NAME') ? env('APP_NAME') . '/' : '';
            $filePath = ($storageDisk === 'public') ? 'uploads/' . $filename : $appName . 'uploads/' . $filename;

            Storage::disk($storageDisk)->put($filePath, file_get_contents($file), 'public');

            return $baseUrl . $filePath;
        } else {
            return null;
        }
    }

}
