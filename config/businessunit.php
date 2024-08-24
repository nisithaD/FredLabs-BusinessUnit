<?php

return [


    'model' => FredLabs\BusinessUnits\Models\BusinessUnit::class,

    'fillable' => [
        'name',
        'email',
        'phone',
        'address_line_1',
        'address_line_2',
        'suburb',
        'postcode',
        'city',
        'primary_color',
        'secondary_color',
        'is_current',
        'is_archived',
    ],
];
