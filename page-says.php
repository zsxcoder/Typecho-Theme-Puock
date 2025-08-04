<?php
/**
 * 说说页面
 * @package custom
 * @author 老孙
 * @version 1.0
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div id="breadcrumb" class="animated fadeInUp">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="a-link" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php $this->title() ?></li>
        </ol>
    </nav>
</div>
<div id="page-moments">
    <div class="row">
        <?php if ($this->options->showsidebar): ?>    
            <div id="comments" class="col-lg-8 col-md-12 animated fadeInLeft">
        <?php else: ?>
            <div id="comments" class="col-lg-12 col-md-12">
        <?php endif; ?>
            <?php
            // 登录状态检测
            if ($this->user->hasLogin()) {
                $GLOBALS['isLogin'] = true;
            } else {
                $GLOBALS['isLogin'] = false;
            }

            // 评论回调函数
            function threadedComments($comments, $options) {
                $mail = $comments->mail;
                $mailHash = md5(strtolower(trim($mail)));
                $purl = $comments->url;
                $nickname = $comments->author;
                $cnavatar = Helper::options()->cnavatar ? Helper::options()->cnavatar : 'https://cravatar.cn/avatar/';
                $avatarurl = rtrim($cnavatar, '/') . '/' . $mailHash . '?s=80&d=identicon';
                $loadingImg = Helper::options()->themeUrl . '/assets/img/load.svg';
            ?>
                <div class="mb20 puock-text moments-item">
                    <div class="row">
                        <div class="col-12 col-md-1">
                             <a class="meta ta3" href="<?php echo $purl; ?>" target="_blank">
                                <div class="avatar mb10">
                                    <img src='<?php echo $loadingImg; ?>'
                                        class='lazy md-avatar mt-1'
                                        data-src='<?php echo $avatarurl; ?>'
                                    >
                                </div>
                                <div class="t-line-1 info fs12"><?php echo $nickname; ?></div>
                            </a>
                        </div>
                        <div class="col-12 col-md-11">
                            <div class="p-block moment-content-box"> <span class="al"></span>
                                <div class="mt10 moment-content entry-content show-link-icon">
                                    <?php if ($comments->parent) {echo getPermalinkFromCoid($comments->parent);} echo parse_smiley_shortcode($comments->content);?>
                                </div>
                                <div class="mt10 moment-footer p-flex-s-right"> 
                                    <span class="t-sm c-sub">
                                        <span class="mr-2"><i class="fa-regular fa-clock mr-1"></i><?php echo friendly_date($comments->created); ?></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            <?php } ?>
    <?php $this->comments()->to($comments); ?>
    <?php if ($this->user->hasLogin() && $this->user->group == 'administrator') : ?>
    <div class="p-block">
        <input type="hidden" value="<?php $this->commentUrl() ?>">
        <div>
            <span class="t-lg border-bottom border-primary puock-text pb-2">
                <i class="fa-regular fa-comments mr-1"></i>有什么新鲜事
            </span>
        </div>
        <div class="mt20 clearfix" id="comment-form-box">
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="mt10" role="form">
                <div class="form-group">
                    <textarea rows="4" name="text" id="comment" class="form-control form-control-sm t-sm" placeholder="发表您的新鲜事儿..." required><?php $this->remember('text'); ?></textarea>
                </div>
                <input type="hidden" value="<?php $this->user->screenName(); ?>" name="author" />
                <input type="hidden" value="<?php $this->user->mail(); ?>" name="mail" />
                <input type="hidden" value="<?php $this->options->siteUrl(); ?>" name="url" />
                <input type="hidden" name="_" value="<?php Typecho_Widget::widget('Widget_Security')->to($security);
                    echo $security->getToken($this->request->getRequestUrl()); ?>">
                <div class="p-flex-sbc mt10">
                    <div class="form-foot">
                        <?php if($this->options->social): ?>
                        <button id="comment-insert-image" class="btn btn-outline-secondary btn-ssm pk-modal-toggle" type="button" title="插入图片">
                            <i class="fa-solid fa-image"></i>
                        </button>
                        <button id="comment-smiley" class="btn btn-outline-secondary btn-ssm pk-modal-toggle" type="button" title="表情" data-once-load="true"
                                    data-url="<?php echo get_correct_url('/emoji/'); ?>">
                        <i class="fa-regular fa-face-smile t-md"></i>
                        </button>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-primary btn-ssm"><i class="fa-regular fa-paper-plane"></i> 立即发表</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($comments->have()): ?>
    <!-- 评论列表 -->
    <?php while ($comments->next()): ?>
        <?php threadedComments($comments, $this->options); ?>
    <?php endwhile; ?>
    <!-- 分页导航 -->
    <div class="mt20 p-flex-s-right" data-no-instant>
        <?php $comments->pageNav('&laquo;', '&raquo;', 1, '...', array(
            'wrapTag' => 'ul',
            'wrapClass' => 'pagination comment-ajax-load',
            'itemTag' => 'li',
            'textTag' => 'span',
            'currentClass' => 'active',
            'prevClass' => 'prev',
            'nextClass' => 'next'
        )); ?>
    </div>
    </div>
    <?php endif; ?>
        <?php if ($this->options->showsidebar): ?>             
            <?php $this->need('sidebar.php'); ?> 
        <?php endif; ?>
    </div>
</div>
<?php $this->need('footer.php'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var btn = document.getElementById('comment-insert-image');
    if (!btn) return;
    btn.addEventListener('click', function() {
        let modal = document.createElement('div');
        modal.innerHTML = `
        <div id="img-insert-modal" style="position:fixed;z-index:9999;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.3);display:flex;align-items:center;justify-content:center;">
            <div style="background:#fff;padding:24px 32px;border-radius:8px;min-width:320px;box-shadow:0 2px 16px rgba(0,0,0,0.15);">
                <div style="font-size:18px;font-weight:bold;margin-bottom:12px;">插入图片</div>
                <div style="margin-bottom:10px;">
                    <label style="display:block;font-size:14px;margin-bottom:4px;">标题（可选）</label>
                    <input id="img-insert-title" type="text" style="width:100%;padding:6px 8px;border:1px solid #ccc;border-radius:4px;">
                </div>
                <div style="margin-bottom:10px;">
                    <label style="display:block;font-size:14px;margin-bottom:4px;">图片地址 <span style="color:red">*</span></label>
                    <input id="img-insert-url" type="text" style="width:100%;padding:6px 8px;border:1px solid #ccc;border-radius:4px;" required>
                </div>
                <div style="text-align:right;">
                    <button id="img-insert-cancel" style="margin-right:10px;padding:6px 16px;">取消</button>
                    <button id="img-insert-confirm" style="background:#007bff;color:#fff;padding:6px 16px;border:none;border-radius:4px;">插入</button>
                </div>
            </div>
        </div>`;
        document.body.appendChild(modal);
        document.getElementById('img-insert-cancel').onclick = function() {
            document.body.removeChild(modal);
        };
        document.getElementById('img-insert-confirm').onclick = function() {
            let url = document.getElementById('img-insert-url').value.trim();
            let title = document.getElementById('img-insert-title').value.trim();
            if (!url) {
                alert('图片地址不能为空！');
                return;
            }
            let tag = `<img src=\"${url}\"` + (title ? ` alt=\"${title}\" title=\"${title}\"` : '') + ` />`;
            let textarea = document.getElementById('comment');
            if (textarea) {
                let start = textarea.selectionStart, end = textarea.selectionEnd;
                let val = textarea.value;
                textarea.value = val.substring(0, start) + tag + val.substring(end);
                textarea.focus();
                textarea.selectionStart = textarea.selectionEnd = start + tag.length;
            }
            document.body.removeChild(modal);
        };
    });
});
</script>