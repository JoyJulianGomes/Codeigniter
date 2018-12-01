<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <?php foreach ($data as $key=>$value):?>
        <?php echo $key ."=>".$value."<br>";?>
    <?php endforeach;?>
</body>
</html>