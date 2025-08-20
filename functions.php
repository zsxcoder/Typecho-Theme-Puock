<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('建议尺寸 100px * 100px,不填写则使用站点标题'));
    $form->addInput($logoUrl);
    $icoUrl = new Typecho_Widget_Helper_Form_Element_Text('icoUrl', NULL, NULL, _t('站点 Favicon 地址'), _t('建议尺寸 16px * 16px,不填写则使用默认图标'));
    $form->addInput($icoUrl);
    $primaryColor = new Typecho_Widget_Helper_Form_Element_Text('primaryColor', NULL, NULL, _t('主题主色调'), _t('默认浅蓝色 <b style=color:red>#A7E6F4</b> 常见的<a href="https://tool.imsun.org/" target="_blank">颜色选择器</a>'));
    $form->addInput($primaryColor);
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL, NULL, _t('置顶文章'), _t('填入文章的cid,多个cid以`|`符号隔开'));
    $form->addInput($sticky);
    $ICP = new Typecho_Widget_Helper_Form_Element_Text('ICP', NULL, NULL, _t('ICP 备案号'), _t('展示网站备案ICP号'));
    $form->addInput($ICP);
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, NULL, _t('个人信息背景图片地址'), _t('用于个人信息展示的背景图片'));
    $form->addInput($bgUrl);
    $cnavatar = new Typecho_Widget_Helper_Form_Element_Text('cnavatar', NULL, NULL, _t('Gravatar镜像'), _t('默认使用https://cravatar.cn/avatar/'));
    $form->addInput($cnavatar);
    $listmodel = new Typecho_Widget_Helper_Form_Element_Radio('listmodel',
    array('0'=> _t('卡片模式'), '1'=> _t('列表模式')),'0', _t('列表模式'));
    $form->addInput($listmodel);
    $pageprev = new Typecho_Widget_Helper_Form_Element_Radio('pageprev',
    array('0'=> _t('不显示翻页页码'), '1'=> _t('显示页码')),'0', _t('首页文章列表页码'));
    $form->addInput($pageprev);
    $cmsmodel = new Typecho_Widget_Helper_Form_Element_Radio('cmsmodel',
    array('0'=> _t('博客模式'), '1'=> _t('CMS模式')),'0', _t('显示模式'));
    $form->addInput($cmsmodel);
    $friendlink = new Typecho_Widget_Helper_Form_Element_Radio('friendlink',
    array('0'=> _t('关闭'), '1'=> _t('开启')),
    '0', _t('首页友情链接'), _t('选择"开启"在首页显示友情链接。开启前请安装"Links"插件。链接分类需设置为<b>home</b>，默认关闭'));
    $form->addInput($friendlink);
    $social = new Typecho_Widget_Helper_Form_Element_Radio('social',
    array('0'=> _t('关闭'), '1'=> _t('开启')),
    '0', _t('社交分享显示'), _t('选择"开启"在文章页面显示社交分享。需要搭配插件使用,默认关闭'));
    $form->addInput($social);
    $gonggao = new Typecho_Widget_Helper_Form_Element_Textarea('gonggao', NULL, NULL, _t('站点公告'), _t('<b style=color:red>使用格式: </b><b>标题|链接|图标</b><br>多条公告回车分隔.链接和图标可以为空.图标使用Font Awesome,如: fa-regular fa-bell'));
    $form->addInput($gonggao);
    $adlisttop = new Typecho_Widget_Helper_Form_Element_Textarea('adlisttop', NULL, NULL, _t('文章列表上方广告位'), _t('支持HTML'));
    $form->addInput($adlisttop);
    $adlistfoot = new Typecho_Widget_Helper_Form_Element_Textarea('adlistfoot', NULL, NULL, _t('文章列表下方广告位'), _t('支持HTML'));
    $form->addInput($adlistfoot);
    $articletop = new Typecho_Widget_Helper_Form_Element_Textarea('articletop', NULL, NULL, _t('文章页顶部广告位'), _t('支持HTML'));
    $form->addInput($articletop);
    $articlemid = new Typecho_Widget_Helper_Form_Element_Textarea('articlemid', NULL, NULL, _t('文章页中部广告位'), _t('支持HTML'));
    $form->addInput($articlemid);
    $articlefoot = new Typecho_Widget_Helper_Form_Element_Textarea('articlefoot', NULL, NULL, _t('文章页底部广告位'), _t('支持HTML'));
    $form->addInput($articlefoot);
    $addhead = new Typecho_Widget_Helper_Form_Element_Textarea('addhead', NULL, '<link rel="stylesheet" href="https://cdnjs.imsun.org/lxgw-wenkai-screen-webfont/style.css"></link>
<style>* {font-family: -apple-system, BlinkMacSystemFont,"LXGW WenKai Screen", sans-serif;}</style>', _t('网站验证代码'), _t('若开启无刷新加载，请在标签上加上data-instant属性'));
    $form->addInput($addhead);
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, '<script async defer src="https://0tz.top/tracker.js" data-website-id="Puock"></script>', _t('网站统计代码'), _t('支持HTML'));
    $form->addInput($tongji);
    $footerinfo = new Typecho_Widget_Helper_Form_Element_Textarea('footerinfo', NULL, '<a href="/feed" target="_blank" title="RSS订阅"><i class="fa-solid fa-rss fa-2x"></i></a>
<a href="https://jiong.us/@sun" target="_blank" title="Mastodon"><i class="fa-brands fa-mastodon fa-2x"></i></a>
<a href="https://discord.gg/RUUcPEQKNt" target="_blank" title="Discord"><i class="fa-brands fa-discord fa-2x"></i></a>
<a href="https://t.me/imsunpw" target="_blank" title="Telegram"><i class="fa-brands fa-telegram fa-2x"></i></a>
<a href="mailto:imsunpw@gmail.com" target="_blank" title="Email"><i class="fa-solid fa-envelope fa-2x"></i></a>
<a href="/sitemap.xml" target="_blank" title="Sitemap"><i class="fa-solid fa-sitemap fa-2x"></i></a>', _t('底部关于我们'), _t('支持HTML'));
    $form->addInput($footerinfo);
    $footercopyright = new Typecho_Widget_Helper_Form_Element_Textarea('footercopyright', NULL, '<b>版权所有 转载请注明出处</b>', _t('底部版权信息'), _t('支持HTML'));
    $form->addInput($footercopyright);
    $showsidebar = new Typecho_Widget_Helper_Form_Element_Radio('showsidebar',
    array('0'=> _t('关闭'), '1'=> _t('显示')),
    '0', _t('全局侧边栏显示'), _t('<p style=color:red>注意!</p>如果选择关闭侧边栏则下方的侧边栏显示设置将无效'));
    $form->addInput($showsidebar);
    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowSearch'         => _t('显示搜索框'),
            'ShowAdmin'          => _t('显示作者信息'),
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowHotPosts'       => _t('显示热门文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowTags'           => _t('显示标签云')
        ],
        ['ShowSearch', 'ShowAdmin', 'ShowRecentPosts', 'ShowHotPosts', 'ShowRecentComments', 'ShowTags'],
        _t('侧边栏显示')
    );
    $form->addInput($sidebarBlock->multiMode());
}

function themeFields($layout) {
    $summary= new Typecho_Widget_Helper_Form_Element_Textarea('summary', NULL, NULL, _t('文章摘要'), _t('自定义摘要'));
    $layout->addItem($summary);
    $cover= new Typecho_Widget_Helper_Form_Element_Text('cover', NULL, NULL, _t('文章封面'), _t('自定义文章封面'));
    $layout->addItem($cover);
}

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
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'];
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
            $newLikes = intval($row['likes']) + 1;
            $db->query($db->update('table.contents')->rows(['likes' => $newLikes])->where('cid = ?', $cid));
            $likesArr[] = $cid;
            Typecho_Cookie::set('extend_contents_likes', implode(',', $likesArr));
            echo json_encode(['success' => true, 'likes' => $newLikes]);
        } else {
            echo json_encode(['success' => false, 'likes' => $row['likes'], 'msg' => '已点赞']);
        }
    } else {
        echo json_encode(['success' => false, 'likes' => 0, 'msg' => '文章ID错误']);
    }
    exit;
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

 /**
 * 获取所有评论者信息的函数
 */
