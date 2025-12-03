<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/** 头像镜像加速全局设置
 * @param $email
 * @param $size
 * @param $default
 * @return string
*/
$options = Typecho_Widget::widget('Widget_Options');
$gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);

/*
* 文章浏览数统计
*/
function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $currentViews = isset($row['views']) ? (int)$row['views'] : 0;
            $db->query($db->update('table.contents')->rows(array('views' => $currentViews + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'] ?? 0;
}

/*
* 点赞数统计
*/
// 点赞显示函数
function get_post_like($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('likes', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `likes` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('likes')->from('table.contents')->where('cid = ?', $cid));
    echo $row['likes'] ?? 0;
}

/**
 * 随机封面
 */
function getPostCover($content, $cid, $fields = null) {
    // 优先使用自定义封面字段
    if ($fields && !empty($fields->cover)) {
        return $fields->cover;
    }
    // 从原始内容中提取第一张图片（不管src是什么）
    if (preg_match('/<img[^>]+src=["\']([^"\']+\.(?:jpg|jpeg|png|webp))["\'][^>]*>/i', $content, $matches)) {
        return $matches[1];
    }
    // 没有图片则用随机封面
    $coverNumber = ($cid % 8) + 1;
    return Helper::options()->themeUrl . '/assets/img/random/' . $coverNumber . '.jpg';
}
