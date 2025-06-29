<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('建议尺寸 100px * 100px,不填写则使用站点标题'));
    $form->addInput($logoUrl);
    $icoUrl = new Typecho_Widget_Helper_Form_Element_Text('icoUrl', NULL, NULL, _t('站点 Favicon 地址'), _t('建议尺寸 16px * 16px,不填写则使用默认图标'));
    $form->addInput($icoUrl);
    $primaryColor = new Typecho_Widget_Helper_Form_Element_Text('primaryColor', NULL, NULL, _t('主题主色调'), _t('默认 #A7E6F4'));
    $form->addInput($primaryColor);
    $blockNotTransparent = new Typecho_Widget_Helper_Form_Element_Text('blockNotTransparent', NULL, NULL, _t('全站区块不透明度'), _t('默认100%, 0-100之间的数字, 0为透明'));
    $form->addInput($blockNotTransparent);
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL, NULL, _t('置顶文章cid'), _t('多篇文章以`|`符号隔开'), _t('会在首页展示置顶文章。'));
    $form->addInput($sticky);
    $ICP = new Typecho_Widget_Helper_Form_Element_Text('ICP', NULL, NULL, _t('ICP 备案号'), _t('用于网站备案的 ICP 号'));
    $form->addInput($ICP);
    $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, NULL, _t('个人信息背景图片地址'), _t('用于个人信息展示的背景图片'));
    $form->addInput($bgUrl);
    $cnavatar = new Typecho_Widget_Helper_Form_Element_Text('cnavatar', NULL, NULL, _t('Gravatar镜像'), _t('默认使用https://cravatar.cn/avatar/'));
    $form->addInput($cnavatar);
    $listmodel = new Typecho_Widget_Helper_Form_Element_Radio('listmodel',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('列表模式'), _t('选择"是"将在首页显示列表模式。选择否则显示卡片模式'));
    $form->addInput($listmodel);
    $pageprev = new Typecho_Widget_Helper_Form_Element_Radio('pageprev',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('首页文章列表页码'), _t('选择"是"首页文章列表显示页码。选择否则不显示分页'));
    $form->addInput($pageprev);
    $cmsmodel = new Typecho_Widget_Helper_Form_Element_Radio('cmsmodel',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('CMS模式'), _t('选择"是"开启CMS模式。'));
    $form->addInput($cmsmodel);
    $friendlink = new Typecho_Widget_Helper_Form_Element_Radio('friendlink',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('友情链接'), _t('选择"是"在首页显示友情链接。开启前请安装"Links"插件。链接分类需设置为home，默认关闭'));
    $form->addInput($friendlink);
    $social = new Typecho_Widget_Helper_Form_Element_Radio('social',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('社交分享显示'), _t('选择"是"在文章页面显示社交分享。需要搭配插件使用,默认关闭'));
    $form->addInput($social);
    $gonggao = new Typecho_Widget_Helper_Form_Element_Textarea('gonggao', NULL, NULL, _t('站点公告'), _t('支持HTML'));
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
    $addhead = new Typecho_Widget_Helper_Form_Element_Textarea('addhead', NULL, NULL, _t('网站验证代码'), _t('若开启无刷新加载，请在标签上加上data-instant属性'));
    $form->addInput($addhead);
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('网站统计代码'), _t('支持HTML'));
    $form->addInput($tongji);
    $footerinfo = new Typecho_Widget_Helper_Form_Element_Textarea('footerinfo', NULL, NULL, _t('底部关于我们'), _t('支持HTML'));
    $form->addInput($footerinfo);
    $footercopyright = new Typecho_Widget_Helper_Form_Element_Textarea('footercopyright', NULL, NULL, _t('底部版权信息'), _t('支持HTML'));
    $form->addInput($footercopyright);
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
    // 首先检查是否有自定义封面字段
    if ($fields && !empty($fields->cover)) {
        return $fields->cover;
    }
    
    // 尝试从内容中提取第一张图片
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
    
    if (!empty($matches[1][0])) {
        // 如果找到图片，返回第一张图片URL
        return $matches[1][0];
    } else {
        // 如果没有图片，使用随机封面（基于文章ID的伪随机）
        $coverNumber = ($cid % 8) + 1;  // 得到1-8的值
        return Helper::options()->themeUrl . '/assets/img/random/' . $coverNumber . '.jpg';
    }
}

/**
 * 获取上一篇文章
 * 
 * @param Widget_Archive $archive 当前文章归档对象
 * @return object|null 上一篇文章对象，如果没有则返回null
 */
