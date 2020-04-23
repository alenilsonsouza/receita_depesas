<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?=$viewData['site']->getName();?></title>
        <meta property="og:url" content="<?=BASE;?>">
        <meta property="og:type" content="website">
        <meta property="og:title" content="">
        <meta property="og:description" content="">
        <meta property="og:image" content="https:<?php echo BASE;?>assets/images/post.png">
        <meta name="description" content="<?=$viewData['site']->getDescription();?>">
        <meta name="keywords" content="<?=$viewData['site']->getKeywords();?>">		
        <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" href="<?php echo BASE;?>assets/images/favicon.ico" sizes="16x16 32x32 64x64" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="<?php echo AUTOR;?>">
        <style type="text/css">
            <?php require 'assets/css/geral.css';?>
        </style>
        <link rel="stylesheet" href="<?php echo BASE_CSS;?>vanillaSlideshow.css">
    </head>
<body>