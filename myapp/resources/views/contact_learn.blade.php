<html>
    <body>
        <?php echo $data ?>

        <!-- XSS Attack Cover-->
        {{ $data }}
    </body>
</html>