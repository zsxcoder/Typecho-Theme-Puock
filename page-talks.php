<?php 
/**
 * 说说页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="breadcrumb" class="animated fadeInUp">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a class="a-link" href="<?php $this->options->siteUrl(); ?>">首页</a></li>
<li class="breadcrumb-item active " aria-current="page"><?php $this->title() ?></li>
</ol>
</nav>
<div id="page-moments">
    <div class="row">
        <?php if ($this->options->showsidebar): ?>    
        <div id="posts" class="col-lg-8 col-md-12 animated fadeInLeft ">
        <?php else: ?>
        <div id="posts" class="col-lg-12 col-md-12">
        <?php endif; ?>
    <?php $tooot = $this->fields->tooot ? $this->fields->tooot : 'https://www.imsun.org/toot.json'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/15.0.12/marked.min.js" integrity="sha512-rCQgmUulW6f6QegOvTntKKb5IAoxTpGVCdWqYjkXEpzAns6XUFs8NKVqWe+KQpctp/EoRSFSuykVputqknLYMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/css/lightbox.min.css" integrity="sha512-xtV3HfYNbQXS/1R1jP53KbFcU9WXiSA1RFKzl5hRlJgdOJm4OxHCWYpskm6lN0xp0XtKGpAfVShpbvlFH3MDAA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.5/js/lightbox.min.js" integrity="sha512-KbRFbjA5bwNan6DvPl1ODUolvTTZ/vckssnFhka5cG80JVa5zSlRPCr055xSgU/q6oMIGhZWLhcbgIC0fyw3RQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div id="tooot"></div>
</div>
<script>
function fetchAndDisplayToots() {
    let offset = 0;
    const limit = 20;
    function formatHTML(toots) {
        let htmlString = '';
        toots.forEach(toot => {
            const isReblog = toot.reblog && toot.reblog.content;
            const content = isReblog ? toot.reblog.content : toot.content;
            const url = isReblog ? toot.reblog.url : toot.url;
            const account = isReblog ? toot.reblog.account : toot.account;
            const created_at = isReblog ? toot.reblog.created_at : toot.created_at;
            const media_attachments = isReblog ? toot.reblog.media_attachments : toot.media_attachments;
            let mediaHTML = '';
            if (media_attachments && media_attachments.length > 0) {
                media_attachments.forEach(attachment => {
                    if (attachment.type === 'image') {
                        mediaHTML += `<a href="${attachment.url}" target="_blank" data-lightbox="image-set"><img src="${attachment.preview_url}" class="thumbnail-image img" ></a>`;
                    }
                });
            }
            const htmlContent = marked.parse(content || '');
            htmlString += `
            <div class="mb20 puock-text moments-item">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <a class="meta ta3" href="${account.url}" target="_blank" rel="nofollow">
                            <div class="avatar mb10">
                                <img src='${account.avatar}'
                                    class='lazy md-avatar mt-1'
                                    data-src='${account.avatar}'
                                    alt="${account.display_name}" title="${account.display_name}">
                            </div>
                            <div class="t-line-1 info fs12">${account.display_name}</div>
                        </a>
                    </div>
                    <div class="col-12 col-md-11">
                        <div class="p-block moment-content-box"> <span class="al"></span>
                            <div class="mt10 moment-content entry-content show-link-icon">
                                <p>${htmlContent}</p>
                                <div class="resimg">${mediaHTML}</div>
                            </div>
                            <div class="mt10 moment-footer p-flex-s-right"> <span class="t-sm c-sub">
                            <a class="c-sub-a" href="${url}">
                            <span class="mr-2"><i class="fa-regular fa-clock mr-1"></i>${new Date(created_at).toLocaleString()}</span>
                             </a>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         `;
        });
        return htmlString;
    }
    function fetchToots() {
        return fetch('<?php echo $tooot; ?>')
            .then(response => response.json())
            .catch(error => {
                console.error('Error fetching toots:', error);
                return [];
            });
    }
    const memosContainer = document.getElementById('tooot');
    if (memosContainer) memosContainer.innerHTML = '';
    fetchToots().then(data => {
        if (!Array.isArray(data)) {
            console.error('toot.json is not an array:', data);
            return;
        }
        const tootsToShow = data.slice(offset, offset + limit);
        if (memosContainer) memosContainer.innerHTML += formatHTML(tootsToShow);
    });
}

// 保证首次和 pjax 都能调用
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", fetchAndDisplayToots);
} else {
  fetchAndDisplayToots();
}
document.addEventListener('pjax:end', fetchAndDisplayToots);
</script>      
<style>
div pre code {
  white-space: pre-wrap;  
  word-wrap: break-word; 
  overflow-wrap: break-word;  
  word-break: break-all;  
  word-break: break-word;  
}
div p a {
    word-break: break-all;  
  word-break: break-word;  
}
.resimg {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    column-gap: 10px; 
    row-gap: 10px; 
}
/* 单个缩略图的样式 */
.thumbnail-image {
    width: 100%; /* 确保其宽度填满父容器 */
    height: 200px; /* 固定高度 */
    display: flex; /* 使用 flexbox 居中 */
    align-items: center; /* 垂直居中 */
    justify-content: center; /* 水平居中 */
    overflow: hidden; /* 确保容器内的多余内容不会显示出来 */
    border-radius: 4px; /* 圆角 */
    transition: transform .3s ease; /* 鼠标悬停时的过渡效果 */
    cursor: zoom-in; /* 鼠标指针变为放大镜 */
}
img {
    object-fit: cover; /* 保持图片的纵横比，但会将图片裁剪以填充容器 */
    object-position: center; /* 保证中央部分 */
}
/* 缩略图内的图片样式 */
.thumbnail-image img {
    width: 100%;
    min-height: 200px;
} 
/* 当屏幕宽度小于732px时 */
@media (max-width: 732px) {
    .resimg {
        grid-template-columns: repeat(2, 1fr); /* 修改为两列 */
    }
}
/* 当屏幕宽度小于400px时 */
@media (max-width: 400px) {
    .resimg {
        grid-template-columns: 1fr; /* 修改为一列 */
    }
    .thumbnail-image img {
       width: 100%;
       height: 480px;
} 
} 
</style> 
<?php if ($this->options->showsidebar): ?>             
<?php $this->need('sidebar.php'); ?> 
<?php endif; ?>
</div>
</div>
<?php $this->need('footer.php'); ?>