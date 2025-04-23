<?php
function isValidVideo(array $video): bool
{

    if (array_key_exists("is_enabled", $video)) {
        $isAvailable = $video["is_enabled"];
    } else {
        $isAvailable = false;
    }

    return $isAvailable;
}


function getVideos(array $videos): array
{
    $availableVideos = [];
    foreach ($videos as $video) {
        if (isValidVideo($video)) {
            $availableVideos[] = $video;
        }
    }

    return $availableVideos;
}

function getAuthors(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'];
        }
    }
}

function authenticatedUser(string $email, string $password, array $users): bool
{
    foreach ($users as $user) {
        if (($user['email'] === $email) && ($user['password'] === $password)) {
            return true;
        }
    }
    return false;
}