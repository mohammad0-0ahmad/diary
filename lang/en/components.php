<?php
return [
    "diary-form" => [
        "inputs" => [
            "date" => [
                "label" => "Date",
            ],
            "privacy" => [
                "label" => "Privacy",
                "options" => [
                    "public" => ["label" => "Public"],
                    "private" => ["label" => "Private"],
                ],
            ],
            "content" => [
                "label" => "Content",
                "placeholder" => "Write down your new diary and keep your memories in safe. 😉",
            ],
        ],
        "buttons" => [
            "create" => ["label" => "Create"],
            "cancel" => ["label" => "Cancel"],
            "save" => ["label" => "Save"],
        ],
    ],
    
    "diary-generator" => [
        "title" => "Create new diary",
    ],

];