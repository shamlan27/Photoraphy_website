<?php
$hash = 'mysecurepass';
$input = 'mysecurepass';

if (password_verify($input, $hash)) {
    echo "✅ Password matches";
} else {
    echo "❌ Password does not match";
}
