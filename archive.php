<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>


<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-md-8 am-u-sm-12">
        <h2 class="am-margin-top-lg"><?php $this->archiveTitle(array(
                'category'  =>  _t('分类 %s 下的文章'),
                'search'    =>  _t('包含关键字 %s 的文章'),
                'tag'       =>  _t('标签 %s 下的文章'),
                'author'    =>  _t('%s 发布的文章')
            ), '', ''); ?></h2>
        <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <a href="<?php $this->permalink() ?>"> <img src="<?php echo  img_postthemb($this,'/admin/img/noscreen.png')?>" alt="" class="am-u-sm-12"></a>
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span> <a href="<?php $this->author->permalink(); ?>">@<?php $this->author(); ?></a> &nbsp;</span>
                <span><?php $this->date('F j, Y'); ?></span>
                <span><?php $this->category(','); ?>&nbsp;</span>
                <h1><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                <p><?php $this->excerpt(200);?>
                </p>
                <p><a href="<?php $this->permalink() ?>" class="blog-continue">继续阅读 »</a></p>
            </div>
        </article>
        <?php endwhile; ?>
        <?php else: ?>
            <article class="am-g blog-entry-article am-text-center">
                <?php _e('没有找到内容'); ?>
            </article>
        <?php endif; ?>
        <ul class="am-pagination">
            <?php $this->pageLink('&laquo; Prev','prev');?>
            <?php $this->pageLink('Next &raquo;','next');?>
        </ul>
    </div>
    <?php $this->need('sidebar.php'); ?>
</div>
<!-- content end -->

<?php $this->need('footer.php'); ?>