function get_previous_post($archive) {
    if (!$archive->is('single')) {
        return null;
    }
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();  
    // 获取上一篇文章（按创建时间排序）
    $post = $db->fetchRow($db->select()
        ->from('table.contents')
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created < ?', $archive->created)
        ->where('table.contents.type = ?', 'post')
        ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->limit(1));
    
    if (!$post) {
        return null;
    }  
    // 构建标准化的文章对象
    $result = new stdClass();
    $result->cid = $post['cid'];
    $result->title = $post['title'];
    $result->slug = $post['slug'];
    $result->created = $post['created'];
    $result->content = isset($post['text']) ? $post['text'] : '';
    $result->text = isset($post['text']) ? $post['text'] : '';
    $result->permalink = get_permalink($post['cid']);    
    // 获取文章自定义字段
    $fields = $db->fetchAll($db->select()->from('table.fields')
        ->where('cid = ?', $post['cid']));
    // 添加自定义字段到文章对象
    if ($fields) {
        $result->fields = new stdClass();
        foreach ($fields as $field) {
            $result->fields->{$field['name']} = $field['str_value'] ? $field['str_value'] : $field['int_value'];
        }
    } 
    return $result;
}

/**
 * 获取下一篇文章
 * 
 * @param Widget_Archive $archive 当前文章归档对象
 * @return object|null 下一篇文章对象，如果没有则返回null
 */
function get_next_post($archive) {
    if (!$archive->is('single')) {
        return null;
    }
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    // 获取下一篇文章（按创建时间排序）
    $post = $db->fetchRow($db->select()
        ->from('table.contents')
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.created > ?', $archive->created)
        ->where('table.contents.type = ?', 'post')
        ->order('table.contents.created', Typecho_Db::SORT_ASC)
        ->limit(1));
    
    if (!$post) {
        return null;
    }
    // 构建标准化的文章对象
    $result = new stdClass();
    $result->cid = $post['cid'];
    $result->title = $post['title'];
    $result->slug = $post['slug'];
    $result->created = $post['created'];
    $result->content = isset($post['text']) ? $post['text'] : '';
    $result->text = isset($post['text']) ? $post['text'] : '';
    $result->permalink = get_permalink($post['cid']);
    // 获取文章自定义字段
    $fields = $db->fetchAll($db->select()->from('table.fields')
        ->where('cid = ?', $post['cid']));
    // 添加自定义字段到文章对象
    if ($fields) {
        $result->fields = new stdClass();
        foreach ($fields as $field) {
            $result->fields->{$field['name']} = $field['str_value'] ? $field['str_value'] : $field['int_value'];
        }
    }
    
    return $result;
}

/**
 * 获取文章永久链接
 * 
 * @param int $cid 文章ID
 * @return string 文章链接
 */
function get_permalink($cid) {
    try {
        // 获取文章对象
        $db = Typecho_Db::get();
        $post = $db->fetchRow($db->select()
            ->from('table.contents')
            ->where('cid = ?', $cid)
            ->where('status = ?', 'publish'));   
        if (!$post) {
            return '';
        }
        // 构造文章对象
        $post['type'] = 'post'; // 确保类型为文章
        $post = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($post);   
        // 使用文章对象的 permalink 方法生成链接
        return $post['permalink'] ?? '';
    } catch (Exception $e) {
        // 出现异常时使用最简单的方式
        $options = Helper::options();
        return $options->siteUrl . '?cid=' . $cid;
    }
}

/**
 * 获取所有评论者信息的函数
 */
