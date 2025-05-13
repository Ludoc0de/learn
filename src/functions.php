<?php
// function redirectToUrl(string $url): never
// {
//     header("Location: {$url}");
//     exit();
// }

// function isValidTutorial(array $tutorial): bool
// {

//     if (array_key_exists("is_enabled", $tutorial)) {
//         $isAvailable = $tutorial["is_enabled"];
//     } else {
//         $isAvailable = false;
//     }

//     return $isAvailable;
// }


// function getTutorials(array $tutorials): array
// {
//     $availableTutorials = [];
//     foreach ($tutorials as $tutorial) {
//         if (isValidTutorial($tutorial)) {
//             $availableTutorials[] = $tutorial;
//         }
//     }

//     return $availableTutorials;
// }

// function getAllTutorials(array $tutorials): array
// {
//     $getAll = [];
//     foreach ($tutorials as $tutorial) {
//         $getAll[] = $tutorial;
//     }
//     return $getAll;
// }

// function getAuthors(string $authorEmail, array $users): string
// {
//     foreach ($users as $user) {
//         if ($authorEmail === $user['email']) {
//             return $user['full_name'];
//         }
//     }
// }