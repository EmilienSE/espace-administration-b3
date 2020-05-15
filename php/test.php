<?php
$options = [
    'cost' => 12,
];
echo password_hash("test", PASSWORD_BCRYPT, $options);