function getAllCommenters() {
    $db = Typecho_Db::get();
    $commenters = array();
    
    $isSqlite = strpos(strtolower(get_class($db->getAdapter())), 'sqlite') !== false;
    if ($isSqlite) {
        // SQLite 不支持 ANY_VALUE
        $query = $db->select('author', 'mail', 'COUNT(*) as comment_count', 'url')
            ->from('table.comments')
            ->where('status = ?', 'approved')
            ->where('authorId != ?', 1)
            ->group('mail')
            ->order('comment_count', Typecho_Db::SORT_DESC);
    } else {
        // MySQL 用 ANY_VALUE 兼容 ONLY_FULL_GROUP_BY
        $query = $db->select(
            'ANY_VALUE(author) as author',
            'mail',
            'COUNT(*) as comment_count',
            'ANY_VALUE(url) as url'
        )
        ->from('table.comments')
        ->where('authorId != ?', 1)
        ->where('status = ?', 'approved')
        ->group('mail')
        ->order('comment_count', Typecho_Db::SORT_DESC);
    }

    $rows = $db->fetchAll($query);
    
    // 获取 Gravatar 镜像设置
    $cnavatar = Helper::options()->cnavatar ? Helper::options()->cnavatar : 'https://cravatar.cn/avatar/';
    
    foreach ($rows as $row) {
        $email_hash = md5(strtolower(trim($row['mail'])));
        $avatar_url = rtrim($cnavatar, '/') . '/' . $email_hash . '?s=50&d=mp';
        
        $commenters[] = array(
            'nickname' => $row['author'],
            'email' => $row['mail'],
            'url' => $row['url'],
            'avatar' => $avatar_url,
            'comment_count' => $row['comment_count']
        );
    }
    
    return $commenters;
}

/**
 * 获取IP归属地
 */
// 加载 XdbSearcher 类
require_once __DIR__ . '/ip2region/XdbSearcher.php';

// 单例方式加载 ip2region.xdb 到内存
function getIp2regionSearcher() {
    static $searcher = null;
    if ($searcher === null) {
        $dbPath = __DIR__ . '/ip2region/ip2region.xdb';
        $cBuff = XdbSearcher::loadContentFromFile($dbPath);
        if ($cBuff === null) {
            error_log("无法加载 ip2region.xdb");
            return null;
        }
        try {
            $searcher = XdbSearcher::newWithBuffer($cBuff);
        } catch (Exception $e) {
            error_log("创建 ip2region searcher 失败: " . $e->getMessage());
            return null;
        }
    }
    return $searcher;
}

/**
 * 格式化 IP 归属地
 *
 * @param string $region 归属地字符串
 * @return string 格式化后的归属地
 */
function format_ip_region($region) {
    // 分割字符串
    $parts = explode('|', $region);

    // 去除为 0 或 空字符串的部分
    $parts = array_filter($parts, function($item) {
        return $item !== '0' && $item !== '';
    });

    // 如果第一个元素是"中国"，则移除
    if (isset($parts[0]) && $parts[0] === '中国') {
        array_shift($parts);
    }

    // 重新拼接
    return implode('', $parts);
}

// 通过 IP 获取归属地
function get_ip_region($ip) {
        // 检查是否是 IPv6 地址
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return 'IPv6';
    }
        // 检查是否是内网IP
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return '内网IP';
    }
    
    $searcher = getIp2regionSearcher();
    if (!$searcher) return '未知';
    $region = $searcher->search($ip);
    if ($region === null) return '未知';
    return format_ip_region($region);
}

/**
 * 浏览器和设备信息
 *
 * @param string $userAgent 用户代理
 * @return string[]
 */
