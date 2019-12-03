<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->title ?></title>
    <?php
        $t = time();
        for($i=0;$i<count($this->css);$i++) {
            echo "<link rel=\"stylesheet\" href=\"/isoc/css/{$this->css[$i]}?i={$t}\">";
        }
    ?>
</head>
<body>
    <div class="navbar"></div>
    <div class="row" id="midctr">