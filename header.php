<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="<?php $this->options->themeUrl('images/favicon.png'); ?>">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="<?php $this->options->themeUrl('images/app-icon72x72@2x.png'); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="<?php $this->options->title(); ?>"/>
    <link rel="apple-touch-icon-precomposed" href="<?php $this->options->themeUrl('images/app-icon72x72@2x.png'); ?>">
    <meta name="msapplication-TileImage" content="<?php $this->options->themeUrl('images/app-icon72x72@2x.png'); ?>">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/amazeui.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/app.css'); ?>">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body id="blog">

<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header">
    <div class="am-u-sm-8 am-u-sm-centered">
        <img width="200" src="<?php $this->options->logoUrl ? $this->options->logoUrl : $this->options->themeUrl('images/amazeui-b.png'); ?>" alt="<?php $this->options->title(); ?>"/>
        <h2 class="am-hide-sm-only"><?php $this->options->description() ?></h2>
    </div>
</header>
<hr>
<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li <?php if($this->is('index')): ?>class="am-active"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
                <li <?php if($this->is('page', $pages->slug)): ?>class="am-active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('RSS'); ?></a></li>
        </ul>
        <form class="am-topbar-form am-topbar-right am-form-inline" action="./" role="search">
            <div class="am-form-group">
                <input type="text" name="s" class="am-form-field am-input-sm" placeholder="<?php _e('输入关键字搜索'); ?>">
            </div>
        </form>
    </div>
</nav>
<hr>