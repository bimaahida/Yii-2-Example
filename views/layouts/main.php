<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

app\assets\AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);
\app\assets\AdminLtePluginAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
$pluginAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/plugins');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" type="image/ico" href="<?php echo \Yii::$app->request->baseUrl . '/icon.ico' ?>">
    <title><?= Html::encode(Yii::$app->name . " - " . $this->title) ?></title>
    <script>
        var baseUrl = "<?= Yii::$app->urlManager->baseUrl ?>";
    </script>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?php if (Yii::$app->user->identity->id == NULL) { ?>
        <?= $this->render(
            'content.php',
            [
                'content' => $content,
                'directoryAsset' => $directoryAsset,
                'pluginAsset' => $pluginAsset,
            ]
        ) ?>

    <?php } else { ?>
    <?= $this->render(
        'header.php',
        [
            'directoryAsset' => $directoryAsset,
            'pluginAsset' => $pluginAsset,
        ]
    ) ?>

    <?= $this->render(
        'left.php',
        [
            'directoryAsset' => $directoryAsset,
            'pluginAsset' => $pluginAsset,
        ]
    )
    ?>

    <?= $this->render(
        'content.php',
        [
            'content' => $content,
            'directoryAsset' => $directoryAsset,
            'pluginAsset' => $pluginAsset,
        ]
    ) ?>
<?php } ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
