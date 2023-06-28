<?php
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();
?>

<script>
    alert("Sua sessão foi encerrada com sucesso!");
    window.location.href = "login.php";
</script>
