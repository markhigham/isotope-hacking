<?php

$layouts = array(
    'masonry',
    'fitRows',
    'cellsByRow',
    'straightDown',
    'masonryHorizontal',
    'fitColumns',
    'cellsByColumn',
    'straightAcross'
);


?><!DOCTYPE html>
<html>
<head>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>

    <link type="text/css" rel="stylesheet" href="css/site.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300' rel='stylesheet'
          type='text/css'>

    <link type="text/css" rel="stylesheet" href="css/isotope.css"/>

    <title>Isotope Hacking</title>
</head>
<body>

<div class='toolbar'>
    <input type='text' id='width'/>
    <button id='setWidth'>Set Width</button>

    <select id='layout'>
        <? foreach ($layouts as $layout): ?>

            <option><?= $layout ?></option>

        <? endforeach; ?>
    </select>
    <button id='setLayout'>Set</button>

</div>

<div id='container'>

    <? for ($i = 0; $i < 10; $i++):
        ?>

        <div class='item tileh<?= $i % 3 ?>'>
            <div class='tile'>
                <?= $i ?>
                <br/>

                <div class='title'>
                    <?= $i % 3 ?>
                </div>
            </div>
        </div>

    <? endfor; ?>

</div>


<script>

    $(function () {

        var $container = $('#container'),
            $widthTextBox = $('#width');

        $widthTextBox.val($container.width());

        $container.isotope({
            itemSelector: '.item',
            layoutMode: 'masonry'

        });

        $('#setLayout').click(function () {

            var mode = $('#layout').find(":selected").text();

            $container.isotope('option', {
                layoutMode: mode
            });

            $container.isotope('reLayout');

        });

        $('#setWidth').click(function () {
            $container.width($widthTextBox.val());

            $container.isotope('reLayout');

        });

    });


</script>

</body>
</html>