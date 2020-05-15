<?php
$options = [
    'cost' => 12,
];
echo password_hash("admin", PASSWORD_BCRYPT, $options);