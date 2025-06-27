<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="sidebar" class="animated fadeInRight col-lg-4 d-none d-lg-block">
    <div class="sidebar-main">
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowSearch', $this->options->sidebarBlock)): ?>    
        <div class="p-block">
            <div> 
                <span class="t-lg border-bottom border-primary puock-text pb-2">
                    <i class="fa fa-search mr-1"></i>文章搜索
                </span> 
            </div>
            <div class="mt20">
                <form class="global-search-form" action="<?php $this->options->siteUrl(); ?>" method="get">
                    <div class="input-group"> 
                        <input type="text" name="s" class="form-control t-md" placeholder="输入关键字回车搜索"> 
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>

<!-- 个人信息 -->
<?php
// 获取数据库连接
$db = Typecho_Db::get();
$prefix = $db->getPrefix();
// 1. 获取uid=1的用户信息
$user = $db->fetchRow($db->select()->from('table.users')->where('uid = ?', 1));
$email = $user['mail'];
$nickname = $user['screenName'];
// 获取用户设置的 Gravatar 镜像
$cnavatar = Helper::options()->cnavatar ? Helper::options()->cnavatar : 'https://cravatar.cn/avatar/';
$hash = md5($email);
$avatar = rtrim($cnavatar, '/') . '/' . $hash . '?s=80&d=identicon';
// 2. 获取用户总数
$userCount = $db->fetchObject($db->select(array('COUNT(*)' => 'num'))->from('table.users'))->num;
// 3. 获取文章总数（只统计 type='post' 且 status='publish'）
$postCount = $db->fetchObject($db->select(array('COUNT(*)' => 'num'))->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish'))->num;
// 4. 获取评论总数
$commentCount = $db->fetchObject($db->select(array('COUNT(*)' => 'num'))->from('table.comments'))->num;
// 5. 获取文章浏览总量（累加所有文章的 views 字段）
$totalViews = $db->fetchObject(
    $db->select(array('SUM(views)' => 'viewsum'))->from('table.contents')->where('type = ?', 'post')
)->viewsum;
if ($totalViews === null) $totalViews = 0;
?>        
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAdmin', $this->options->sidebarBlock)): ?>
        <div class="widget-puock-author widget">
            <div class="header" style="background-image: url('<?php echo $this->options->bgUrl() ?: $this->options->themeUrl('assets/img/cover.png'); ?>')">
                <img src='<?php $this->options->themeUrl('assets/img/load.svg'); ?>' class='lazy avatar' data-src='<?php echo $avatar; ?>' >
            </div>
            <div class="content t-md puock-text">
                <div class="text-center p-2">
                    <div class="t-lg"><?php echo $nickname; ?></div>
                    <div class="mt10 t-sm"><?php $this->options->description(); ?></div>
                </div>
                <div class="row mt10">
                    <div class="col-3 text-center">
                        <div class="c-sub t-sm">用户数</div>
                        <div><?php echo $userCount; ?></div>
                    </div>
                    <div class="col-3 text-center">
                        <div class="c-sub t-sm">文章数</div>
                        <div><?php echo $postCount; ?></div>
                    </div>
                    <div class="col-3 text-center">
                        <div class="c-sub t-sm">评论数</div>
                        <div><?php echo $commentCount; ?></div>
                    </div>
                    <div class="col-3 text-center">
                        <div class="c-sub t-sm">阅读量</div>
                        <div><?php echo $totalViews; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

<!-- 最新文章 -->
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <div class="pk-widget p-block ">
            <div>
                <span class="t-lg border-bottom border-primary puock-text pb-2">
                    <i class="fa fa-chart-simple mr-1"></i>最新文章
                </span>
            </div>
            <div class="mt20">
                <?php \Widget\Contents\Post\Recent::alloc()
                    ->parse('
<div class="media-link mt20">
    <h2 class="t-lg t-line-1" title="{title}"> 
        <i class="fa fa-angle-right t-sm c-sub mr-1"></i> 
        <a class="a-link t-w-400 t-md" title="{title}" href="{permalink}">
            {title}
        </a> 
    </h2>
</div>                    
'); ?>   
            </div>
        </div>
        <?php endif; ?>
<!-- 热门文章 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowHotPosts', $this->options->sidebarBlock)): ?>
<?php
    $db = Typecho_Db::get();
    $select = $db->select(
        'table.contents.cid',
        'table.contents.title',
        'table.contents.slug',
        'table.contents.created',
        'table.contents.authorId',
        'table.contents.type',
        'table.contents.status',
        'table.contents.commentsNum',
        'table.contents.order',
        'table.contents.template'
    )
    ->from('table.contents')
    ->where('table.contents.type = ?', 'post')
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.password IS NULL')
    ->order('table.contents.commentsNum', Typecho_Db::SORT_DESC)
    ->limit(5);
    
    try {
        $hotPosts = $db->fetchAll($select);
    } catch (Exception $e) {
        $hotPosts = [];
    }
    ?>
    
    <?php if (!empty($hotPosts)): ?>
    <div class="pk-widget p-block">
        <div> 
            <span class="t-lg border-bottom border-primary puock-text pb-2">
                <i class="fa fa-chart-simple mr-1"></i>热门文章
            </span> 
        </div>
        <div class="mt20">
            <?php foreach ($hotPosts as $post): ?>
                <?php
                // Typecho 1.3.0 兼容处理
                $widget = $this->widget('Widget_Archive@post_' . $post['cid'], 'type=post');
                try {
                    $widget->setArchiveProperty('cid', $post['cid']);
                    $widget->setArchiveProperty('title', $post['title']);
                    $widget->setArchiveProperty('slug', $post['slug']);
                    $widget->setArchiveProperty('created', $post['created']);
                    $widget->setArchiveProperty('authorId', $post['authorId']);
                    $widget->setArchiveProperty('type', $post['type']);
                    $widget->setArchiveProperty('status', $post['status']);
                    $widget->setArchiveProperty('commentsNum', $post['commentsNum']);
                    
                    // 生成正确链接
                    $permalink = $widget->archiveUrl;
                    
                    if (empty($post['title']) || empty($permalink)) {
                        continue;
                    }
                } catch (Exception $e) {
                    continue;
                }
                ?>
                <div class="media-link mt20">
                    <h2 class="t-lg t-line-1" title="<?php echo htmlspecialchars($post['title']); ?>"> 
                        <i class="fa fa-angle-right t-sm c-sub mr-1"></i> 
                        <a class="a-link t-w-400 t-md" 
                           title="<?php echo htmlspecialchars($post['title']); ?>" 
                           href="<?php echo htmlspecialchars($permalink); ?>">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </a> 
                    </h2>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
        <!-- 最近评论 -->
        <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
                    <?php 
        // 设置参数来排除管理员评论
        $comments = \Widget\Comments\Recent::alloc(array(
            'ignoreAuthor' => true  // 这里添加参数来排除作者/管理员评论
        )); 
        ?>
        <div class="pk-widget p-block ">
            <div> 
                <span class="t-lg border-bottom border-primary puock-text pb-2">
                    <i class="fa fa-comment mr-1"></i>最新评论
                </span> 
            </div>
            <div class="mt20">
                <div class="min-comments t-md">
                    <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                    <?php while ($comments->next()): ?>
                    <div class="comment t-md t-line-1"> 
                        <?php echo $comments->gravatar('40', ''); ?>
                        <a class="puock-link" href="<?php $comments->permalink(); ?>"> 
                            <span class="ta3 link-hover"><?php $comments->author(false); ?></span>
                        </a> 
                        <span class="c-sub t-w-400"><?php $comments->excerpt(35, '...'); ?></span> 
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
<!-- 热门标签 -->
<?php if (!empty($this->options->sidebarBlock) && in_array('ShowTags', $this->options->sidebarBlock)): ?>
<?php
$tags = \Widget\Metas\Tag\Cloud::alloc('sort=count&desc=1');
if ($tags->have()):
// 定义可用的颜色类数组
$colors = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info'];
?>
<div class="pk-widget p-block ">
    <div> 
        <span class="t-lg border-bottom border-primary puock-text pb-2">
            <i class="fa fa-tag mr-1"></i>标签云
        </span> 
    </div>
    <div class="mt20">  
        <div class="widget-puock-tag-cloud">          
            <?php while ($tags->next()): ?>
            <!-- 使用随机数选择颜色类 -->
            <a href="<?php $tags->permalink(); ?>" title="<?php $tags->name(); ?>" 
                class="badge d-none d-md-inline-block <?php echo $colors[array_rand($colors)]; ?> ahfff">
                <?php $tags->name(); ?>
            </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
    </div>
</div>