<?php
/**
 * 随机阅读
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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
        $this->response->redirect($target['permalink'], 307);
    }
}

// 如果没有找到文章，重定向到首页
$this->response->redirect($this->options->siteUrl, 307);
?>