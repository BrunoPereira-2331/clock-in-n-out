<?php 

require_once(dirname(__FILE__, 2) . "/src/config/config.php");
require_once(dirname(__FILE__, 2) . "/src/models/User.php");

$user = new User(['name' => "Lucas", "email" => "lucas@cod3r.com.br"]);

// $teste = $user->get(["id", "name"], [
//     [
//         "in",
//         [
//             "id" => ["1", "2", "3"],
//             "name" => ["pedro", "fulano"]
//         ]
//     ],
//     [
//         "=",
//         [
//             "is_admin" => 1,
//         ]
//     ], 
//     [
//         "between",
//         [
//             "start_date" => ["2021/08/05", "2021/10/05"]
//         ]
//     ],
//     [
//         "like",
//         [
//             "name" => "pedro"
//         ]
//     ],
// ]);
print_r(User::get(["id", "name"], [
    [
        "=",
        [
            "id" => 2,
        ]
    ]
]));
?> 