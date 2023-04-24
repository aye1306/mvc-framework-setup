<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../components/header.php" ?>
    <title>view index</title>
</head>

<body>


    <h3 id="text-example"></h3>



    <?php include_once "../components/scripts.php" ?>
    <script>
        $(document).ready(function() {
            Ajax_GET().then((result) => {
                $('#text-example').text(result);
            }).catch((err) => {
                console.log(err);
            });

        });
    </script>
</body>

</html>