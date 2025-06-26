<?php
return [
        'temporary_file_upload' => [
        'enabled' => true,
        'rules' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,mp4,mov,avi,webm', 'max:100240'],    ],
    'layout' => 'components.layouts.app.radhe',
];