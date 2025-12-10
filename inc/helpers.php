<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 全部标签按字母书序排列
 */
// 引入 Composer 自动加载
require __DIR__ . '/vendor/autoload.php';
use Overtrue\Pinyin\Pinyin;

function getFirstChar($str) {
    if (empty($str)) return '#';

    $pinyin = new Pinyin();
    $firstChar = mb_substr($str, 0, 1, 'UTF-8');

    // 数字
    if (is_numeric($firstChar)) {
        return '0';
    }

    // 英文字母
    if (preg_match('/^[a-zA-Z]$/', $firstChar)) {
        return strtoupper($firstChar);
    }

    // 中文转拼音首字母
    $abbr = $pinyin->abbr($firstChar, '');
    return strtoupper($abbr[0] ?? '#');
}

/**
 * 判断是否包含index.php
 */
function get_correct_url($path) {
    // 获取当前请求的URI
    $requestUri = $_SERVER['REQUEST_URI'];
    
    // 检查是否包含index.php
    $isIndexPhp = strpos($requestUri, '/index.php/') !== false;
    
    // 获取站点URL
    $siteUrl = Helper::options()->siteUrl;
    
    // 如果是/index.php/结构
    if ($isIndexPhp) {
        return $siteUrl . 'index.php' . $path;
    }
    
    return $siteUrl . ltrim($path, '/');
}

/**
 * 友好时间显示函数
 * @param $timestamp
 * @return string
 */
function friendly_date($timestamp) {
    $time = is_numeric($timestamp) ? $timestamp : strtotime($timestamp);
    $diff = time() - $time;
    if ($diff < 60) {
        return '刚刚';
    } elseif ($diff < 3600) {
        return floor($diff / 60) . '分钟前';
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . '小时前';
    } elseif ($diff < 2592000) {
        return floor($diff / 86400) . '天前';
    } elseif ($diff < 31536000) {
        return floor($diff / 2592000) . '月前';
    } else {
        return date('Y-m-d H:i:s', $time);
    }
}

/**
 * 关闭评论反垃圾保护
 * 评论层级突破999
 * 关闭检查评论来源URL与文章链接是否一致判断
 * 最新评论显示在前
 */
function themeInit($archive)
{
    Helper::options()->commentsAntiSpam = false; 
    Helper::options()->commentsMaxNestingLevels = 999;
    Helper::options()->commentsOrder = 'DESC';
    Helper::options()->commentsCheckReferer = false;
}