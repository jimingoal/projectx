<?php
function debug_log($msg) {
    error_log("$msg\n", 3, "../etc/logs/php_runtime.log");
}

function handleError(string $msg, string $sql = '')
{
    $error_message = ' ------ Mysql error: ' . $msg . "\n" . $sql;
    debug_log($error_message);
    throw new RuntimeException($error_message);
}