function getAllCommenters() {
    $db = Typecho_Db::get();
    $commenters = array();
    
    // 查询所有评论者信息并按邮箱分组统计
    $query = $db->select('author, mail, COUNT(*) as comment_count, url')
        ->from('table.comments')
        ->where('status = ?', 'approved') // 只统计已通过审核的评论
        ->where('authorId != ?', 1)      // 排除ID为1的管理员
        ->group('mail')
        ->order('comment_count', Typecho_Db::SORT_DESC);
        
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
 * 获取IP归属地 (使用 ip.asbid.cn API)
 */
function get_ip_region($ip) {
    // 检查是否是内网IP
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return '内网IP';
    }
    
    // 缓存目录路径
    $cacheDir = __TYPECHO_ROOT_DIR__ . '/usr/cache/ip_cache/';
    if (!file_exists($cacheDir)) {
        mkdir($cacheDir, 0755, true);
    }
    
    // 缓存文件名 (使用ip作为文件名)
    $cacheFile = $cacheDir . md5($ip) . '.json';
    
    // 检查是否有缓存
    if (file_exists($cacheFile)) {
        $cacheData = json_decode(file_get_contents($cacheFile), true);
        if ($cacheData && isset($cacheData['expire']) && $cacheData['expire'] > time()) {
            return format_api_ip_region($cacheData['data']);
        }
    }
    
    // 调用API获取IP信息
    $apiUrl = 'https://ip.asbid.cn/' . $ip;
    $response = @file_get_contents($apiUrl);
    
    if ($response === false) {
        // API调用失败，返回未知
        return '未知';
    }
    
    $data = json_decode($response, true);
    if (!$data || !isset($data['country'])) {
        return '未知';
    }
    
    // 缓存数据 (设置1个月有效期)
    $cacheData = [
        'data' => $data,
        'expire' => time() + 30 * 24 * 3600
    ];
    file_put_contents($cacheFile, json_encode($cacheData));
    
    return format_api_ip_region($data);
}

/**
 * 格式化API返回的IP归属地信息
 *
 * @param array $data API返回的数据
 * @return string 格式化后的归属地
 */
