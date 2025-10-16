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
            // 使用 Typecho 路由系统生成正确的永久链接
            if (class_exists('\\Typecho\\Router')) {
                // Typecho 1.3.0 新版本
                $permalink = \Typecho\Router::url('post', $result, Helper::options()->index);
            } else {
                // 旧版本 Typecho
                $permalink = Typecho_Router::url('post', $result, Helper::options()->index);
            }
            return $permalink;
        }
    }
    
    return false;
}

// 获取随机文章链接
$randomPostUrl = getRandomPost();

// 直接重定向，实现无感跳转
if ($randomPostUrl) {
    // 使用 302 临时重定向，避免缓存
    header('Location: ' . $randomPostUrl, true, 302);
    exit;
} else {
    // 如果没有文章，重定向到首页
    header('Location: ' . $this->options->siteUrl, true, 302);
    exit;
}
?>