<?php

$arr = [
    [
        'name' => 'Some name',
        'age'  => 23
    ],
    [
        'name' => 'Kme',
        'age'  => 18
    ]
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <?php foreach ($arr as $user): ?>
        <tr>
            <td>Name: <?php echo $user['name'] ?></td>
            <td>Age: <?php echo $user['age'] ?></td>
        </tr>
    <?php endforeach; ?>
    <?php if (isset($arr)): ?>
        <tr>
            <td>
                Arr inited
            </td>
        </tr>
    <?php endif; ?>
</table>
</body>
</html>
