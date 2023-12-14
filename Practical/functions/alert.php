<?php
function alert($name)
{
    if (isset($_SESSION[$name])) {
        echo "<script>";
        echo "document.addEventListener('DOMContentLoaded', function() {";
        echo 'Toast.fire({
            icon: "success",
            title: "item added to cart successfully"
          });';
        echo "});";
        echo "</script>";
        unset($_SESSION[$name]);
    }
}
?>
