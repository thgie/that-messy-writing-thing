<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>messy</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/fontello.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/pen/pen.css">

</head>
<body>

    <input type="hidden" data-id="<?php echo $p->id; ?>">

    <div id="wrapper">
        <div id="inner">
            <div id="sources">
                <?php echo $p->sources; ?>
            </div>
            <div id="content" class="textarea" data-content>
                <?php echo $p->content; ?>
            </div>
        </div>
    </div>

    <div id="options">
        <button type="button" data-pen><i class="icon-pencil-circled"></i></button>
        <button type="button" data-highlight><i class="icon-adjust"></i></button>
        <button type="button" data-bootstrap><i class="icon-quote-circled"></i></button>
        <button type="button" data-chain><i class="icon-plus-circled"></i></button>
        <button type="button" data-new><i class="icon-lightbulb-alt"></i></button>
    </div>

    <div id="bootstrap" data-bootstraping>
        <div class="inner">
            <div id="modal">
                <p>Start new thread with these sources?</p>
                <div id="sources-preview"></div>
                <button type="button" data-yes><i class="icon-ok-circled"></i></button>
                <button type="button" data-no><i class="icon-cancel-circled2"></i></button>
            </div>
        </div>
    </div>

    <div id="chain" data-chaining>
        <div class="inner">
            <div id="modal">
                <p>Link to existing piece with these sources?</p>
                <div id="chains-preview"></div>
                <p>Link to this piece:</p>
                <select name="ids" id="ids" data-chain-to>
                    <?php echo $ids; ?>
                    <?php

                        $ids = explode(',', $ids);
                        foreach($ids as $key => $id){
                            echo '<option value="'.$id.'">'.$id.'</option>';
                        }

                    ?>
                </select>
                <button type="button" data-yes-chain><i class="icon-ok-circled"></i></button>
                <button type="button" data-no><i class="icon-cancel-circled2"></i></button>
            </div>
        </div>
    </div>

    <script src="/pen/pen.js"></script>
    <script src="/pen/markdown.js"></script>


    <script type="text/javascript" src="/rangy/rangy-core.js"></script>
    <script type="text/javascript" src="/rangy/rangy-classapplier.js"></script>
    <script type="text/javascript" src="/rangy/rangy-highlighter.js"></script>
    <script type="text/javascript" src="/rangy/rangy-serializer.js"></script>


    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/init.js"></script>

</body>
</html>
