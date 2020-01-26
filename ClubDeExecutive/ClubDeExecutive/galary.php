<?php
 include_once "../class/admin/Event.php";

$obj=new Event();
$obj->store($_POST);
$obj->storePicture();
$array=$obj->show();
//print_r($_POST);
?>
<html>
<head>
    <title>View Image</title>
</head>
<body>
<?php
foreach ($array as $item){ ?>

        <div><?php echo $item['image']?></div>


<?php } ?>


</body>
</html>
