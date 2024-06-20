<?php
// Funzione per generare una password casuale di lunghezza specificata
function generatePassword($length, $include_numbers = true, $include_letters = true, $include_symbols = true, $no_repeat = false) {
    $characters = '';
    
    if ($include_numbers) {
        $characters .= '0123456789';
    }
    if ($include_letters) {
        $characters .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    if ($include_symbols) {
        $characters .= '!@#$%^&*()';
    }
    
    $password = '';
    $characters_length = strlen($characters);
    $used_characters = '';

    for ($i = 0; $i < $length; $i++) {
        if ($no_repeat) {
            $random_char = $characters[rand(0, $characters_length - 1)];
            while (strpos($used_characters, $random_char) !== false) {
                $random_char = $characters[rand(0, $characters_length - 1)];
            }
            $used_characters .= $random_char;
            $password .= $random_char;
        } else {
            $password .= $characters[rand(0, $characters_length - 1)];
        }
    }

    return $password;
}
?>