function format_api_ip_region($data) {
    $regionParts = [];
    
    if (isset($data['country']) && $data['country']) {
        $regionParts[] = $data['country'];
    }
    if (isset($data['province']) && $data['province']) {
        $regionParts[] = $data['province'];
    }
    if (isset($data['city']) && $data['city']) {
        // 处理"中国-江苏-南京"这样的格式
        $cityParts = explode('–', $data['city']);
        foreach ($cityParts as $part) {
            if (trim($part) && !in_array(trim($part), $regionParts)) {
                $regionParts[] = trim($part);
            }
        }
    }
    
    if (isset($data['isp']) && $data['isp']) {
        $regionParts[] = $data['isp'];
    }
    
    return implode(' ', $regionParts);
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
        "Safari" => strstr($userAgent, 'Safari') != false ,
        "Chrome" => strstr($userAgent, 'Chrome') != false || strstr($userAgent, 'CriOS') != false ,
        "IE" => strstr($userAgent, 'MSIE') != false || strstr($userAgent, 'Trident') != false ,
        "Edge" => strstr($userAgent, 'Edge') != false || strstr($userAgent, 'Edg/') != false || strstr($userAgent, 'EdgA') != false || strstr($userAgent, 'EdgiOS') != false,
        "Firefox" => strstr($userAgent, 'Firefox') != false || strstr($userAgent, 'FxiOS') != false ,
        "Firefox Focus" => strstr($userAgent, 'Focus') != false,
        "Chromium" => strstr($userAgent,'Chromium') != false,
        "Opera" => strstr($userAgent,'Opera') != false || strstr($userAgent,'OPR') != false,
        "Vivaldi" => strstr($userAgent,'Vivaldi') != false,
        "Yandex" => strstr($userAgent,'YaBrowser') != false,
        "Arora" => strstr($userAgent,'Arora') != false,
        "Lunascape" => strstr($userAgent,'Lunascape') != false,
        "QupZilla" => strstr($userAgent,'QupZilla') != false,
        "Coc Coc" => strstr($userAgent,'coc_coc_browser') != false,
        "Kindle" => strstr($userAgent,'Kindle') != false || strstr($userAgent,'Silk/') != false,
        "Iceweasel" => strstr($userAgent,'Iceweasel') != false,
        "Konqueror" => strstr($userAgent,'Konqueror') != false,
        "Iceape" => strstr($userAgent,'Iceape') != false,
        "SeaMonkey" => strstr($userAgent,'SeaMonkey') != false,
        "Epiphany" => strstr($userAgent,'Epiphany') != false,
        // 浏览器 - 国内浏览器
        "360" => strstr($userAgent,'QihooBrowser') != false || strstr($userAgent,'QHBrowser') != false,
        "360EE" => strstr($userAgent,'360EE') != false,
        "360SE" => strstr($userAgent,'360SE') != false,
        "UC" => strstr($userAgent,'UCBrowser') != false || strstr($userAgent,' UBrowser') != false || strstr($userAgent,'UCWEB') != false,
        "QQBrowser" => strstr($userAgent,'QQBrowser') != false,
        "QQ" => strstr($userAgent,'QQ/') != false,
        "Baidu" => strstr($userAgent,'Baidu') != false || strstr($userAgent,'BIDUBrowser') != false || strstr($userAgent,'baidubrowser') != false || strstr($userAgent,'baiduboxapp') != false || strstr($userAgent,'BaiduHD') != false,
        "Maxthon" => strstr($userAgent,'Maxthon') != false,
        "Sogou" => strstr($userAgent,'MetaSr') != false || strstr($userAgent,'Sogou') != false,
        "Liebao" => strstr($userAgent,'LBBROWSER') != false || strstr($userAgent,'LieBaoFast') != false,
        "2345Explorer" => strstr($userAgent,'2345Explorer') != false || strstr($userAgent,'Mb2345Browser') != false || strstr($userAgent,'2345chrome') != false,
        "115Browser" => strstr($userAgent,'115Browser') != false,
        "TheWorld" => strstr($userAgent,'TheWorld') != false,
        "Quark" => strstr($userAgent,'Quark') != false,
        "Qiyu" => strstr($userAgent,'Qiyu') != false,
        // 浏览器 - 手机厂商
        "XiaoMi" => strstr($userAgent,'MiuiBrowser') != false,
        "Huawei" => strstr($userAgent,'HuaweiBrowser') != false || strstr($userAgent,'HUAWEI/') != false || strstr($userAgent,'HONOR') != false || strstr($userAgent,'HBPC/') != false,
        "Vivo" => strstr($userAgent,'VivoBrowser') != false,
        "OPPO" => strstr($userAgent,'HeyTapBrowser') != false,
        // 浏览器 - 客户端
        "Wechat" => strstr($userAgent,'MicroMessenger') != false,
        "WechatWork" => strstr($userAgent,'wxwork/') != false,
        "Taobao" => strstr($userAgent,'AliApp(TB') != false,
        "Alipay" => strstr($userAgent,'AliApp(AP') != false,
        "Weibo" => strstr($userAgent,'Weibo') != false,
        "Douban" => strstr($userAgent,'com.douban.frodo') != false,
        "Suning" => strstr($userAgent,'SNEBUY-APP') != false,
        "iQiYi" => strstr($userAgent,'IqiyiApp') != false,
        "DingTalk" => strstr($userAgent,'DingTalk') != false,
        "Douyin" => strstr($userAgent,'aweme') != false,
        // 系统或平台
        "Windows" => strstr($userAgent,'Windows') != false,
        "Linux" => strstr($userAgent,'Linux') != false || strstr($userAgent,'X11') != false,
        "Mac OS" => strstr($userAgent,'Macintosh') != false,
        "Android" => strstr($userAgent,'Android') != false || strstr($userAgent,'Adr') != false,
        "HarmonyOS" => strstr($userAgent,'HarmonyOS') != false,
        "Ubuntu" => strstr($userAgent,'Ubuntu') != false,
        "FreeBSD" => strstr($userAgent,'FreeBSD') != false,
        "Debian" => strstr($userAgent,'Debian') != false,
        "Windows Phone" => strstr($userAgent,'IEMobile') != false || strstr($userAgent,'Windows Phone') != false,
        "BlackBerry" => strstr($userAgent,'BlackBerry') != false || strstr($userAgent,'RIM') != false,
        "MeeGo" => strstr($userAgent,'MeeGo') != false,
        "Symbian" => strstr($userAgent,'Symbian') != false,
        "iOS" => strstr($userAgent,'like Mac OS X') != false,
        "Chrome OS" => strstr($userAgent,'CrOS') != false,
        "WebOS" => strstr($userAgent,'hpwOS') != false,
        // 设备
        "Mobile" => strstr($userAgent,'Mobi') != false || strstr($userAgent,'iPh') != false || strstr($userAgent,'480') != false,
        "Tablet" => strstr($userAgent,'Tablet') != false || strstr($userAgent,'Pad') != false || strstr($userAgent,'Nexus 7') != false,
    ];
    // 部分修正 | 因typecho评论数据只存储了ua的信息,所以不能完全进行修正尤其是360相关浏览器
    if ($match['Baidu'] && $match['Opera']) $match['Baidu'] = false;
    if ($match['iOS']) $match['Safari'] = true;
 
    // 基本信息
    $baseInfo = [
        "browser" => [
            'Safari', 'Chrome', 'Edge', 'IE', 'Firefox', 'Firefox Focus', 'Chromium',
            'Opera', 'Vivaldi', 'Yandex', 'Arora', 'Lunascape','QupZilla', 'Coc Coc',
            'Kindle', 'Iceweasel', 'Konqueror', 'Iceape','SeaMonkey', 'Epiphany', 'XiaoMi',
            'Vivo', 'OPPO', '360', '360SE','360EE', 'UC', 'QQBrowser', 'QQ', 'Huawei', 'Baidu',
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
        '10' => "10",
        '6.4' => '10',
        '6.3' => '8.1',
        '6.2' => '8',
        '6.1' => '7',
        '6.0' => 'Vista',
        '5.2' => 'XP',
        '5.1' => 'XP',
        '5.0' => '2000',
    ];
    $wv = pregMatch("/^Mozilla\/\d.0 \(Windows NT ([\d.]+)[;)].*$/", $userAgent);
    $HarmonyOSVersion = [
        10 => "2",
        12 => "3"
    ];
    $systemVersion = [
        "Windows" => $windowsVersion[$wv] ?? $wv,
        "Android" => pregMatch("/^.*Android ([\d.]+);.*$/", $userAgent),
        "HarmonyOS" => $HarmonyOSVersion[pregMatch("/^Mozilla.*Android ([\d.]+)[;)].*$/", $userAgent)] ?? '',
        "iOS" => preg_replace("/_/", '.', pregMatch("/^.*OS ([\d_]+) like.*$/", $userAgent)),
        "Debian" =>  pregMatch("/^.*Debian\/([\d.]+).*$/", $userAgent),
        "Windows Phone" => pregMatch("/^.*Windows Phone( OS)? ([\d.]+);.*$/", $userAgent),
        "Mac OS" => preg_replace("/_/", '.',pregMatch("/^.*Mac OS X ([\d_]+).*$/", $userAgent)),
        "WebOS" => pregMatch("/^.*hpwOS\/([\d.]+);.*$/", $userAgent)
    ];
 
    if ($systemVersion[$deviceInfo['system']]) {
        $deviceInfo['systemVersion'] = $systemVersion[$deviceInfo['system']];
        if ($deviceInfo['systemVersion'] == $userAgent) $deviceInfo['systemVersion'] = '';
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
        69 => '10.0',
        55 => '9.9',
        69 => '10.0',
        55 => '9.9'
    ];
 
    $chromeVersion = pregMatch('/^.*Chrome\/([\d]+).*$/', $userAgent);
 
    $browsersVersion = [
        "Safari" => pregMatch("/^.*Version\/([\d.]+).*$/", $userAgent),
        "Chrome" => pregMatch("/^.*Chrome\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*CriOS\/([\d.]+).*$/", $userAgent),
        "IE" => pregMatch("/^.*MSIE ([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*rv:([\d.]+).*$/", $userAgent),
        "Edge" => pregMatch("/^.*Edge\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*Edg\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*EdgA\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*EdgiOS\/([\d.]+).*$/", $userAgent),
        "Firefox" => pregMatch("/^.*Firefox\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*FxiOS\/([\d.]+).*$/", $userAgent),
        "Firefox Focus" => pregMatch("/^.*Focus\/([\d.]+).*$/", $userAgent),
        "Chromium" => pregMatch("/^.*Chromium\/([\d.]+).*$/", $userAgent),
        "Opera" => pregMatch("/^.*Opera\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*OPR\/([\d.]+).*$/", $userAgent),
        "Vivaldi" => pregMatch("/^.*Vivaldi\/([\d.]+).*$/", $userAgent),
        "Yandex" => pregMatch("/^.*YaBrowser\/([\d.]+).*$/", $userAgent),
        "Brave" => pregMatch("/^.*Chrome\/([\d.]+).*$/", $userAgent),
        "Arora" => pregMatch("/^.*Arora\/([\d.]+).*$/", $userAgent),
        "Lunascape" => pregMatch("/^.*Lunascape[\/\s]([\d.]+).*$/", $userAgent),
        "QupZilla" => pregMatch("/^.*QupZilla[\/\s]([\d.]+).*$/", $userAgent),
        "Coc Coc" => pregMatch("/^.*coc_coc_browser\/([\d.]+).*$/", $userAgent),
        "Kindle" => pregMatch("/^.*Version\/([\d.]+).*$/", $userAgent),
        "Iceweasel" => pregMatch("/^.*Iceweasel\/([\d.]+).*$/", $userAgent),
        "Konqueror" => pregMatch("/^.*Konqueror\/([\d.]+).*$/", $userAgent),
        "Iceape" => pregMatch("/^.*Iceape\/([\d.]+).*$/", $userAgent),
        "SeaMonkey" => pregMatch("/^.*SeaMonkey\/([\d.]+).*$/", $userAgent),
        "Epiphany" => pregMatch("/^.*Epiphany\/([\d.]+).*$/", $userAgent),
        "360" => pregMatch("/^.*QihooBrowser(HD)?\/([\d.]+).*$/", $userAgent),
        "Maxthon" => pregMatch("/^.*Maxthon\/([\d.]+).*$/", $userAgent),
        "QQBrowser" => pregMatch("/^.*QQBrowser\/([\d.]+).*$/", $userAgent),
        "QQ" => pregMatch("/^.*QQ\/([\d.]+).*$/", $userAgent),
        "Baidu" => pregMatch("/^.*BIDUBrowser[\s\/]([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*baiduboxapp\/([\d.]+).*$/", $userAgent),
        "UC" => pregMatch("/^.*UC?Browser\/([\d.]+).*$/", $userAgent),
        "Sogou" => pregMatch("/^.*SE ([\d.X]+).*$/", $userAgent) ?? pregMatch("/^.*SogouMobileBrowser\/([\d.]+).*$/", $userAgent),
        "115Browser" => pregMatch("/^.*115Browser\/([\d.]+).*$/", $userAgent),
        "TheWorld" => pregMatch("/^.*TheWorld ([\d.]+).*$/", $userAgent),
        "XiaoMi" => pregMatch("/^.*MiuiBrowser\/([\d.]+).*$/", $userAgent),
        "Vivo" => pregMatch("/^.*VivoBrowser\/([\d.]+).*$/", $userAgent),
        "OPPO" => pregMatch("/^.*HeyTapBrowser\/([\d.]+).*$/", $userAgent),
        "Quark" => pregMatch("/^.*Quark\/([\d.]+).*$/", $userAgent),
        "Qiyu" => pregMatch("/^.*Qiyu\/([\d.]+).*$/", $userAgent),
        "Wechat" => pregMatch("/^.*MicroMessenger\/([\d.]+).*$/", $userAgent),
        "WechatWork" => pregMatch("/^.*wxwork\/([\d.]+).*$/", $userAgent),
        "Taobao" => pregMatch("/^.*AliApp\(TB\/([\d.]+).*$/", $userAgent),
        "Alipay" => pregMatch("/^.*AliApp\(AP\/([\d.]+).*$/", $userAgent),
        "Weibo" => pregMatch("/^.*weibo__([\d.]+).*$/", $userAgent),
        "Douban" => pregMatch("/^.*com.douban.frodo\/([\d.]+).*$/", $userAgent),
        "Suning" => pregMatch("/^.*SNEBUY-APP([\d.]+).*$/", $userAgent),
        "iQiYi" => pregMatch("/^.*IqiyiVersion\/([\d.]+).*$/", $userAgent),
        "DingTalk" => pregMatch("/^.*DingTalk\/([\d.]+).*$/", $userAgent),
        "Douyin" => pregMatch("/^.*app_version\/([\d.]+).*$/", $userAgent),
        "Huawei" => pregMatch("/^.*Version\/([\d.]+).*$/", $userAgent) ??  pregMatch("/^.*HuaweiBrowser\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*HBPC\/([\d.]+).*$/", $userAgent),
        "360SE" => $browsers_360SE[$chromeVersion] ?? '',
        "360EE" => $browsers_360EE[$chromeVersion] ?? '',
        "Liebao" => pregMatch("/^.*LieBaoFast\/([\d.]+).*$/", $userAgent) ?? $browsers_liebao[$chromeVersion],
        "2345Explorer" => $browsers_2345[$chromeVersion]  ?? pregMatch("/^.*2345Explorer\/([\d.]+).*$/", $userAgent) ?? pregMatch("/^.*Mb2345Browser\/([\d.]+).*$/", $userAgent),
    ];
 
 
    if ($browsersVersion[$deviceInfo['browser']]) {
        $deviceInfo["version"] = $browsersVersion[$deviceInfo['browser']];
        if ($deviceInfo["version"] == $userAgent) $deviceInfo['version'] = '';
    }
 
    // 修正浏览器版本信息
    $chrome = pregMatch('/\S+Browser/', $userAgent);
    if ($deviceInfo['browser'] == 'Chrome' && $chrome) {
        $deviceInfo['browser'] = $chrome;
        $deviceInfo['version'] = pregMatch('/^.*Browser\/([\d.]+).*$/', $userAgent);
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
?>