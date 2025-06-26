<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="row mr-0 ml-0">
<?php while ($this->next()): ?>
<?php 
$coverImage = getPostCover($this->content, $this->cid);
?>
<article class="block card-plain post-item col-md-6 col-12 post-item-card">
    <div class="p-block post-item-block">
        <div class="thumbnail position-relative"> 
            <a class="t-sm ww" href="<?php $this->permalink() ?>"> 
                <img title="<?php $this->title() ?>" alt="<?php $this->title() ?>" src='<?php $this->options->themeUrl('assets/img/load.svg'); ?>' 
                     data-src='<?php echo $coverImage; ?>' class='lazy' />
            </a>
            <div class="post-tags"> 
                <span class="badge bg-danger"></span>
                <?php if (isset($this->isSticky) && $this->isSticky): ?><?php echo $this->stickyHtml; ?><?php endif; ?> 
            </div>
        </div>
        <div class="post-info">
            <h2 class="info-title"> 
                <?php foreach($this->categories as $category): ?>
                <a class="badge d-none d-md-inline-block bg-primary ahfff"
                   href="<?php echo $category['permalink']; ?>">
                   <i class="fa-regular fa-folder-open"></i> <?php echo $category['name']; ?>
                </a> 
                <?php endforeach; ?>
                <a class="a-link puock-text" title="<?php $this->title() ?>"
                   href="<?php $this->permalink() ?>"><?php $this->title() ?>
                </a> 
            </h2>
            <div class="info-meta c-sub">
                <div class="text-2line"> <?php $this->excerpt(200, '...'); ?></div>
            </div>
            <div class="info-footer w-100">
                <div> 
                    <span class="t-sm c-sub"> 
                        <span class="mr-2"> 
                            <i class="fa-regular fa-eye mr-1"></i>
                            <span class="view">浏览：<?php get_post_view($this) ?></span>
                            <span class="t-sm d-none d-sm-inline-block">次阅读</span>
                        </span>
                        <a class="c-sub-a" href="<?php $this->permalink() ?>#comments">
                            <i class="fa-regular fa-comment mr-1"></i> 
                            <?php $this->commentsNum('0', '1', '%d'); ?>
                            <span class="t-sm d-none d-sm-inline-block">个评论</span>
                        </a>
                    </span> 
                </div>
                <div> 
                    <?php foreach($this->categories as $category): ?>
                    <a class="c-sub-a t-sm ml-md-2 line-h-20 d-inline-block d-md-none"
                        href="<?php echo $category['permalink']; ?>">
                        <i class="fa-regular fa-folder-open"></i> <?php echo $category['name']; ?>
                    </a> 
                    <?php endforeach; ?>
                    <span class="t-sm ml-md-2 c-sub line-h-20 d-none d-md-inline-block">
                        <i class="fa-regular fa-clock"></i> <?php $this->date(); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</article> 
<?php endwhile; ?>
</div> 