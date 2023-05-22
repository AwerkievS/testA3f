<?php

require './../vendor/autoload.php';

use App\ParseHandler;
use App\Parser\DTO\ParserRequestDTO;
use App\Parser\HtmlTagsParser;
use App\Parser\ResourceExtractor\FromUrlExtractor;
use App\Parser\ResourceExtractor\ResourceExtractor;
use App\Parser\Validators\UrlResourceValidator;
use App\Parser\View\HtmlParseResultView;


$resourceExtractor = new ResourceExtractor();
$resourceExtractor->setExtractor(new FromUrlExtractor());

$parser = new HtmlTagsParser();
$validator = new UrlResourceValidator();
$handler = new ParseHandler($resourceExtractor, $validator, $parser);

$view = new HtmlParseResultView();
$request = new ParserRequestDTO($_GET['url'] ?? '');
$result = $view->prepareHtmlParseResultView($handler->exec($request));
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
</head>
<body>

<h3>Количество тегов на странице <?=$result->getHeader()?> </h3>
<ul>
    <?php foreach ($result->getTags() as $tag => $count): ?>
        <li> Тег "<?= $tag ?>": <b><?= $count ?></b> раз</li>
    <?php endforeach ?>
</ul>

</body>
</html>

