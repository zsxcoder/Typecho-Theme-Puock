<?php 
/**
 * 文章归档
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
</div>   
<div id="page-archives">
    <div id="page" class="w-100">
        <div id="posts" class="animated fadeInLeft ">
            <div class="p-block puock-text">
                <div class="timeline no-style">
    <?php
    $stat = Typecho_Widget::widget('Widget_Stat');
    Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
    $year = 0; 
    $mon = 0;
    $output = '';
    
    while ($archives->next()) {
        $year_tmp = date('Y', $archives->created);
        $mon_tmp = date('m', $archives->created);
        $day_tmp = date('d', $archives->created);
        
        // 检查是否需要新的时间线项目
        if ($year != $year_tmp || $mon != $mon_tmp) {
            // 如果不是第一个项目，先关闭之前的ul
            if ($year > 0 && $mon > 0) {
                $output .= '</ul></div></div>';
            }
            
            $year = $year_tmp;
            $mon = $mon_tmp;
            
            // 开始新的时间线项目
            $output .= '<div class="timeline-item">';
            $output .= '<div class="timeline-location"></div>';
            $output .= '<div class="timeline-content">';
            $output .= '<h4>' . $year . '-' . $mon . '</h4>';
            $output .= '<ul class="pd-links pl-0">';
        }
        
        // 输出文章项
        $output .= '<li><a title="' . $archives->title . '" href="' . $archives->permalink . '">';
        $output .= $archives->title . '&nbsp;（&nbsp;' . $day_tmp . '日&nbsp;）</a></li>';
    }
    
    // 循环结束后关闭最后的标签
    if ($year > 0 && $mon > 0) {
        $output .= '</ul></div></div>';
    }
    
    echo $output;
    ?>
 </div> </div> </div> </div> </div> 
 
<?php $this->need('footer.php'); ?>