function getBrowsersInfo($userAgent) {
    $deviceInfo = [
        "system" => "",
        "systemVersion" => "",
        "browser" => "",
        "version" => "",
        "device" => "PC"
    ];

    $match = [
        // 浏览器 - 国外浏览器
        "Safari" => strstr($userAgent, 'Safari') !== false,
        "Chrome" => strstr($userAgent, 'Chrome') !== false || strstr($userAgent, 'CriOS') !== false,
        "IE" => strstr($userAgent, 'MSIE') !== false || strstr($userAgent, 'Trident') !== false,
        "Edge" => strstr($userAgent, 'Edge') !== false || strstr($userAgent, 'Edg/') !== false || strstr($userAgent, 'EdgA') !== false || strstr($userAgent, 'EdgiOS') !== false,
        "Firefox" => strstr($userAgent, 'Firefox') !== false || strstr($userAgent, 'FxiOS') !== false,
        "Firefox Focus" => strstr($userAgent, 'Focus') !== false,
        "Chromium" => strstr($userAgent, 'Chromium') !== false,
        "Opera" => strstr($userAgent, 'Opera') !== false || strstr($userAgent, 'OPR') !== false,
        "Vivaldi" => strstr($userAgent, 'Vivaldi') !== false,
        "Yandex" => strstr($userAgent, 'YaBrowser') !== false,
        "Arora" => strstr($userAgent, 'Arora') !== false,
        "Lunascape" => strstr($userAgent, 'Lunascape') !== false,
        "QupZilla" => strstr($userAgent, 'QupZilla') !== false,
        "Coc Coc" => strstr($userAgent, 'coc_coc_browser') !== false,
        "Kindle" => strstr($userAgent, 'Kindle') !== false || strstr($userAgent, 'Silk/') !== false,
        "Iceweasel" => strstr($userAgent, 'Iceweasel') !== false,
        "Konqueror" => strstr($userAgent, 'Konqueror') !== false,
        "Iceape" => strstr($userAgent, 'Iceape') !== false,
        "SeaMonkey" => strstr($userAgent, 'SeaMonkey') !== false,
        "Epiphany" => strstr($userAgent, 'Epiphany') !== false,
        // 浏览器 - 国内浏览器
        "360" => strstr($userAgent, 'QihooBrowser') !== false || strstr($userAgent, 'QHBrowser') !== false,
        "360EE" => strstr($userAgent, '360EE') !== false,
        "360SE" => strstr($userAgent, '360SE') !== false,
        "UC" => strstr($userAgent, 'UCBrowser') !== false || strstr($userAgent, ' UBrowser') !== false || strstr($userAgent, 'UCWEB') !== false,
        "QQBrowser" => strstr($userAgent, 'QQBrowser') !== false,
        "QQ" => strstr($userAgent, 'QQ/') !== false,
        "Baidu" => strstr($userAgent, 'Baidu') !== false || strstr($userAgent, 'BIDUBrowser') !== false || strstr($userAgent, 'baidubrowser') !== false || strstr($userAgent, 'baiduboxapp') !== false || strstr($userAgent, 'BaiduHD') !== false,
        "Maxthon" => strstr($userAgent, 'Maxthon') !== false,
        "Sogou" => strstr($userAgent, 'MetaSr') !== false || strstr($userAgent, 'Sogou') !== false,
        "Liebao" => strstr($userAgent, 'LBBROWSER') !== false || strstr($userAgent, 'LieBaoFast') !== false,
        "2345Explorer" => strstr($userAgent, '2345Explorer') !== false || strstr($userAgent, 'Mb2345Browser') !== false || strstr($userAgent, '2345chrome') !== false,
        "115Browser" => strstr($userAgent, '115Browser') !== false,
        "TheWorld" => strstr($userAgent, 'TheWorld') !== false,
        "Quark" => strstr($userAgent, 'Quark') !== false,
        "Qiyu" => strstr($userAgent, 'Qiyu') !== false,
        // 浏览器 - 手机厂商
        "XiaoMi" => strstr($userAgent, 'MiuiBrowser') !== false,
        "Huawei" => strstr($userAgent, 'HuaweiBrowser') !== false || strstr($userAgent, 'HUAWEI/') !== false || strstr($userAgent, 'HONOR') !== false || strstr($userAgent, 'HBPC/') !== false,
        "Vivo" => strstr($userAgent, 'VivoBrowser') !== false,
        "OPPO" => strstr($userAgent, 'HeyTapBrowser') !== false,
        // 浏览器 - 客户端
        "Wechat" => strstr($userAgent, 'MicroMessenger') !== false,
        "WechatWork" => strstr($userAgent, 'wxwork/') !== false,
        "Taobao" => strstr($userAgent, 'AliApp(TB') !== false,
        "Alipay" => strstr($userAgent, 'AliApp(AP') !== false,
        "Weibo" => strstr($userAgent, 'Weibo') !== false,
        "Douban" => strstr($userAgent, 'com.douban.frodo') !== false,
        "Suning" => strstr($userAgent, 'SNEBUY-APP') !== false,
        "iQiYi" => strstr($userAgent, 'IqiyiApp') !== false,
        "DingTalk" => strstr($userAgent, 'DingTalk') !== false,
        "Douyin" => strstr($userAgent, 'aweme') !== false,
        // 系统或平台
        "Windows" => strstr($userAgent, 'Windows') !== false,
        "Linux" => strstr($userAgent, 'Linux') !== false || strstr($userAgent, 'X11') !== false,
        "Mac OS" => strstr($userAgent, 'Macintosh') !== false,
        "Android" => strstr($userAgent, 'Android') !== false || strstr($userAgent, 'Adr') !== false,
        "HarmonyOS" => strstr($userAgent, 'HarmonyOS') !== false,
        "Ubuntu" => strstr($userAgent, 'Ubuntu') !== false,
        "FreeBSD" => strstr($userAgent, 'FreeBSD') !== false,
        "Debian" => strstr($userAgent, 'Debian') !== false,
        "Windows Phone" => strstr($userAgent, 'IEMobile') !== false || strstr($userAgent, 'Windows Phone') !== false,
        "BlackBerry" => strstr($userAgent, 'BlackBerry') !== false || strstr($userAgent, 'RIM') !== false,
        "MeeGo" => strstr($userAgent, 'MeeGo') !== false,
        "Symbian" => strstr($userAgent, 'Symbian') !== false,
        "iOS" => strstr($userAgent, 'like Mac OS X') !== false,
        "Chrome OS" => strstr($userAgent, 'CrOS') !== false,
        "WebOS" => strstr($userAgent, 'hpwOS') !== false,
        // 设备
        "Mobile" => strstr($userAgent, 'Mobi') !== false || strstr($userAgent, 'iPh') !== false || strstr($userAgent, '480') !== false,
        "Tablet" => strstr($userAgent, 'Tablet') !== false || strstr($userAgent, 'Pad') !== false || strstr($userAgent, 'Nexus 7') !== false,
    ];

    // 部分修正
    if ($match['Baidu'] && $match['Opera']) $match['Baidu'] = false;
    if ($match['iOS']) $match['Safari'] = true;

    // 基本信息
    $baseInfo = [
        "browser" => [
            'Safari', 'Chrome', 'Edge', 'IE', 'Firefox', 'Firefox Focus', 'Chromium',
            'Opera', 'Vivaldi', 'Yandex', 'Arora', 'Lunascape', 'QupZilla', 'Coc Coc',
            'Kindle', 'Iceweasel', 'Konqueror', 'Iceape', 'SeaMonkey', 'Epiphany', 'XiaoMi',
            'Vivo', 'OPPO', '360', '360SE', '360EE', 'UC', 'QQBrowser', 'QQ', 'Huawei', 'Baidu',
            'Maxthon', 'Sogou', 'Liebao', '2345Explorer', '115Browser', 'TheWorld', 'Quark', 'Qiyu',
            'Wechat', 'WechatWork', 'Taobao', 'Alipay', 'Weibo', 'Douban', 'Suning', 'iQiYi', 'DingTalk', 'Douyin'
        ],
        "system" => [
            'Windows', 'Linux', 'Mac OS', 'Android', 'HarmonyOS', 'Ubuntu',
            'FreeBSD', 'Debian', 'iOS', 'Windows Phone', 'BlackBerry', 'MeeGo',
            'Symbian', 'Chrome OS', 'WebOS'
        ],
        "device" => ['Mobile', 'Tablet'],
    ];

    foreach ($baseInfo as $k => $v) {
        foreach ($v as $xv) {
            if ($match[$xv]) $deviceInfo[$k] = $xv;
        }
    }

    // 操作系统版本信息
    $windowsVersion = [
        '6.3' => '8.1',
        '6.2' => '8',
        '6.1' => '7',
        '6.0' => 'Vista',
        '5.2' => 'XP',
        '5.1' => 'XP',
        '5.0' => '2000',
    ];

    // Extract Windows NT version and build number
    if (preg_match("/\(Windows NT ([\d.]+)(?:;[^)]*Build\/(\d+))?(?:;[^)]*)?\)/i", $userAgent, $matches)) {
        $ntVersion = $matches[1];
        $buildNumber = isset($matches[2]) ? (int)$matches[2] : 0;

        if ($ntVersion === '10.0') {
            // Check build number for Windows 11
            if ($buildNumber >= 22000) {
                $deviceInfo['systemVersion'] = '11';
            } else {
                // Fallback heuristic: Check Edge version (Windows 11 requires Edge >= 91)
                if ($deviceInfo['browser'] === 'Edge' && preg_match("/Edg\/([\d.]+)/", $userAgent, $edgeMatch)) {
                    $edgeVersion = (float)$edgeMatch[1];
                    if ($edgeVersion >= 91) {
                        $deviceInfo['systemVersion'] = '11'; // Assume Windows 11 for modern Edge
                    } else {
                        $deviceInfo['systemVersion'] = '10';
                    }
                } else {
                    $deviceInfo['systemVersion'] = '10';
                    // Log ambiguous case for debugging
                    error_log("Ambiguous Windows version (NT 10.0, no build number): $userAgent");
                }
            }
        } else {
            $deviceInfo['systemVersion'] = $windowsVersion[$ntVersion] ?? $ntVersion;
        }
    }

    $HarmonyOSVersion = [
        10 => "2",
        12 => "3"
    ];
    $systemVersion = [
        "Windows" => $deviceInfo['systemVersion'], // Already set above
        "Android" => preg_match("/Android ([\d.]+);/", $userAgent, $matches) ? $matches[1] : '',
        "HarmonyOS" => preg_match("/Android ([\d.]+)[;)]/", $userAgent, $matches) ? ($HarmonyOSVersion[(int)$matches[1]] ?? '') : '',
        "iOS" => preg_match("/OS ([\d_]+) like/", $userAgent, $matches) ? str_replace('_', '.', $matches[1]) : '',
        "Debian" => preg_match("/Debian\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Windows Phone" => preg_match("/Windows Phone( OS)? ([\d.]+);/", $userAgent, $matches) ? $matches[2] : '',
        "Mac OS" => preg_match("/Mac OS X ([\d_]+)/", $userAgent, $matches) ? str_replace('_', '.', $matches[1]) : '',
        "WebOS" => preg_match("/hpwOS\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''
    ];

    if (isset($deviceInfo['system']) && $deviceInfo['system'] !== "" && isset($systemVersion[$deviceInfo['system']])) {
        $deviceInfo['systemVersion'] = $systemVersion[$deviceInfo['system']];
        if ($deviceInfo['systemVersion'] == $userAgent) {
            $deviceInfo['systemVersion'] = '';
        }
    }

    // 浏览器版本信息
    $browsers_360SE = [
        108 => '14.0',
        86 => '13.0',
        78 => '12.0',
        69 => '11.0',
        63 => '10.0',
        55 => '9.1',
        45 => '8.1',
        42 => '8.0',
        31 => '7.0',
        21 => '6.3',
    ];
    $browsers_360EE = [
        95 => '21',
        86 => '13.0',
        78 => '12.0',
        69 => '11.0',
        63 => '9.5',
        55 => '9.0',
        50 => '8.7',
        30 => '7.5',
    ];
    $browsers_liebao = [
        57 => '6.5',
        49 => '6.0',
        46 => '5.9',
        42 => '5.3',
        39 => '5.2',
        34 => '5.0',
        29 => '4.5',
        21 => '4.0'
    ];
    $browsers_2345 = [
        69 => '10.0',
        55 => '9.9',
    ];

    $chromeVersion = preg_match('/Chrome\/([\d]+)/', $userAgent, $matches) ? (int)$matches[1] : 0;

    $browsersVersion = [
        "Safari" => preg_match("/Version\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Chrome" => preg_match("/Chrome\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/CriOS\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''),
        "IE" => preg_match("/MSIE ([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/rv:([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''),
        "Edge" => preg_match("/Edge\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/Edg\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/EdgA\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/EdgiOS\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''))),
        "Firefox" => preg_match("/Firefox\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/FxiOS\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''),
        "Firefox Focus" => preg_match("/Focus\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Chromium" => preg_match("/Chromium\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Opera" => preg_match("/Opera\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/OPR\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''),
        "Vivaldi" => preg_match("/Vivaldi\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Yandex" => preg_match("/YaBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Brave" => preg_match("/Chrome\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Arora" => preg_match("/Arora\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Lunascape" => preg_match("/Lunascape[\/\s]([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "QupZilla" => preg_match("/QupZilla[\/\s]([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Coc Coc" => preg_match("/coc_coc_browser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Kindle" => preg_match("/Version\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Iceweasel" => preg_match("/Iceweasel\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Konqueror" => preg_match("/Konqueror\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Iceape" => preg_match("/Iceape\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "SeaMonkey" => preg_match("/SeaMonkey\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Epiphany" => preg_match("/Epiphany\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "360" => preg_match("/QihooBrowser(HD)?\/([\d.]+)/", $userAgent, $matches) ? $matches[2] : '',
        "Maxthon" => preg_match("/Maxthon\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "QQBrowser" => preg_match("/QQBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "QQ" => preg_match("/QQ\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Baidu" => preg_match("/BIDUBrowser[\s\/]([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/baiduboxapp\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''),
        "UC" => preg_match("/UC?Browser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Sogou" => preg_match("/SE ([\d.X]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/SogouMobileBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : ''),
        "115Browser" => preg_match("/115Browser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "TheWorld" => preg_match("/TheWorld ([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "XiaoMi" => preg_match("/MiuiBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Vivo" => preg_match("/VivoBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "OPPO" => preg_match("/HeyTapBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Quark" => preg_match("/Quark\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Qiyu" => preg_match("/Qiyu\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Wechat" => preg_match("/MicroMessenger\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "WechatWork" => preg_match("/wxwork\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Taobao" => preg_match("/AliApp\(TB\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Alipay" => preg_match("/AliApp\(AP\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Weibo" => preg_match("/weibo__([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Douban" => preg_match("/com.douban.frodo\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Suning" => preg_match("/SNEBUY-APP([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "iQiYi" => preg_match("/IqiyiVersion\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "DingTalk" => preg_match("/DingTalk\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Douyin" => preg_match("/app_version\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '',
        "Huawei" => preg_match("/Version\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/HuaweiBrowser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/HBPC\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : '')),
        "360SE" => isset($browsers_360SE[$chromeVersion]) ? $browsers_360SE[$chromeVersion] : '',
        "360EE" => isset($browsers_360EE[$chromeVersion]) ? $browsers_360EE[$chromeVersion] : '',
        "Liebao" => preg_match("/LieBaoFast\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (isset($browsers_liebao[$chromeVersion]) ? $browsers_liebao[$chromeVersion] : ''),
        "2345Explorer" => preg_match("/2345Explorer\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (preg_match("/Mb2345Browser\/([\d.]+)/", $userAgent, $matches) ? $matches[1] : (isset($browsers_2345[$chromeVersion]) ? $browsers_2345[$chromeVersion] : '')),
    ];

    if (isset($deviceInfo['browser'], $browsersVersion[$deviceInfo['browser']])) {
        $deviceInfo['version'] = $browsersVersion[$deviceInfo['browser']];
        if ($deviceInfo['version'] == $userAgent) {
            $deviceInfo['version'] = '';
        }
    }

    // 修正浏览器版本信息
    if (preg_match('/\S+Browser/', $userAgent, $matches)) {
        $chrome = $matches[0];
        if ($deviceInfo['browser'] == 'Chrome' && $chrome !== 'Chrome') {
            $deviceInfo['browser'] = $chrome;
            if (preg_match('/Browser\/([\d.]+)/', $userAgent, $matches)) {
                $deviceInfo['version'] = $matches[1];
            }
        }
    }

    return $deviceInfo;
}
 
/**
 * 返回符合正则的值
 *
 * @param string $reg 正则
 * @param string $sourceData 源数据
 * @return mixed|void
 */
function pregMatch($reg, $sourceData) {
    if (preg_match($reg, $sourceData, $mat)) {
        return $mat[1] ?? '';
    }
return '';
}

/**
 * 获取设备和浏览器的图标
 * @param array $data 设备信息数组
 * @return array 包含系统和浏览器图标的数组
 */
function getDeviceIcon($data) {
    // 系统图标映射
    $systemIcons = [
        'Windows' => '<i class="fa-brands fa-windows"></i>',
        'Linux' => '<i class="fa-brands fa-linux"></i>',
        'Mac OS' => '<i class="fa-brands fa-apple"></i>', 
        'Android' => '<i class="fa-brands fa-android"></i>',
        'iOS' => '<i class="fa-brands fa-apple"></i>',
        'HarmonyOS' => '<i class="fa fa-mobile"></i>', // HarmonyOS 使用手机图标
        'Chrome OS' => '<i class="fa-brands fa-chrome"></i>',
        '' => '<i class="fa fa-desktop"></i>' // 未知系统使用桌面图标
    ];

    // 浏览器图标映射
    $browserIcons = [
        'Chrome' => '<i class="fa-brands fa-chrome"></i>',
        'Firefox' => '<i class="fa-brands fa-firefox"></i>',
        'Safari' => '<i class="fa-brands fa-safari"></i>',
        'Edge' => '<i class="fa-brands fa-edge"></i>',
        'IE' => '<i class="fa-brands fa-internet-explorer"></i>',
        'Opera' => '<i class="fa-brands fa-opera"></i>',
        'QQ' => '<i class="fa-brands fa-qq"></i>',
        'Wechat' => '<i class="fa-brands fa-weixin"></i>',
        'Weibo' => '<i class="fa-brands fa-weibo"></i>',
        '' => '<i class="fa fa-globe"></i>' // 未知浏览器使用地球图标
    ];

    // 设备类型图标
    $deviceIcons = [
        'Mobile' => 'fa fa-mobile',
        'Tablet' => 'fa fa-tablet',
        'PC' => 'fa fa-desktop'
    ];

    // 获取对应图标，如果没有匹配则使用默认图标
    $systemIcon = $systemIcons[$data['system']] ?? $systemIcons[''];
    $browserIcon = $browserIcons[$data['browser']] ?? $browserIcons[''];
    $deviceIcon = $deviceIcons[$data['device']] ?? $deviceIcons['PC'];

    return [
        'system' => $systemIcon,
        'browser' => $browserIcon,
        'device' => $deviceIcon
    ];
}

/**    
 * 评论者认证等级 + 身份    
 *    
 * @author Chrison    
 * @access public    
 * @param str $email 评论者邮址    
 * @return result     
 */     
function commentApprove($widget, $email = NULL)      
{   
    $result = array(
        "state" => -1,//状态
        "isAuthor" => 0,//是否是博主
        "userLevel" => '',//用户身份或等级名称
        "userDesc" => '',//用户title描述
        "bgColor" => '',//用户身份或等级背景色
        "commentNum" => 0//评论数量
    );
    if (empty($email)) return $result;       
    $result['state'] = 1;   
    if ($widget->authorId == $widget->ownerId) {      
        $result['isAuthor'] = 1;//」
        $result['userLevel'] = '博主';
        $result['userDesc'] = '本站站长';
        $result['bgColor'] = '#FFD67A';
        $result['commentNum'] = 999;
    }  else {
        try {
            //数据库获取
            $db = Typecho_Db::get();
            //获取评论条数
            $commentNumSql = $db->fetchAll($db->select(array('COUNT(cid)'=>'commentNum'))
                ->from('table.comments')
                ->where('mail = ?', $email));
            $commentNum = $commentNumSql[0]['commentNum'];    
            //获取友情链接
            $linkSql = $db->fetchAll($db->select()->from('table.links')
                ->where('user = ?',$email));       
            //等级判定
            if($commentNum==1){
                $result['userLevel'] = '初见 LV.1';
                $result['bgColor'] = '#999999';
                $userDesc = '人生一大步！';
            } else {
                if ($commentNum<10 && $commentNum>1) {
                    $result['userLevel'] = '初识 LV.2';
                    $result['bgColor'] = '#999999';
                }elseif ($commentNum<20 && $commentNum>=10) {
                    $result['userLevel'] = '相识 LV.3';
                    $result['bgColor'] = '#A0DAD0';
                }elseif ($commentNum<40 && $commentNum>=20) {
                    $result['userLevel'] = '熟识 LV.4';
                    $result['bgColor'] = '#A0DAD0';
                }elseif ($commentNum<80 && $commentNum>=40) {
                    $result['userLevel'] = '好友 LV.5';
                    $result['bgColor'] = '#A0DAD0';
                }elseif ($commentNum<160 && $commentNum>=80) {
                    $result['userLevel'] = '知己 LV.6';
                    $result['bgColor'] = '#A0DAD0';
                }elseif ($commentNum>=160) {
                    $result['userLevel'] = '挚友 LV.7';
                    $result['bgColor'] = '#A0DAD0';
                }
                 $userDesc = '您在本站有'.$commentNum.'条留言！'; 
            }
            if($linkSql){
                $result['userLevel'] = '「博友」';
                $result['bgColor'] = '#21b9bb';
                $userDesc = '🔗'.$linkSql[0]['description'].'&#10;✌️'.$userDesc;
            }
            
            $result['userDesc'] = $userDesc;
            $result['commentNum'] = $commentNum;
        } catch (Exception $e) {
            error_log('Error in commentApprove function: ' . $e->getMessage());
            // 设置默认值
            $result['userLevel'] = '「访客」';
            $result['bgColor'] = '#999999';
            $result['userDesc'] = '欢迎留言';
            $result['commentNum'] = 0;
        }
    } 
    return $result;
}

/**
 * 子评论加上@用户名
 * 
 * @param int $coid 评论ID
 * @return string 评论的永久链接
 */
function getPermalinkFromCoid($coid) {
	$db = Typecho_Db::get();
	$row = $db->fetchRow($db->select('author')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
	if (empty($row)) return '';
	return '<a href="#comment-'.$coid.'" class="c-sub">@'.$row['author'].'</a>';
}

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
 * Typecho后台附件增强：图片预览、批量插入、保留官方删除按钮与逻辑
 * @author jkjoy
 * @date 2025-04-25
 */
Typecho_Plugin::factory('admin/write-post.php')->bottom = array('AttachmentHelper', 'addEnhancedFeatures');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('AttachmentHelper', 'addEnhancedFeatures');

class AttachmentHelper {
    public static function addEnhancedFeatures() {
        ?>
        <style>
        #file-list{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:15px;padding:15px;list-style:none;margin:0;}
        #file-list li{position:relative;border:1px solid #e0e0e0;border-radius:4px;padding:10px;background:#fff;transition:all 0.3s ease;list-style:none;margin:0;}
        #file-list li:hover{box-shadow:0 2px 8px rgba(0,0,0,0.1);}
        #file-list li.loading{opacity:0.7;pointer-events:none;}
        .att-enhanced-thumb{position:relative;width:100%;height:150px;margin-bottom:8px;background:#f5f5f5;overflow:hidden;border-radius:3px;display:flex;align-items:center;justify-content:center;}
        .att-enhanced-thumb img{width:100%;height:100%;object-fit:contain;display:block;}
        .att-enhanced-thumb .file-icon{display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-size:40px;color:#999;}
        .att-enhanced-finfo{padding:5px 0;}
        .att-enhanced-fname{font-size:13px;margin-bottom:5px;word-break:break-all;color:#333;}
        .att-enhanced-fsize{font-size:12px;color:#999;}
        .att-enhanced-factions{display:flex;justify-content:space-between;align-items:center;margin-top:8px;gap:8px;}
        .att-enhanced-factions button{flex:1;padding:4px 8px;border:none;border-radius:3px;background:#e0e0e0;color:#333;cursor:pointer;font-size:12px;transition:all 0.2s ease;}
        .att-enhanced-factions button:hover{background:#d0d0d0;}
        .att-enhanced-factions .btn-insert{background:#467B96;color:white;}
        .att-enhanced-factions .btn-insert:hover{background:#3c6a81;}
        .att-enhanced-checkbox{position:absolute;top:5px;right:5px;z-index:2;width:18px;height:18px;cursor:pointer;}
        .batch-actions{margin:15px;display:flex;gap:10px;align-items:center;}
        .btn-batch{padding:8px 15px;border-radius:4px;border:none;cursor:pointer;transition:all 0.3s ease;font-size:10px;display:inline-flex;align-items:center;justify-content:center;}
        .btn-batch.primary{background:#467B96;color:white;}
        .btn-batch.primary:hover{background:#3c6a81;}
        .btn-batch.secondary{background:#e0e0e0;color:#333;}
        .btn-batch.secondary:hover{background:#d0d0d0;}
        .upload-progress{position:absolute;bottom:0;left:0;width:100%;height:2px;background:#467B96;transition:width 0.3s ease;}
        </style>
        <script>
        $(document).ready(function() {
            // 批量操作UI按钮
            var $batchActions = $('<div class="batch-actions"></div>')
                .append('<button type="button" class="btn-batch primary" id="batch-insert">批量插入</button>')
                .append('<button type="button" class="btn-batch secondary" id="select-all">全选</button>')
                .append('<button type="button" class="btn-batch secondary" id="unselect-all">取消全选</button>');
            $('#file-list').before($batchActions);

            // 插入格式
            Typecho.insertFileToEditor = function(title, url, isImage) {
                var textarea = $('#text'), 
                    sel = textarea.getSelection(),
                    insertContent = isImage ? '![' + title + '](' + url + ')' : 
                                            '[' + title + '](' + url + ')';
                textarea.replaceSelection(insertContent + '\n');
                textarea.focus();
            };

            // 批量插入
            $('#batch-insert').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var content = '';
                $('#file-list li').each(function() {
                    if ($(this).find('.att-enhanced-checkbox').is(':checked')) {
                        var $li = $(this);
                        var title = $li.find('.att-enhanced-fname').text();
                        var url = $li.data('url');
                        var isImage = $li.data('image') == 1;
                        content += isImage ? '![' + title + '](' + url + ')\n' : '[' + title + '](' + url + ')\n';
                    }
                });
                if (content) {
                    var textarea = $('#text');
                    var pos = textarea.getSelection();
                    var newContent = textarea.val();
                    newContent = newContent.substring(0, pos.start) + content + newContent.substring(pos.end);
                    textarea.val(newContent);
                    textarea.focus();
                }
            });

            $('#select-all').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#file-list .att-enhanced-checkbox').prop('checked', true);
                return false;
            });
            $('#unselect-all').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#file-list .att-enhanced-checkbox').prop('checked', false);
                return false;
            });

            // 防止复选框冒泡
            $(document).on('click', '.att-enhanced-checkbox', function(e) {e.stopPropagation();});

            // 增强文件列表样式，但不破坏li原结构和官方按钮
            function enhanceFileList() {
                $('#file-list li').each(function() {
                    var $li = $(this);
                    if ($li.hasClass('att-enhanced')) return;
                    $li.addClass('att-enhanced');
                    // 只增强，不清空li
                    // 增加批量选择框
                    if ($li.find('.att-enhanced-checkbox').length === 0) {
                        $li.prepend('<input type="checkbox" class="att-enhanced-checkbox" />');
                    }
                    // 增加图片预览（如已有则不重复加）
                    if ($li.find('.att-enhanced-thumb').length === 0) {
                        var url = $li.data('url');
                        var isImage = $li.data('image') == 1;
                        var fileName = $li.find('.insert').text();
                        var $thumbContainer = $('<div class="att-enhanced-thumb"></div>');
                        if (isImage) {
                            var $img = $('<img src="' + url + '" alt="' + fileName + '" />');
                            $img.on('error', function() {
                                $(this).replaceWith('<div class="file-icon">🖼️</div>');
                            });
                            $thumbContainer.append($img);
                        } else {
                            $thumbContainer.append('<div class="file-icon">📄</div>');
                        }
                        // 插到插入按钮之前
                        $li.find('.insert').before($thumbContainer);
                    }

                });
            }

            // 插入按钮事件
            $(document).on('click', '.btn-insert', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var $li = $(this).closest('li');
                var title = $li.find('.att-enhanced-fname').text();
                Typecho.insertFileToEditor(title, $li.data('url'), $li.data('image') == 1);
            });

            // 上传完成后增强新项
            var originalUploadComplete = Typecho.uploadComplete;
            Typecho.uploadComplete = function(attachment) {
                setTimeout(function() {
                    enhanceFileList();
                }, 200);
                if (typeof originalUploadComplete === 'function') {
                    originalUploadComplete(attachment);
                }
            };

            // 首次增强
            enhanceFileList();
        });
        </script>
        <?php
    }
}

/**
 * 解析表情短代码为图片
 * @param string $content
 * @return string
 */
function parse_smiley_shortcode($content) {
    $smileys = [
        ':?:' => 'doubt.png',
        ':razz:' => 'razz.png',
        ':sad:' => 'sad.png',
        ':evil:' => 'evil.png',
        ':naughty:' => 'naughty.png',
        ':!:' => 'scare.png',
        ':smile:' => 'smile.png',
        ':oops:' => 'oops.png',
        ':neutral:' => 'neutral.png',
        ':cry:' => 'cry.png',
        ':mrgreen:' => 'mrgreen.png',
        ':grin:' => 'grin.png',
        ':eek:' => 'eek.png',
        ':shock:' => 'shock.png',
        ':???:' => 'bz.png',
        ':cool:' => 'cool.png',
        ':lol:' => 'lol.png',
        ':mad:' => 'mad.png',
        ':twisted:' => 'twisted.png',
        ':roll:' => 'roll.png',
        ':wink:' => 'wink.png',
        ':idea:' => 'idea.png',
        ':despise:' => 'despise.png',
        ':celebrate:' => 'celebrate.png',
        ':watermelon:' => 'watermelon.png',
        ':xmas:' => 'xmas.png',
        ':warn:' => 'warn.png',
        ':rainbow:' => 'rainbow.png',
        ':loveyou:' => 'loveyou.png',
        ':love:' => 'love.png',
        ':beer:' => 'beer.png',
    ];
    $themeUrl = Helper::options()->themeUrl . '/assets/img/smiley/';
    foreach ($smileys as $code => $img) {
        $imgTag = '<img class="smiley-img" src="' . $themeUrl . $img . '" alt="' . $code . '" title="表情" style="width:16px;height:16px;vertical-align:middle;" />';
        $content = str_replace($code, $imgTag, $content);
    }
    return $content;
}

/**
 * 短代码实现
 */
function get_article_info($atts)
{
    $default_atts = array('id' => '');
    $atts = array_merge($default_atts, $atts);
    $db = Typecho_Db::get();
    if (!empty($atts['id'])) {
        $post = $db->fetchRow($db->select()->from('table.contents')->where('cid = ?', $atts['id'])->limit(1));
    } else {
        return '请提供文章ID';
    }
    if (!$post) {
        return '未找到文章';
    }
    $post = Typecho_Widget::widget('Widget_Abstract_Contents')->push($post);
    $permalink = $post['permalink'];
    $title = htmlspecialchars($post['title']);
    $summary = get_article_summary($post);

    $output = '<blockquote class="article-quote">';
    $output .= '<div class="t-lg t-line-1">';
    $output .= '<a class="a-link" title="' . $title . '" href="' . $permalink . '" target="_blank">' . $title . '</a>';
    $output .= '</div>';
    $output .= '<div class="t-md c-sub text-2line">' . htmlspecialchars($summary) . '</div>';
    $output .= '</blockquote>';

    return $output;
}
class ContentFilter
{
    /**
     * 过滤内容中的短代码
     *
     * @param string $content 内容
     * @param object $widget 小工具对象
     * @param array $lastResult 上一次结果
     * @return string 处理后的内容
     */
    public static function filterContent($content, $widget, $lastResult)
    {
        // Step 1: 保护代码块
        $codeBlocks = [];
        $content = preg_replace_callback(
            '/```[\s\S]*?```/m', // 匹配 Markdown 代码块（包括多行）
            function ($matches) use (&$codeBlocks) {
                $placeholder = '<!--CODEBLOCK_' . count($codeBlocks) . '-->';
                $codeBlocks[$placeholder] = $matches[0]; // 存储原始代码块内容
                return $placeholder;
            },
            $content
        );

        // Step 2: 执行现有的短代码处理
        // GitHub 短代码替换
        $content = preg_replace_callback('/\[github=([\w\-\.]+\/[\w\-\.]+)\]/i', function($matches) {
            $repo = htmlspecialchars($matches[1]);
            return '<div class="github-card text-center" data-repo="' . $repo . '"><div class="spinner-grow text-primary"></div></div>';
        }, $content);

        $content = preg_replace_callback(
            '#https://github\.com/([\w\-\.]+/[\w\-\.]+)(?=[\s\.,;:!\?\)\]\}\"\'\n]|$)#i',
            function($matches) {
                $repo = htmlspecialchars($matches[1]);
                return '<div class="github-card text-center" data-repo="' . $repo . '"><div class="spinner-grow text-primary"></div></div>';
            },
            $content
        );

        // alert 类短代码
        $alertShortcodes = [
            'success' => 'success',
            'primary' => 'primary',
            'danger'  => 'danger',
            'warning' => 'warning',
            'info'    => 'info',
            'dark'    => 'dark',
        ];
        foreach ($alertShortcodes as $shortcode => $class) {
            $content = preg_replace(
                '/\[' . $shortcode . '\](.*?)\[\/' . $shortcode . '\]/is',
                '<div class="alert alert-' . $class . '">$1</div>',
                $content
            );
        }

        // article 短代码
        $content = preg_replace_callback('/\[article\s+([^\]]+)\]/', function($matches) {
            $atts = self::parse_atts($matches[1]);
            return get_article_info($atts);
        }, $content);

        // 懒加载图片替换
        $themeUrl = Helper::options()->themeUrl;
        $loadSvg = $themeUrl . '/assets/img/load.svg';
        $title = htmlspecialchars($widget->title);
        $content = preg_replace_callback(
            '/<img\s+[^>]*src=["\"]([^"\"]+\.(?:jpg|jpeg|png|webp))["\"][^>]*>/i',
            function($matches) use ($title, $loadSvg) {
                $imgUrl = $matches[1];
                return '<img title="' . $title . '" alt="' . $title . '" decoding="async" data-src="' . $imgUrl . '" data-lazy="true" src="' . $loadSvg . '" />';
            },
            $content
        );

        // collapse 折叠面板短代码
        static $collapseIndex = 0;
        $content = preg_replace_callback(
            '/\[collapse\s+title=(?:\'([^\']*)\'|\"([^\"]*)\")\](.*?)\[\/collapse\]/is',
            function($matches) use (&$collapseIndex) {
                $title = $matches[1] !== '' ? $matches[1] : $matches[2];
                $body = $matches[3];
                $collapseIndex++;
                $uniqid = 'collapse-' . mt_rand(100,999) . '-' . $collapseIndex;
                return '<div class="pk-sc-collapse"><a class="btn btn-primary btn-sm" data-bs-toggle="collapse" href="#' . $uniqid . '" role="button" aria-expanded="false" aria-controls="' . $uniqid . '"><i class="fa fa-angle-up"></i>&nbsp;' . htmlspecialchars($title) . '</a></div><div class="collapse" id="' . $uniqid . '">' . $body . '</div>';
            },
            $content
        );

        // download 短代码
        $content = preg_replace_callback(
            '/\[download\s+file=(?:\'([^\']*)\'|\"([^\"]*)\")\s+size=(?:\'([^\']*)\'|\"([^\"]*)\")\](.*?)\[\/download\]/is',
            function($matches) {
                $file = $matches[1] !== '' ? $matches[1] : $matches[2];
                $size = $matches[3] !== '' ? $matches[3] : $matches[4];
                $url = $matches[5];
                return '<div class="p-block p-down-box">'
                    . "<div class='mb15'><i class='fa fa-file-zipper'></i>&nbsp;<span> 文件名称：" . htmlspecialchars($file) . "</span></div>"
                    . "<div class='mb15'><i class='fa fa-download'></i>&nbsp;<span> 文件大小：" . htmlspecialchars($size) . "</span></div>"
                    . "<div class='mb15'><i class='fa-regular fa-bell'></i>&nbsp;<span> 下载声明：本站部分资源来自于网络收集，若侵犯了你的隐私或版权，请及时联系我们删除有关信息。</span></div>"
                    . "<div><i class='fa fa-link'></i><span> 下载地址：<a href='" . htmlspecialchars($url) . "' target='_blank'>点此下载</a> </span></div></p></div>";
            },
            $content
        );

        // reply 短代码
        $content = preg_replace_callback(
            '/\[reply\](.*?)\[\/reply\]/is',
            function($matches) use ($widget) {
                $show = false;
                if ($widget instanceof Widget_Archive && $widget->is('single')) {
                    $user = Typecho_Widget::widget('Widget_User');
                    $db = Typecho_Db::get();
                    if ($user->hasLogin) {
                        $hasComment = $db->fetchRow($db->select()->from('table.comments')
                            ->where('cid = ?', $widget->cid)
                            ->where('mail = ?', $user->mail)
                            ->where('status = ?', 'approved')
                        );
                        if ($hasComment) $show = true;
                    } else {
                        $hasComment = $db->fetchRow($db->select()->from('table.comments')
                            ->where('cid = ?', $widget->cid)
                            ->where('status = ?', 'approved')
                            ->where('ip = ?', $widget->request->getIp())
                        );
                        if ($hasComment) $show = true;
                    }
                }
                if ($show) {
                    return '<div class="reply-visible">' . $matches[1] . '</div>';
                } else {
                    return "<div class='alert alert-primary alert-outline'><span class='c-sub fs14'><i class='fa-regular fa-eye'></i>&nbsp; 此处含有隐藏内容，请提交评论并审核通过刷新后即可查看！</span></div>";
                }
            },
            $content
        );

        // Step 3: 恢复代码块
        foreach ($codeBlocks as $placeholder => $code) {
            $content = str_replace($placeholder, $code, $content);
        }

        // Step 4: 进行 Markdown 解析
        $content = empty($lastResult) ? $widget->markdown($content) : $lastResult;

        return $content;
    }

    // 解析短代码属性（保持不变）
    private static function parse_atts($text) {
        $atts = array();
        $pattern = '/(\w+)\s*=\s*"([^"]*)"(?:\s|$)|(\w+)\s*=\s*\'([^\']*)\'(?:\s|$)|(\w+)\s*=\s*([^\s\'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|(\S+)(?:\s|$)/';
        $text = preg_replace("/[\x{00a0}\x{200b}]+/u", " ", $text);
        if (preg_match_all($pattern, $text, $match, PREG_SET_ORDER)) {
            foreach ($match as $m) {
                if (!empty($m[1]))
                    $atts[strtolower($m[1])] = stripcslashes($m[2]);
                elseif (!empty($m[3]))
                    $atts[strtolower($m[3])] = stripcslashes($m[4]);
                elseif (!empty($m[5]))
                    $atts[strtolower($m[5])] = stripcslashes($m[6]);
                elseif (isset($m[7]) && strlen($m[7]))
                    $atts[] = stripcslashes($m[7]);
                elseif (isset($m[8]))
                    $atts[] = stripcslashes($m[8]);
            }
        }
        return $atts;
    }
}

// 注册钩子
Typecho_Plugin::factory('Widget_Abstract_Contents')->content = array('ContentFilter', 'filterContent');
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('ContentFilter', 'filterContent');

// 编辑器按钮类
class EditorButton {
    public static function render()
    {
        echo <<<EOF
<style>
#wmd-button-row {
    display: flex;
    flex-wrap: wrap;
    min-height: 40px;
    height: auto !important;
    overflow: visible;
}
#text, .wmd-input {
    margin-top: 0 !important;
}
</style>
<script>
$(document).ready(function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-article-button" title="插入文章引用"><span style="background: none;"><svg t="1687164718203" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4158" width="20" height="20"><path d="M810.666667 213.333333H213.333333c-46.933333 0-85.333333 38.4-85.333333 85.333334v426.666666c0 46.933333 38.4 85.333333 85.333333 85.333334h597.333334c46.933333 0 85.333333-38.4 85.333333-85.333334V298.666667c0-46.933333-38.4-85.333333-85.333333-85.333334z m0 512H213.333333V298.666667h597.333334v426.666666z" p-id="4159"></path><path d="M298.666667 384h426.666666v85.333333H298.666667zM298.666667 554.666667h426.666666v85.333333H298.666667z" p-id="4160"></path></svg></span></li>');
    // 新增github按钮
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-github-button" title="插入GitHub仓库"><span style="background: none;"><svg t="1714380000000" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8888" width="20" height="20"><path d="M512 76C276.6 76 80 272.6 80 508c0 190.2 123.2 351.4 294 408.6 21.4 4 29.2-9.2 29.2-20.4 0-10-0.4-43-0.6-78.2-119.6 26-144.8-57.6-144.8-57.6-19.4-49.2-47.4-62.2-47.4-62.2-38.8-26.6 2.8-26 2.8-26 42.8 3 65.4 44 65.4 44 38.2 65.4 100.2 46.5 124.6 35.6 3.8-27.7 15-46.5 27.2-57.2-95.4-10.8-195.8-47.7-195.8-212.4 0-46.9 16.8-85.3 44.2-115.4-4.4-10.8-19.2-54.2 4.2-113 0 0 36.2-11.6 118.8 44.1 34.4-9.6 71.4-14.4 108.2-14.6 36.8 0.2 73.8 5 108.2 14.6 82.6-55.7 118.8-44.1 118.8-44.1 23.4 58.8 8.6 102.2 4.2 113 27.4 30.1 44.2 68.5 44.2 115.4 0 164.9-100.6 201.5-196.2 212.1 15.4 13.2 29.2 39.2 29.2 79.1 0 57.1-0.5 103.2-0.5 117.3 0 11.3 7.7 24.6 29.4 20.4C820.8 859.4 944 698.2 944 508 944 272.6 747.4 76 512 76z" p-id="8889" fill="#181616"></path></svg></span></li>');

    // alert类按钮
    var alertTypes = [
        {id: 'success', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(100,205,138,1)"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>', label: '成功'},
        {id: 'primary', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(240,187,64,1)"><path d="M11.9996 0.5L16.2256 6.68342L23.4123 8.7918L18.8374 14.7217L19.053 22.2082L11.9996 19.6897L4.94617 22.2082L5.16179 14.7217L0.586914 8.7918L7.7736 6.68342L11.9996 0.5ZM9.99959 12H7.99959C7.99959 14.2091 9.79045 16 11.9996 16C14.1418 16 15.8907 14.316 15.9947 12.1996L15.9996 12H13.9996C13.9996 13.1046 13.1042 14 11.9996 14C10.9452 14 10.0814 13.1841 10.0051 12.1493L9.99959 12Z"></path></svg>', label: '重要'},
        {id: 'danger', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(251,12,12,1)"><path d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z"></path></svg>', label: '危险'},
        {id: 'warning', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M4.00001 20V14C4.00001 9.58172 7.58173 6 12 6C16.4183 6 20 9.58172 20 14V20H21V22H3.00001V20H4.00001ZM6.00001 14H8.00001C8.00001 11.7909 9.79087 10 12 10V8C8.6863 8 6.00001 10.6863 6.00001 14ZM11 2H13V5H11V2ZM19.7782 4.80761L21.1924 6.22183L19.0711 8.34315L17.6569 6.92893L19.7782 4.80761ZM2.80762 6.22183L4.22183 4.80761L6.34315 6.92893L4.92894 8.34315L2.80762 6.22183Z"></path></svg>', label: '警告'},
        {id: 'info', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11V17H13V11H11ZM11 7V9H13V7H11Z"></path></svg>', label: '关于'},
        {id: 'dark', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3Z"></path></svg>', label: '黑色'}
    ];
    alertTypes.forEach(function(type) {
        $('#wmd-button-row').append('<li class="wmd-button" id="wmd-alert-' + type.id + '" title="插入' + type.label + '提示"><span>' + type.icon + '</span></li>');
        $(document).on('click', '#wmd-alert-' + type.id, function() {
            var textarea = $('#text')[0];
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var value = textarea.value;
            var selected = value.substring(start, end) || type.label;
            var text = '[' + type.id + ']' + selected + '[/' + type.id + ']';
            textarea.value = value.substring(0, start) + text + value.substring(end);
            textarea.setSelectionRange(start + text.length, start + text.length);
            textarea.focus();
            $('#text').trigger('change');
        });
    });
    // 折叠面板按钮
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-collapse-button" title="插入折叠面板"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M19 12C20.0929 12 21.1175 12.2922 22 12.8027V6C22 5.44772 21.5523 5 21 5H12.4142L10.4142 3H3C2.44772 3 2 3.44772 2 4V20C2 20.5523 2.44772 21 3 21H13.8027C13.2922 20.1175 13 19.0929 13 18C13 14.6863 15.6863 12 19 12ZM20.4143 17.9999L22.5356 20.1212L21.1214 21.5354L19.0001 19.4141L16.8788 21.5354L15.4646 20.1212L17.5859 17.9999L15.4646 15.8786L16.8788 14.4644L19.0001 16.5857L21.1214 14.4644L22.5356 15.8786L20.4143 17.9999Z"></path></svg></span></li>');
    $(document).on('click', '#wmd-collapse-button', function() {
        var title = prompt('请输入折叠面板标题：', '折叠标题');
        if (title !== null) {
            var textarea = $('#text')[0];
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var value = textarea.value;
            var selected = value.substring(start, end) || '这里是折叠内容';
            var text = "[collapse title='" + title + "']" + selected + "[/collapse]";
            textarea.value = value.substring(0, start) + text + value.substring(end);
            textarea.setSelectionRange(start + text.length, start + text.length);
            textarea.focus();
            $('#text').trigger('change');
        }
    });
    // 下载按钮
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-download-button" title="插入下载信息"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M3 19H21V21H3V19ZM13 9H20L12 17L4 9H11V1H13V9Z"></path></svg></span></li>');
    $(document).on('click', '#wmd-download-button', function() {
        var file = prompt('请输入文件名：', 'xxx.zip');
        if (file === null) return;
        var size = prompt('请输入文件大小：', '12MB');
        if (size === null) return;
        var url = prompt('请输入下载地址：', 'https://example.com/file.zip');
        if (url === null) return;
        var textarea = $('#text')[0];
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var value = textarea.value;
        var text = "[download file='" + file + "' size='" + size + "']" + url + "[/download]";
        textarea.value = value.substring(0, start) + text + value.substring(end);
        textarea.setSelectionRange(start + text.length, start + text.length);
        textarea.focus();
        $('#text').trigger('change');
    });
    // 回复可见按钮
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-reply-button" title="插入回复可见"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M10.1305 15.8421L9.34268 18.7821L7.41083 18.2645L8.1983 15.3256C7.00919 14.8876 5.91661 14.2501 4.96116 13.4536L2.80783 15.6069L1.39362 14.1927L3.54695 12.0394C2.35581 10.6105 1.52014 8.8749 1.17578 6.96843L2.07634 6.80469C4.86882 8.81573 8.29618 10.0003 12.0002 10.0003C15.7043 10.0003 19.1316 8.81573 21.9241 6.80469L22.8247 6.96843C22.4803 8.8749 21.6446 10.6105 20.4535 12.0394L22.6068 14.1927L21.1926 15.6069L19.0393 13.4536C18.0838 14.2501 16.9912 14.8876 15.8021 15.3256L16.5896 18.2645L14.6578 18.7821L13.87 15.8421C13.2623 15.9461 12.6376 16.0003 12.0002 16.0003C11.3629 16.0003 10.7381 15.9461 10.1305 15.8421Z"></path></svg></span></li>');
    $(document).on('click', '#wmd-reply-button', function() {
        var textarea = $('#text')[0];
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var value = textarea.value;
        var selected = value.substring(start, end) || '这里是隐藏内容';
        var text = '[reply]' + selected + '[/reply]';
        textarea.value = value.substring(0, start) + text + value.substring(end);
        textarea.setSelectionRange(start + text.length, start + text.length);
        textarea.focus();
        $('#text').trigger('change');
    });

    $('#wmd-article-button').click(function() {
        var articleId = prompt("请输入要引用的文章ID：");
        if (articleId) {
            var text = "[article id=\"" + articleId + "\"]";
            var textarea = $('#text')[0];
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var value = textarea.value;
            textarea.value = value.substring(0, start) + text + value.substring(end);
            // 将光标移动到插入的文本之后
            textarea.setSelectionRange(start + text.length, start + text.length);
            textarea.focus();
            // 触发change事件，确保编辑器更新
            $('#text').trigger('change');
        }
    });
    // github按钮插入
    $('#wmd-github-button').click(function() {
        var repo = prompt("请输入GitHub仓库名（如 jkjoy/typecho）：");
        if (repo) {
            var text = "[github=" + repo + "]";
            var textarea = $('#text')[0];
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            var value = textarea.value;
            textarea.value = value.substring(0, start) + text + value.substring(end);
            textarea.setSelectionRange(start + text.length, start + text.length);
            textarea.focus();
            $('#text').trigger('change');
        }
    });
});
</script>
EOF;
    }
}
// 注册编辑器按钮钩子
// 避免重复注册，在最后执行
if (!Typecho_Plugin::exists('Widget_Abstract_Contents', 'editor')) {
    Typecho_Plugin::factory('admin/write-post.php')->bottom = array('EditorButton', 'render');
    Typecho_Plugin::factory('admin/write-page.php')->bottom = array('EditorButton', 'render');
}

/**
 * 获取文章摘要
 * @param $post Widget_Abstract_Contents|array
 * @param int $length 摘要长度
 * @return string
 */
function get_article_summary($post, $length = 100) {
    // 如果有自定义摘要字段
    if (is_array($post) && isset($post['fields']) && !empty($post['fields']['summary'])) {
        return $post['fields']['summary'];
    }
    if (is_object($post) && isset($post->fields) && !empty($post->fields->summary)) {
        return $post->fields->summary;
    }
    // 否则自动截取正文
    $text = is_array($post) ? $post['text'] : (isset($post->text) ? $post->text : '');
    $text = strip_tags($text); // 去除HTML标签
    $text = str_replace(["\r", "\n", "\t"], '', $text); // 去除换行和制表
    if (mb_strlen($text, 'UTF-8') > $length) {
        return mb_substr($text, 0, $length, 'UTF-8') . '...';
    }
    return $text;
}

/**
 * 获取站点统计信息（包含当前登录用户信息）
 * @return array
 */
function get_site_statistics() {
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    
    // 获取当前登录用户对象
    $currentUser = Typecho_Widget::widget('Widget_User');
    
    // 如果用户未登录，获取默认uid=1的用户
    if (!$currentUser->hasLogin()) {
        $defaultUser = $db->fetchRow($db->select()->from('table.users')->where('uid = ?', 1));
        $email = $defaultUser['mail'];
        $nickname = $defaultUser['screenName'];
    } else {
        // 用户已登录，使用当前用户信息
        $email = $currentUser->mail;
        $nickname = $currentUser->screenName;
    }
    
    // 获取用户设置的 Gravatar 镜像
    $cnavatar = Helper::options()->cnavatar ? Helper::options()->cnavatar : 'https://cravatar.cn/avatar/';
    $hash = md5($email);
    $avatar = rtrim($cnavatar, '/') . '/' . $hash . '?s=80&d=identicon';
    
    // 其余统计信息保持不变
    $userCount = $db->fetchObject($db->select(array('COUNT(*)' => 'num'))->from('table.users'))->num;
    $postCount = $db->fetchObject($db->select(array('COUNT(*)' => 'num'))->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish'))->num;
    $commentCount = $db->fetchObject($db->select(array('COUNT(*)' => 'num'))->from('table.comments'))->num;
    $totalViews = $db->fetchObject(
        $db->select(array('SUM(views)' => 'viewsum'))->from('table.contents')->where('type = ?', 'post')
    )->viewsum;
    if ($totalViews === null) $totalViews = 0;
    
    return [
        'email' => $email,
        'nickname' => $nickname,
        'avatar' => $avatar,
        'userCount' => $userCount,
        'postCount' => $postCount,
        'commentCount' => $commentCount,
        'totalViews' => $totalViews,
        'isLogin' => $currentUser->hasLogin() // 添加一个是否登录的标志
    ];
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