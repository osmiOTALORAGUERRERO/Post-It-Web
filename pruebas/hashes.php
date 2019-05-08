<?php
    $hash = password_hash("miContraseñaSegura", PASSWORD_BCRYPT);
    echo $hash;
?>
