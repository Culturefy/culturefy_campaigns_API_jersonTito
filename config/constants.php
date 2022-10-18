<?php

use Carbon\Carbon;

return[

    'calender' => [
        'date'          => Carbon::now()->toDateString(),
        'date_format'   => Carbon::now()->format('Y-m-d'),
        'time'          => Carbon::now()->toTimeString(),
        'date_time'     => Carbon::now()->toDateTimeString(),
    ],

    'messages' => [
        'success'                   => 'Success',
        'delete_success'            => 'Delete Successfully',
        'delete_sucess'             => 'Delete Successful.',
        'create_success'            => 'Created successfully.',
        'update_success'            => 'Updated successfully.',
        'change_success'            => 'Campaing Archive successfully.',
        'change_un_success'         => 'Campaing UnArchive successfully.',
    ],

    'validation_codes' => [
        'unauthorized'         => 401,
        'forbidden'            => 403,
        'unprocessable_entity' => 422,
        'ok'                   => 200,
    ],

    'allowed_ip_addresses' => [
        'telescope'     => env('TELESCOPE_ALLOWED_IP_ADDRESSES'),
    ],

    'campaigns' => [
        'campaigns_archive' => '1',
        'campaigns_unarchive' => '0'
    ],

    'image' => [
        'dir_path'          => '/storage/',
        'default_types'     => 'gif|jpg|png|jpeg',
        'user_default_img'  => 'images/default.jpg',
    ],
];
