<?php

require 'array_is_subset.php';

$superset = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'occupations' => [
            ['Carpenter'],
            ['doctor']
        ],
        'created_at' => '2015-07-01 12:15:43',
    ],
    [
        'id' => 2,
        'name' => 'Mary Anne',
        'occupation' => 'Welder',
        'created_at' => '2015-07-05 11:25:41',
    ],
    [
        'id' => 3,
        'name' => 'Kelly Roberts',
        'occupation' => 'Programmer',
        'created_at' => '2015-07-07 13:18:52',
    ]
];

$subset = [
    [
        'name' => 'Mary Anne',
        'occupation' => 'Welder',
    ],
    [
        'name' => 'Kelly Roberts',
        'occupation' => 'Programmer',
    ],
    [
        'name' => 'John Doe',
        'occupations' => [['Carpenter']],
    ],
];

echo array_is_subset($superset, $subset) ? "Match\n" : "No Match\n";
