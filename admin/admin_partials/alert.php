<?php
function alert($message, $link)
{
    $script = "
        <script type='text/javascript'>
            alert('$message');
            window.location.href = '$link';
        </script>
    ";
    echo $script;
}
