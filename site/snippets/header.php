<!DOCTYPE html>
<html lang="en">
<head>
  
  <title><?= html($site->title()) ?> - <?= html($page->title()) ?></title>
  <meta charset="utf-8" />
  <meta name="description" content="<?= html($site->description()) ?>" />
  <meta name="keywords" content="<?= html($site->keywords()) ?>" />
  <meta name="robots" content="index, follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <?= css('assets/css/tidy.css') ?>
  <link rel="stylesheet" href="https://unpkg.com/tachyons@4.12.0/css/tachyons.min.css"/>
  <link rel="shortcut icon" type="image/x-icon"  href="<?= url('assets/images/favicon.ico') ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?= url('assets/images/apple-touch-icon-72x72.png') ?>" />
  <link rel="apple-touch-icon" sizes="114x114" href="<?= url('assets/images/apple-touch-icon-114x114.png') ?>" />
</head>

<body class="pa3 mw8 center ff-meta-serif <?php if (isset($error)) echo 'error' ?>">
  <div class="mt6">
	  <header class="tr-ns tl w-60-ns">
	    <a class="f2 gold link meta-cd" href="<?= url() ?>"> <?= html($site->title()) ?> </a>
	  </header>
  </div>