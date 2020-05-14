<?php
$options = [
    'cost' => 12,
];
echo password_hash("abcd", PASSWORD_BCRYPT, $options);