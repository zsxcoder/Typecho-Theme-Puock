<?php
/**
 * 随机阅读
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

// 防止 PJAX 缓存，确保每次都是随机文章
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
header('X-InstantClick: no-cache');

// 获取随机文章
function getRandomPost() {
    $db = Typecho_Db::get();
    
    // 统计符合条件的文章总数
    $countSql = $db->select('COUNT(*) AS count')
        ->from('table.contents')
        ->where('status = ?', 'publish')
        ->where('type = ?', 'post')
        ->where('created <= ?', time());
    $countResult = $db->fetchRow($countSql);
    $total = $countResult['count'];

    if ($total > 0) {
        // 随机选择一个偏移量
        $offset = mt_rand(0, $total - 1);

        // 根据偏移量获取一篇文章
        $sql = $db->select()
            ->from('table.contents')
            ->where('status = ?', 'publish')
            ->where('type = ?', 'post')
            ->where('created <= ?', time())
            ->limit(1)
            ->offset($offset);

        $result = $db->fetchRow($sql);

        if (!empty($result)) {
            $target = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($result);
            return $target['permalink'];
        }
    }
    
    return false;
}

// 获取随机文章链接
$randomPostUrl = getRandomPost();

$this->need('header.php'); 
?>
<div id="breadcrumb" class="animated fadeInUp">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="a-link" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
            <li class="breadcrumb-item active" aria-current="page">随机阅读</li>
        </ol>
    </nav>
</div>
<div id="page-empty">
    <div id="page" class="row row-cols-1">
        <?php if ($this->options->showsidebar): ?>    
        <div id="post-main" class="col-lg-8 col-md-12 animated fadeInLeft">
        <?php else: ?>
        <div id="post-main" class="col-lg-12 col-md-12">
        <?php endif; ?>
            <div class="p-block">
                <div>
                    <h1 id="post-title" class="mb-0 puock-text t-xxl">随机阅读</h1>
                </div>
                <div class="mt20 puock-text entry-content show-link-icon">
                    <div class="text-center">
                        <div class="mb-4">
                            <i class="fa fa-random fa-3x text-primary mb-3"></i>
                            <h3>正在为您随机选择一篇文章...</h3>
                            <p class="text-muted">请稍候，正在跳转中...</p>
                        </div>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->options->showsidebar): ?>    
        <?php $this->need('sidebar.php'); ?>
        <?php endif; ?>
    </div>
</div>

<script>
// 立即执行的跳转函数
function performRandomRedirect() {
    setTimeout(function() {
        <?php if ($randomPostUrl): ?>
            // 跳转到随机文章
            window.location.href = '<?php echo $randomPostUrl; ?>';
        <?php else: ?>
            // 如果没有文章，跳转到首页
            window.location.href = '<?php $this->options->siteUrl(); ?>';
        <?php endif; ?>
    }, 1500);
}

// 在 DOMContentLoaded 和页面加载完成后都执行
document.addEventListener('DOMContentLoaded', performRandomRedirect);
window.addEventListener('load', performRandomRedirect);

// 立即执行一次，确保在 PJAX 模式下也能工作
performRandomRedirect();
</script>

<?php $this->need('footer.php'); ?>