<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

// AJAX 处理函数
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['likeup']) && isset($_POST['cid'])) {
    $cid = intval($_POST['cid']);
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    
    // 确保likes字段存在
    if (!array_key_exists('likes', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `likes` INT(10) DEFAULT 0;');
    }
    
    $row = $db->fetchRow($db->select('likes')->from('table.contents')->where('cid = ?', $cid));
    if ($row) {
        $likes = Typecho_Cookie::get('extend_contents_likes');
        $likesArr = $likes ? explode(',', $likes) : [];
        if (!in_array($cid, $likesArr)) {
            // 更新点赞数
            $currentLikes = isset($row['likes']) ? (int)$row['likes'] : 0;
            $newLikes = $currentLikes + 1;
            $db->query($db->update('table.contents')->rows(['likes' => $newLikes])->where('cid = ?', $cid));
            $likesArr[] = $cid;
            Typecho_Cookie::set('extend_contents_likes', implode(',', $likesArr));
            echo json_encode(['success' => true, 'likes' => $newLikes]);
        } else {
            $currentLikes = isset($row['likes']) ? $row['likes'] : 0;
            echo json_encode(['success' => false, 'likes' => $currentLikes, 'msg' => '已点赞']);
        }
    } else {
        echo json_encode(['success' => false, 'likes' => 0, 'msg' => '文章ID错误']);
    }
    exit;
}
