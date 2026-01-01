<?php
/**
 * 关于页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<style>
/* ============================================
   关于页面完整样式 - 完美移植参考项目
   ============================================ */

/* 基础变量 */
:root {
    --anzhiyu-fontcolor: #4c4948;
    --anzhiyu-background: #f7f9f9;
    --anzhiyu-card-bg: #fff;
    --anzhiyu-secondtext: #4c4948;
    --anzhiyu-main: #425aef;
    --anzhiyu-white: #fff;
    --anzhiyu-gray: #4c4948;
    --anzhiyu-main-op: #425aef;
    --anzhiyu-main-op-deep: #3b3dcd;
    --anzhiyu-white-op: rgba(255, 255, 255, 0.7);
    --style-border-always: 1px solid rgba(0, 0, 0, 0.08);
    --anzhiyu-shadow-border: 0 8px 16px -4px rgba(0, 0, 0, 0.04);
    --anzhiyu-shadow-blackdeep: 0 8px 16px -4px rgba(0, 0, 0, 0.08);
    --anzhiyu-shadow-main: 0 8px 16px -4px rgba(66, 90, 239, 0.25);
    --anzhiyu-shadow-blue: 0 8px 16px -4px rgba(66, 90, 239, 0.3);
    --anzhiyu-shadow-lightblack: 0 8px 16px -4px rgba(0, 0, 0, 0.08);
    --anzhiyu-info: #425aef;
    --anzhiyu-red: #ff6d6d;
    --anzhiyu-green: #4caf50;
    --global-font-size: 15px;
}

/* 主容器 */
#about-page {
    padding-top: 1rem;
    max-width: 1400px;
    margin: 0 auto;
    padding-left: 20px;
    padding-right: 20px;
    position: relative;
    z-index: 1;
    margin-top: 60px;
}

/* 内容区域容器 */
.author-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 100%;
    margin-top: 1rem;
    gap: 2%;
}

/* 卡片基础样式 */
.author-content-item {
    border-radius: 24px;
    background: var(--anzhiyu-card-bg);
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    padding: 1.5rem 2rem;
    overflow: hidden;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.author-content-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-item.single {
    width: 100%;
}

/* ============================================
   头像和基本信息区域 (AuthorSection)
   ============================================ */
.author-section {
    margin-bottom: 2rem;
}

.author-box {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 0 16px 0;
    animation: slide-in 0.6s 0.1s backwards;
}

/* 头像标签 */
.author-tag-left {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.author-tag-left .author-tag:first-child,
.author-tag-left .author-tag:last-child {
    margin-right: -16px;
}

.author-tag-right {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.author-tag-right .author-tag:first-child,
.author-tag-right .author-tag:last-child {
    margin-left: -16px;
}

.author-tag {
    transform: translate(0, -4px);
    padding: 1px 8px;
    background: var(--anzhiyu-card-bg);
    border: var(--style-border-always);
    border-radius: 40px;
    margin-top: 6px;
    font-size: 14px;
    font-weight: 700;
    box-shadow: var(--anzhiyu-shadow-lightblack);
    animation: 6s ease-in-out 0s infinite normal both running floating;
}

/* 左侧标签动画延迟 */
.author-tag-left .author-tag:nth-child(1) {
    animation-delay: 0s;
}

.author-tag-left .author-tag:nth-child(2) {
    animation-delay: 0.6s;
}

.author-tag-left .author-tag:nth-child(3) {
    animation-delay: 1.2s;
}

.author-tag-left .author-tag:nth-child(4) {
    animation-delay: 1.8s;
}

/* 右侧标签动画延迟 */
.author-tag-right .author-tag:nth-child(1) {
    animation-delay: 0s;
}

.author-tag-right .author-tag:nth-child(2) {
    animation-delay: 0.6s;
}

.author-tag-right .author-tag:nth-child(3) {
    animation-delay: 1.2s;
}

.author-tag-right .author-tag:nth-child(4) {
    animation-delay: 1.8s;
}

.author-img {
    margin: 0 30px;
    border-radius: 50%;
    width: 180px;
    height: 180px;
    position: relative;
    background: var(--anzhiyu-card-bg);
    user-select: none;
    transition: 0.3s;
}

.author-img img {
    border-radius: 50%;
    width: 180px;
    height: 180px;
    object-fit: cover;
    transition: all 0.3s ease;
}

.author-img:hover {
    transform: scale(1.1);
}

.author-img:before {
    content: '';
    transition: 1s;
    width: 30px;
    height: 30px;
    background: var(--anzhiyu-green);
    position: absolute;
    border-radius: 50%;
    border: 5px solid var(--anzhiyu-background);
    bottom: 5px;
    right: 10px;
    z-index: 2;
}

.author-title-section {
    text-align: center;
    margin-top: 20px;
    animation: slide-in 0.6s 0.2s backwards;
}

.p.center {
    text-align: center;
    margin: 0;
}

.p.logo.large {
    font-size: 2em;
    font-weight: 700;
    color: var(--anzhiyu-fontcolor);
    margin: 0.67em 0;
    line-height: 1.2;
}

.p.small {
    font-size: var(--global-font-size);
    color: var(--anzhiyu-secondtext);
    margin: 0.5em 0;
    line-height: 1.5;
}

/* ============================================
   自我介绍和追求区域 (IntroSection)
   ============================================ */
.myInfoAndSayHello {
    width: 59% !important;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: var(--anzhiyu-white);
    background: linear-gradient(120deg, #5b27ff 0%, #00d4ff 100%) !important;
    background-size: 200%;
    animation: gradient 15s ease infinite;
    min-height: 200px;
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    padding: 1rem 2rem;
    overflow: hidden;
    transition: all 0.3s ease;
}

.myInfoAndSayHello:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.aboutsiteTips {
    width: 39%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    min-height: 200px;
}

.title1 {
    opacity: 0.8;
    line-height: 1.3;
    color: inherit;
    margin: 0.5rem 0;
    font-size: var(--global-font-size);
}

.title2 {
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    margin: 0.5rem 0;
    color: inherit;
}

.inline-word {
    word-break: keep-all;
    white-space: nowrap;
    font-weight: inherit;
}

.aboutsiteTips h2 {
    margin-right: auto;
    font-size: 36px;
    font-family: Helvetica, Arial, sans-serif;
    line-height: 1.06;
    letter-spacing: -0.02em;
    color: var(--anzhiyu-fontcolor);
    margin-top: 0;
    margin-bottom: 0;
}

/* ============================================
   技能和生涯区域 (SkillsSection)
   ============================================ */
.skills-careers-container {
    width: 100%;
    display: flex;
    gap: 2%;
    align-items: stretch;
    animation: slide-in 0.6s 0.5s backwards;
}

.author-content-item.skills {
    width: 49%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-direction: column;
    min-height: 450px;
    position: relative;
}

.author-content-item.careers {
    width: 49%;
    min-height: 400px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position-x: right;
    background-position-y: bottom;
}

/* 技能展示区域 */
.skills .card-content {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 2;
    display: flex;
    flex-direction: column;
    padding: 1rem 2rem;
}

.skills .author-content-item-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.skills-style-group {
    position: relative;
    overflow: hidden;
}

#skills-tags-group-all {
    display: flex;
    transform: rotate(0);
    transition: .3s;
    overflow: hidden;
    margin-top: 10px;
}

#skills-tags-group-all .tags-group-wrapper {
    margin-top: 40px;
    display: flex;
    flex-wrap: nowrap;
    animation: rowup 25s linear infinite;
}

#skills-tags-group-all .tags-group-icon-pair {
    margin-left: 1rem;
}

#skills-tags-group-all .tags-group-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 66px;
    font-weight: 700;
    box-shadow: var(--anzhiyu-shadow-blackdeep);
    width: 120px;
    height: 120px;
    border-radius: 30px;
    transition: all 0.3s ease;
    cursor: pointer;
}

#skills-tags-group-all .tags-group-icon img {
    width: 60px;
    margin: 0 auto !important;
}

#skills-tags-group-all .tags-group-icon-pair .tags-group-icon:nth-child(even) {
    margin-top: 1rem;
    transform: translate(-60px);
}

.skills-list {
    display: flex;
    opacity: 0;
    transition: .3s;
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    flex-wrap: wrap;
    flex-direction: row;
    margin-top: 10px;
}

.skills .skill-info {
    display: flex;
    align-items: center;
    margin-right: 10px;
    margin-top: 10px;
    background: var(--anzhiyu-background);
    border-radius: 40px;
    padding: 4px 12px 4px 8px;
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
}

.skills .skill-icon {
    width: 32px;
    height: 32px;
    border-radius: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 8px;
}

.skills .skill-icon img {
    width: 18px;
    height: 18px;
    margin: 0 auto !important;
}

.author-content-item.skills:hover .skills-style-group #skills-tags-group-all {
    opacity: 0;
}

.author-content-item.skills:hover .skills-style-group .skills-list {
    opacity: 1;
}

/* 生涯经历区域 */
.careers .card-content {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 2;
    display: flex;
    flex-direction: column;
    padding: 1rem 2rem;
}

.careers .author-content-item-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 0.5rem;
}

.careers-group {
    display: flex;
    flex-direction: column;
    height: 100%;
    margin-top: 12px;
    margin-bottom: 12px;
}

.careers-item {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 10px;
}

.careers-item .circle {
    width: 16px;
    height: 16px;
    margin-top: 3px;
    margin-right: 8px;
    border-radius: 50%;
}

.careers-item .name {
    color: var(--anzhiyu-secondtext);
    font-size: var(--global-font-size);
}

.careers img {
    position: absolute;
    left: 0;
    bottom: 20px;
    width: 100%;
    transition: 0.6s;
}

.etc {
    text-align: center;
    color: var(--anzhiyu-gray);
    font-size: 1.5rem;
    grid-column: 1 / -1;
    margin-top: 10px;
}

/* ============================================
   座右铭卡片 (MaximSection)
   ============================================ */
.author-content-item.maxim {
    width: 39%;
    min-height: 120px;
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.maxim-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    color: var(--anzhiyu-fontcolor);
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: center;
}

.maxim-title span:last-child {
    background: linear-gradient(120deg, #5b27ff 0%, #00d4ff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* ============================================
   特长卡片 (BuffSection)
   ============================================ */
.author-content-item.buff {
    width: 59%;
    height: 200px;
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    display: -webkit-box;
    display: -moz-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: box;
    display: flex;
    -webkit-box-align: start;
    -moz-box-align: start;
    -o-box-align: start;
    -ms-flex-align: start;
    -webkit-align-items: flex-start;
    align-items: flex-start;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    -o-box-orient: vertical;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -moz-box-pack: center;
    -o-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    background: linear-gradient(120deg, #ff27e8 0, #ff8000 100%);
    color: var(--anzhiyu-white);
    background-size: 200%;
    -webkit-animation: gradient 15s ease infinite;
    -moz-animation: gradient 15s ease infinite;
    -o-animation: gradient 15s ease infinite;
    -ms-animation: gradient 15s ease infinite;
    animation: gradient 15s ease infinite;
    min-height: 200px;
    height: fit-content;
    border-radius: 24px;
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.5s backwards;
}

.author-content-item.buff:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-item-tips {
    opacity: 0.8;
    font-size: 12px;
    margin-bottom: 0.5rem;
    color: var(--anzhiyu-secondtext);
}

.author-content-item.buff .author-content-item-tips {
    opacity: 0.8;
    font-size: 12px;
    margin-bottom: 1rem;
    color: var(--anzhiyu-white);
}

.buff-title {
    display: -webkit-box;
    display: -moz-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: box;
    display: flex;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    -o-box-orient: vertical;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    font-size: 36px;
    font-weight: 700;
    line-height: 1.1;
    color: var(--anzhiyu-white);
}

.buff-title span:first-child {
    margin-bottom: 8px;
}

.buff-title span:last-child {
    font-weight: 800;
}

.card-background-icon {
    font-size: 12rem;
    opacity: .2;
    position: absolute;
    right: 0;
    bottom: -40%;
    -webkit-transform: rotate(30deg);
    -moz-transform: rotate(30deg);
    -o-transform: rotate(30deg);
    -ms-transform: rotate(30deg);
    transform: rotate(30deg);
    -webkit-transition: 2s ease-in-out;
    -moz-transition: 2s ease-in-out;
    -o-transition: 2s ease-in-out;
    -ms-transition: 2s ease-in-out;
    transition: 2s ease-in-out;
}

.card-background-icon i {
    font-size: 12rem;
}

.author-content-item.buff:hover .card-background-icon {
    -webkit-transform: rotate(20deg);
    -moz-transform: rotate(20deg);
    -o-transform: rotate(20deg);
    -ms-transform: rotate(20deg);
    transform: rotate(20deg);
}

/* ============================================
   性格类型卡片 (PersonalitiesSection)
   ============================================ */
.author-content-item.personalities {
    width: 49%;
    border-radius: 24px;
    background: var(--anzhiyu-card-bg);
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    padding: 1rem 2rem;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.4s backwards;
    box-sizing: border-box;
}

.author-content-item.personalities:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-item.personalities .image {
    position: absolute;
    right: 30px;
    top: 10px;
    width: 220px;
    transition: all 0.3s ease;
}

.author-content-item.personalities .image img {
    width: 100%;
    height: auto;
    transition: all 0.3s ease;
}

.author-content-item.personalities:hover .image {
    transform: scale(1.05);
}

.author-content-item-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 0.5rem;
    color: var(--anzhiyu-fontcolor);
    display: block;
}

.title2 {
    font-size: 36px;
    font-weight: 600;
    line-height: 1.2;
    margin-bottom: 1rem;
}

.post-tips {
    font-size: 14px;
    color: var(--anzhiyu-gray);
    position: absolute;
    bottom: 1rem;
    left: 2rem;
}

.post-tips a {
    color: var(--anzhiyu-gray);
    text-decoration: none;
    transition: all 0.3s ease;
}

.post-tips a:hover {
    color: var(--anzhiyu-main);
}

/* ============================================
   个人照片卡片 (MyPhotoSection)
   ============================================ */
.author-content-item.myPhoto {
    width: 49%;
    border-radius: 24px;
    background: var(--anzhiyu-card-bg);
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    padding: 0;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.4s backwards;
    box-sizing: border-box;
}

.author-content-item.myPhoto:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 24px;
    transition: all 0.3s ease;
    min-height: 250px;
}

.author-content-img:hover {
    transform: scale(1.02);
}

/* ============================================
   游戏爱好卡片 (GameSection)
   ============================================ */
.author-content-item.game {
    width: 59%;
    background-size: cover;
    min-height: 300px;
    overflow: hidden;
    color: var(--anzhiyu-white);
    border-radius: 24px;
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.6s backwards;
}

.author-content-item.game:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-item.game::after {
    -webkit-box-shadow: 0 -69px 203px 11px #575d8b inset;
    box-shadow: 0 -69px 203px 11px #575d8b inset;
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.card-content {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 2;
    display: -webkit-box;
    display: -moz-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: box;
    display: flex;
    -webkit-box-orient: vertical;
    -moz-box-orient: vertical;
    -o-box-orient: vertical;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    padding: 1rem 2rem;
    border-radius: 24px;
    color: var(--anzhiyu-white);
    min-height: 300px;
}

.content-bottom {
    margin-top: auto;
    display: -webkit-box;
    display: -moz-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: box;
    display: flex;
    -webkit-box-align: center;
    -moz-box-align: center;
    -o-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
    -webkit-box-pack: justify;
    -moz-box-pack: justify;
    -o-box-pack: justify;
    -ms-flex-pack: justify;
    -webkit-justify-content: space-between;
    justify-content: space-between;
}

.author-content-item.game .author-content-item-tips {
    opacity: 0.8;
    font-size: 12px;
    margin-bottom: 0.5rem;
    color: var(--anzhiyu-white);
}

.author-content-item.game .author-content-item-title {
    font-size: 36px;
    font-weight: 700;
    line-height: 1;
    color: var(--anzhiyu-white);
    margin-bottom: 0.5rem;
}

/* ============================================
   番剧爱好卡片 (ComicSection)
   ============================================ */
.author-content-item.comic {
    width: 39%;
    min-height: 300px;
    overflow: hidden;
    border-radius: 24px;
    background: var(--anzhiyu-card-bg);
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.6s backwards;
}

.author-content-item.comic::after {
    -webkit-box-shadow: 0 -48px 203px 11px #fbe9b8 inset;
    box-shadow: 0 -48px 203px 11px #fbe9b8 inset;
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.author-content-item.comic:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.comic-box {
    display: -webkit-box;
    display: -moz-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: box;
    display: flex;
    width: 120%;
    height: 100%;
    position: absolute;
    left: 50%;
    top: 0;
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
}

.comic-item {
    height: 100%;
    color: #fff;
    width: 20%;
    -webkit-transform: skew(-10deg, 0deg);
    -moz-transform: skew(-10deg, 0deg);
    -o-transform: skew(-10deg, 0deg);
    -ms-transform: skew(-10deg, 0deg);
    transform: skew(-10deg, 0deg);
    -webkit-transition: .8s;
    -moz-transition: .8s;
    -o-transition: .8s;
    -ms-transition: .8s;
    transition: .8s;
    position: relative;
    overflow: hidden;
    display: block;
    text-decoration: none;
}

.comic-item:hover {
    width: 46%;
}

.comic-item-cover {
    position: absolute;
    top: 0;
    left: -50%;
    height: 100%;
    -webkit-transform: skew(10deg, 0deg);
    -moz-transform: skew(10deg, 0deg);
    -o-transform: skew(10deg, 0deg);
    -ms-transform: skew(10deg, 0deg);
    transform: skew(10deg, 0deg);
    object-fit: cover;
    -webkit-transition: scale .2s, all .8s;
    -moz-transition: scale .2s, all .8s;
    -o-transition: scale .2s, all .8s;
    -ms-transition: scale .2s, all .8s;
    transition: scale .2s, all .8s;
}

.comic-item-cover img {
    height: 100%;
    -webkit-transition: .8s;
    -moz-transition: .8s;
    -o-transition: .8s;
    -ms-transition: .8s;
    transition: .8s;
    max-width: none;
    border-radius: 0;
    object-fit: cover;
}

.comic-item:hover .comic-item-cover {
    left: 16%;
    -webkit-transform: skew(10deg, 0deg) scale(1.6);
    -moz-transform: skew(10deg, 0deg) scale(1.6);
    -o-transform: skew(10deg, 0deg) scale(1.6);
    -ms-transform: skew(10deg, 0deg) scale(1.6);
    transform: skew(10deg, 0deg) scale(1.6);
}

/* ============================================
   关注偏好卡片 (TechnologySection)
   ============================================ */
.author-content-item.technology {
    width: 49%;
    min-height: 230px;
    color: var(--anzhiyu-white);
    border-radius: 24px;
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    padding: 0;
    overflow: hidden;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.7s backwards;
    background-size: cover !important;
}

.author-content-item.technology:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-item.technology .author-content-item-tips {
    opacity: 0.9;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 0.5rem;
}

.author-content-item.technology .author-content-item-title {
    font-size: 32px;
    font-weight: 700;
    line-height: 1;
    color: var(--anzhiyu-white);
    margin-bottom: auto;
}

/* ============================================
   数据统计和个人信息区域 (StatisticSection)
   ============================================ */
.about-statistic {
    width: 39%;
    min-height: 380px;
    color: var(--anzhiyu-white);
}

/* 统计样式 - 严格按照安知鱼官方规范 */
#statistic {
    font-size: 16px;
    border-radius: 15px;
    width: 100%;
    color: var(--anzhiyu-white);
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    flex-wrap: wrap;
    margin-top: 1rem;
    margin-bottom: 2rem;
}

#statistic div span:first-child {
    opacity: .8;
    font-size: 12px;
}

#statistic div span:last-child {
    font-weight: 700;
    font-size: 34px;
    line-height: 1;
    white-space: nowrap;
}

#statistic div {
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    width: 50%;
    margin-bottom: .5rem;
}

/* 地图和个人信息 */
.author-content-item-group.column {
    width: 59%;
    display: flex;
    flex-direction: column;
    gap: 20px;
    min-height: 420px; /* 增加高度以防止内容被遮挡 */
    overflow: visible;
}

.author-content-item.map {
    background-image: url(https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/custom/map-nanjing.webp);
    min-height: 160px;
    position: relative;
    overflow: hidden;
    flex: 1.5; /* 地图占较大比例 */
    background-size: cover;
    background-position: center;
    border-radius: 16px;
}

.author-content-item.map:hover {
    background-size: 110%;
    transition: background-size 3s ease-in-out;
}

.author-content-item.map .map-title {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    color: var(--font-color);
    background: var(--anzhiyu-maskbg);
    padding: .75rem 2rem;
    backdrop-filter: saturate(180%) blur(20px);
    -webkit-backdrop-filter: blur(20px);
    transform: translateZ(0);
    transition: all 0.5s ease;
    font-size: 18px;
    border-radius: 0 0 16px 16px;
}

.author-content-item.map .map-title b {
    color: var(--font-color);
}

/* 深色主题的背景图 */
body.puock-dark .author-content-item.map {
    background-image: url(https://img02.anheyu.com/adminuploads/1/2022/09/26/6330ebf1f3e65.jpg);
}

.author-content-item.selfInfo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    flex: 1; /* 个人信息占较小比例 */
    padding: 1.5rem;
    border-radius: 16px;
    background: var(--anzhiyu-card-bg);
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    overflow: visible;
    min-height: 140px;
}

.author-content-item.selfInfo div {
    display: flex;
    flex-direction: column;
    margin: .5rem 1rem .5rem 0;
    min-width: 100px;
}

.author-content-item.selfInfo .selfInfo-title {
    opacity: .8;
    font-size: 12px;
    line-height: 1;
    margin-bottom: 8px;
}

.author-content-item.selfInfo .selfInfo-content {
    font-weight: 700;
    font-size: 24px;
    line-height: 1;
    word-break: break-word;
    overflow-wrap: break-word;
}

/* ============================================
   音乐偏好卡片 (MusicSection)
   ============================================ */
.author-content-item.music {
    width: 49%;
    min-height: 400px;
    color: var(--anzhiyu-white);
    overflow: hidden;
    border-radius: 24px;
    border: var(--style-border-always);
    box-shadow: var(--anzhiyu-shadow-border);
    position: relative;
    padding: 0;
    transition: all 0.3s ease;
    animation: slide-in 0.6s 0.7s backwards;
    background-size: cover !important;
    background-position: center !important;
}

.author-content-item.music:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.author-content-item.music::after {
    -webkit-box-shadow: 0 -69px 203px 11px #453e38 inset;
    box-shadow: 0 -69px 203px 11px #453e38 inset;
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.author-content-item.music .card-content {
    position: relative;
    z-index: 2;
    padding: 1rem 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border-radius: 24px;
    color: var(--anzhiyu-white);
    min-height: 400px;
}

.author-content-item.music .author-content-item-tips {
    opacity: 0.9;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 0.5rem;
}

.author-content-item.music .author-content-item-title {
    font-size: 24px;
    font-weight: 700;
    line-height: 1.2;
    color: var(--anzhiyu-white);
    margin-bottom: auto;
}

.banner-button-group {
    position: absolute;
    bottom: 1.5rem;
    right: 2rem;
}

.banner-button {
    height: 40px;
    border-radius: 20px;
    justify-content: center;
    background: var(--anzhiyu-white-op);
    color: var(--anzhiyu-white);
    display: inline-flex;
    align-items: center;
    z-index: 1;
    transition: .3s;
    cursor: pointer;
    border-bottom: 0 !important;
    backdrop-filter: saturate(180%) blur(20px);
    -webkit-backdrop-filter: blur(20px);
    transform: translateZ(0);
    padding: 8px 12px;
    text-decoration: none;
}

.banner-button:hover {
    background: var(--anzhiyu-info);
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blue);
}

.banner-button i {
    font-size: 14px;
}

.banner-button-text {
    font-size: 14px;
}



/* ============================================
   心路历程区域 (JourneySection)
   ============================================ */
.create-site-post {
    grid-column: 1 / -1;
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--anzhiyu-fontcolor);
    background: linear-gradient(135deg, var(--anzhiyu-card-bg), var(--anzhiyu-card-bg));
}

.create-site-post strong {
    color: var(--anzhiyu-main);
    font-weight: 600;
}

.psw {
    color: var(--anzhiyu-secondtext);
    font-style: italic;
}

del {
    color: var(--anzhiyu-red);
    text-decoration: line-through;
}

.site-card-group {
    margin-top: 20px;
    display: flex;
    justify-content: center;
}

.site-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: var(--anzhiyu-card-bg);
    border: 1px solid var(--anzhiyu-card-border);
    border-radius: 12px;
    text-decoration: none;
    color: var(--anzhiyu-fontcolor);
    transition: all 0.3s ease;
    max-width: 300px;
}

.site-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--anzhiyu-shadow-blackdeep);
}

.site-card img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
}

.site-card-info {
    flex: 1;
}

.site-card-title {
    font-weight: 600;
    color: var(--anzhiyu-fontcolor);
    margin-bottom: 5px;
}

.site-card-desc {
    font-size: 0.9rem;
    color: var(--anzhiyu-secondtext);
}

/* ============================================
   社交媒体区域
   ============================================ */
.btn {
    padding: 8px 16px;
    border-radius: 20px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-primary {
    background: var(--anzhiyu-main);
    color: var(--anzhiyu-white);
    box-shadow: var(--anzhiyu-shadow-main);
}

.btn-primary:hover {
    background: var(--anzhiyu-main-op-deep);
    transform: translateY(-2px);
}

/* ============================================
   动画关键帧
   ============================================ */
@keyframes slide-in {
    0% {
        transform: translateY(20px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes rowup {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

@keyframes gradient {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

@keyframes floating {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-8px);
    }
}

/* ============================================
   响应式设计
   ============================================ */
@media screen and (max-width: 768px) {
    #about-page {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* 隐藏移动端标签 */
    .hidden-mobile {
        display: none !important;
    }

    .author-content {
        flex-direction: column;
        gap: 1rem;
    }

    .author-content-item,
    .author-content-item.single,
    .author-content-item.wide,
    .author-content-item.narrow,
    .author-content-item.personalities,
    .author-content-item.myPhoto,
    .author-content-item.buff,
    .author-content-item.game,
    .author-content-item.comic,
    .author-content-item.technology,
    .author-content-item.music {
        width: 100% !important;
        padding: 1rem;
    }

    .author-img {
        width: 120px;
        height: 120px;
    }

    .author-img img {
        width: 120px;
        height: 120px;
    }

    .author-img:before {
        bottom: -5px;
        right: -5px;
    }

    .p.logo.large {
        font-size: 28px;
    }

    .skills-careers-container {
        flex-direction: column;
    }

    .author-content-item.skills,
    .author-content-item.careers {
        width: 100%;
    }

    .title2,
    .author-content-item-title,
    .aboutsiteTips h2,
    .maxim-title {
        font-size: 24px;
    }

    .myInfoAndSayHello,
    .aboutsiteTips {
        width: 100% !important;
        margin-top: 1rem;
    }

    .author-content-item.personalities {
        height: 200px;
        width: 100% !important;
        padding: 1rem;
    }

    .post-tips {
        left: auto;
    }

    .author-content-item-title {
        font-size: 28px;
    }

    .title2 {
        font-size: 20px;
    }

    .author-content-item.buff {
        width: 100% !important;
        min-height: 150px;
        min-height: 200px;
        height: auto;
    }

    .card-content {
        padding: 1rem;
    }

    .buff-title {
        font-size: 36px;
    }

    .card-background-icon {
        font-size: 8rem;
        right: -20px;
        bottom: -30%;
    }

    .card-background-icon i {
        font-size: 8rem;
    }

    .author-content-item.myPhoto {
        width: 100% !important;
    }

    .author-content-img {
        min-height: 200px;
    }

    .comic-box {
        flex-direction: column;
    }

    .comic-item {
        width: 100% !important;
        height: auto;
        margin-bottom: 10px;
    }

    .author-content-item.technology {
        width: 100% !important;
        min-height: 230px;
    }

    .card-content {
        padding: 1rem;
        min-height: 230px;
    }

    .author-content-item-title {
        font-size: 36px;
    }

    .author-content-item.music {
        width: 100% !important;
        min-height: 400px;
    }



    .banner-button {
        padding: 6px 12px;
        font-size: 11px;
    }

    .banner-button i,
    .banner-button-text {
        font-size: 11px;
    }

    /* 统计和个人信息响应式 */
    .author-content-item-group.column {
        width: 100% !important;
    }

    .about-statistic {
        width: 100% !important;
    }

    .author-content-item.selfInfo {
        height: auto;
        min-height: auto;
    }

    #statistic {
        flex-direction: row;
    }

    .site-card {
        flex-direction: column;
        text-align: center;
    }
}





/* ============================================
   明暗主题适配 - Typecho Puock主题
   ============================================ */

/* 浅色模式 */
body.puock-light #about-page {
    --anzhiyu-fontcolor: #4c4948;
    --anzhiyu-background: #f7f9f9;
    --anzhiyu-card-bg: #fff;
    --anzhiyu-secondtext: #4c4948;
    --anzhiyu-white: #fff;
    --anzhiyu-gray: #4c4948;
}

/* 暗色模式 */
body.puock-dark #about-page {
    --anzhiyu-fontcolor: #f2b2b2;
    --anzhiyu-background: #1e1e1e;
    --anzhiyu-card-bg: #2d2d2d;
    --anzhiyu-secondtext: #a1a1a1;
    --anzhiyu-white: #f2b2b2;
    --anzhiyu-gray: #a1a1a1;
}



body.puock-light .skills .skill-info {
    background: #f0f0f0;
    border-color: rgba(0, 0, 0, 0.12);
}

body.puock-light .skills .skill-icon {
    background: #ffffff;
}

body.puock-light .skills .skill-icon i {
    color: #4c4948;
}

body.puock-light .skills .skill-name {
    color: #333;
}

body.puock-dark .skills .skill-name {
    color: #e0e0e0;
}

body.puock-dark .skills .skill-icon {
    background: #333;
}

body.puock-dark .skills .skill-icon i {
    color: #f2b2b2;
}

body.puock-dark .skill-info {
    background: #1e1e1e;
    border-color: rgba(255, 255, 255, 0.08);
}

body.puock-dark #skills-tags-group-all .tags-group-icon {
    box-shadow: var(--anzhiyu-shadow-border);
    filter: brightness(1.1) contrast(1.1);
}

body.puock-dark .author-tag {
    background: var(--anzhiyu-card-bg);
    border-color: rgba(255, 255, 255, 0.12);
}

body.puock-dark .author-tag-left .author-tag,
body.puock-dark .author-tag-right .author-tag {
    color: var(--anzhiyu-secondtext);
}

body.puock-dark .author-tag:hover {
    background: var(--anzhiyu-main-op);
    color: var(--anzhiyu-white);
}

body.puock-dark .buff-item {
    background: #1e1e1e;
}

body.puock-dark .author-content-item.buff .author-content-item-tips {
    color: rgba(255, 255, 255, 0.9);
}

body.puock-dark .author-content-item.game .author-content-item-tips,
body.puock-dark .author-content-item.game .author-content-item-title {
    color: var(--anzhiyu-white);
}

body.puock-dark .comic-item {
    color: #fff;
}

body.puock-dark .post-tips a,
body.puock-dark .post-tips {
    color: var(--anzhiyu-gray);
}

body.puock-dark .create-site-post {
    color: var(--anzhiyu-fontcolor);
}

body.puock-dark .psw {
    color: var(--anzhiyu-secondtext);
}
</style>

<div id="about-page">
    <!-- 头像和基本信息 -->
    <div class="author-section">
        <div class="author-box">
            <!-- 左侧标签 -->
            <div class="author-tag-left hidden-mobile">
                <span class="author-tag">🤖️ 资源分享爱好者</span>
                <span class="author-tag">🔍 分享好用的工具</span>
                <span class="author-tag">🏠 摆烂普通的咸鱼</span>
                <span class="author-tag">🔨 前端小白，努力学习</span>
            </div>

            <!-- 头像 -->
            <div class="author-img">
                <?php
                if ($this->options->avatar) {
                    echo '<img src="' . $this->options->avatar . '" alt="avatar">';
                } elseif ($this->options->cnavatar && $this->user->hasLogin()) {
                    $email = md5($this->user->mail);
                    $avatarUrl = $this->options->cnavatar . $email . '?s=200';
                    echo '<img src="' . $avatarUrl . '" alt="avatar">';
                } else {
                    echo '<i class="fa-solid fa-user t-xxl" style="color:var(--anzhiyu-secondtext,#666)"></i>';
                }
                ?>
                <div class="image-dot"></div>
            </div>

            <!-- 右侧标签 -->
            <div class="author-tag-right hidden-mobile">
                <span class="author-tag">🤝 安卓 用户</span>
                <span class="author-tag">🏃 脚踏实地行动派</span>
                <span class="author-tag">🧱 团队小组发动机</span>
                <span class="author-tag">💢 Windows 11用户</span>
            </div>
        </div>

        <div class="author-title-section">
            <p class="p center logo large">关于我</p>
            <p class="p center small"><?php $this->options->description(); ?></p>
        </div>
    </div>

    <!-- 自我介绍和追求 -->
    <div class="author-content">
        <div class="author-content-item myInfoAndSayHello">
            <div class="title1">你好，很高兴认识你👋</div>
            <div class="title2">
                我叫 <span class="inline-word"><?php $this->author(); ?></span>
            </div>
            <div class="title1">
                是一名 <?php echo $this->options->currentJob ? $this->options->currentJob() : '博主'; ?>
            </div>
        </div>

        <div class="author-content-item aboutsiteTips">
            <div class="author-content-item-tips">追求</div>
            <h2>
                好用的 <span class="inline-word">博客</span><br>
                白嫖的 <span class="inline-word">快乐</span>
            </h2>
        </div>
    </div>

    <!-- 技能和生涯展示 -->
    <div class="author-content">
        <div class="skills-careers-container">
            <!-- 技能展示 -->
            <div class="author-content-item skills">
                <div class="card-content">
                    <div class="author-content-item-tips">技能</div>
                    <span class="author-content-item-title">开启创造力</span>
                    <div class="skills-style-group">
                        <!-- 滚动技能图标 -->
                        <div id="skills-tags-group-all">
                            <div class="tags-group-wrapper">
                                <!-- 第一组 -->
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #000" title="Astro">
                                        <img class="no-lightbox" src="https://favicon.im/astro.build?larger=true" alt="Astro">
                                    </div>
                                    <div class="tags-group-icon" style="background: #57b6e6" title="Docker">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/63300647df7fa.png" alt="Docker">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #fff" title="Nuxt">
                                        <img class="no-lightbox" src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/icon/SkillIconsNuxtjsLight.5moa7dnnr3.svg" alt="Nuxt">
                                    </div>
                                    <div class="tags-group-icon" style="background: #333" title="Node.js">
                                        <img class="no-lightbox" src="https://npm.elemecdn.com/anzhiyu-blog@2.1.1/img/svg/node-logo.svg" alt="Node.js">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #2e3a41" title="Webpack">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/26/6330ff27e5c9b.png" alt="Webpack">
                                    </div>
                                    <div class="tags-group-icon" style="background: #fff" title="Pinia">
                                        <img class="no-lightbox" src="https://npm.elemecdn.com/anzhiyu-blog@2.0.8/img/svg/pinia-logo.svg" alt="Pinia">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #fff" title="Python">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/63300647dea51.png" alt="Python">
                                    </div>
                                    <div class="tags-group-icon" style="background: #937df7" title="Vite">
                                        <img class="no-lightbox" src="https://npm.elemecdn.com/anzhiyu-blog@2.0.8/img/svg/vite-logo.svg" alt="Vite">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #4499e4" title="Flutter">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2023/05/09/645a45854e093.png" alt="Flutter">
                                    </div>
                                    <div class="tags-group-icon" style="background: #b8f0ae" title="Vue.js">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633001374747b.png" alt="Vue.js">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #222" title="React">
                                        <img class="no-lightbox" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9Ii0xMS41IC0xMC4yMzE3NCAyMyAyMC40NjM0OCI+CiAgPHRpdGxlPlJlYWN0IExvZ288L3RpdGxlPgogIDxjaXJjbGUgY3g9IjAiIGN5PSIwIiByPSIyLjA1IiBmaWxsPSIjNjFkYWZiIi8+CiAgPGcgc3Ryb2tlPSIjNjFkYWZiIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiPgogICAgPGVsbGlwc2Ugcng9IjExIiByeT0iNC4yIi8+CiAgICA8ZWxsaXBzZSByeD0iMTEiIHJ5PSI0LjIiIHRyYW5zZm9ybT0icm90YXRlKDYwKSIvPgogICAgPGVsbGlwc2Ugcng9IjExIiByeT0iNC4yIiB0cmFuc2Zvcm09InJvdGF0ZSgxMjApIi8+CiAgPC9nPgo8L3N2Zz4K" alt="React">
                                    </div>
                                    <div class="tags-group-icon" style="background: #2c51db" title="CSS3">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633006cc55e07.png" alt="CSS3">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #f7cb4f" title="JavaScript">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633006eee047b.png" alt="JavaScript">
                                    </div>
                                    <div class="tags-group-icon" style="background: #e9572b" title="HTML">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633006f9ab27d.png" alt="HTML">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #df5b40" title="Git">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2023/04/11/6434a635e9726.webp" alt="Git">
                                    </div>
                                    <div class="tags-group-icon" style="background: #00B1D0" title="Typescript">
                                        <img class="no-lightbox" src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/icon/DeviconTypescript.6f15p6gbm4.svg" alt="Typescript">
                                    </div>
                                </div>
                                <!-- 重复一组实现无缝滚动 -->
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #000" title="Astro">
                                        <img class="no-lightbox" src="https://favicon.im/astro.build?larger=true" alt="Astro">
                                    </div>
                                    <div class="tags-group-icon" style="background: #57b6e6" title="Docker">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/63300647df7fa.png" alt="Docker">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #fff" title="Nuxt">
                                        <img class="no-lightbox" src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/icon/SkillIconsNuxtjsLight.5moa7dnnr3.svg" alt="Nuxt">
                                    </div>
                                    <div class="tags-group-icon" style="background: #333" title="Node.js">
                                        <img class="no-lightbox" src="https://npm.elemecdn.com/anzhiyu-blog@2.1.1/img/svg/node-logo.svg" alt="Node.js">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #2e3a41" title="Webpack">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/26/6330ff27e5c9b.png" alt="Webpack">
                                    </div>
                                    <div class="tags-group-icon" style="background: #fff" title="Pinia">
                                        <img class="no-lightbox" src="https://npm.elemecdn.com/anzhiyu-blog@2.0.8/img/svg/pinia-logo.svg" alt="Pinia">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #fff" title="Python">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/63300647dea51.png" alt="Python">
                                    </div>
                                    <div class="tags-group-icon" style="background: #937df7" title="Vite">
                                        <img class="no-lightbox" src="https://npm.elemecdn.com/anzhiyu-blog@2.0.8/img/svg/vite-logo.svg" alt="Vite">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #4499e4" title="Flutter">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2023/05/09/645a45854e093.png" alt="Flutter">
                                    </div>
                                    <div class="tags-group-icon" style="background: #b8f0ae" title="Vue.js">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633001374747b.png" alt="Vue.js">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #222" title="React">
                                        <img class="no-lightbox" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9Ii0xMS41IC0xMC4yMzE3NCAyMyAyMC40NjM0OCI+CiAgPHRpdGxlPlJlYWN0IExvZ288L3RpdGxlPgogIDxjaXJjbGUgY3g9IjAiIGN5PSIwIiByPSIyLjA1IiBmaWxsPSIjNjFkYWZiIi8+CiAgPGcgc3Ryb2tlPSIjNjFkYWZiIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiPgogICAgPGVsbGlwc2Ugcng9IjExIiByeT0iNC4yIi8+CiAgICA8ZWxsaXBzZSByeD0iMTEiIHJ5PSI0LjIiIHRyYW5zZm9ybT0icm90YXRlKDYwKSIvPgogICAgPGVsbGlwc2Ugcng9IjExIiByeT0iNC4yIiB0cmFuc2Zvcm09InJvdGF0ZSgxMjApIi8+CiAgPC9nPgo8L3N2Zz4K" alt="React">
                                    </div>
                                    <div class="tags-group-icon" style="background: #2c51db" title="CSS3">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633006cc55e07.png" alt="CSS3">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #f7cb4f" title="JavaScript">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633006eee047b.png" alt="JavaScript">
                                    </div>
                                    <div class="tags-group-icon" style="background: #e9572b" title="HTML">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2022/09/25/633006f9ab27d.png" alt="HTML">
                                    </div>
                                </div>
                                <div class="tags-group-icon-pair">
                                    <div class="tags-group-icon" style="background: #df5b40" title="Git">
                                        <img class="no-lightbox" src="https://img02.anheyu.com/adminuploads/1/2023/04/11/6434a635e9726.webp" alt="Git">
                                    </div>
                                    <div class="tags-group-icon" style="background: #00B1D0" title="Typescript">
                                        <img class="no-lightbox" src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/icon/DeviconTypescript.6f15p6gbm4.svg" alt="Typescript">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 技能列表（悬停时显示） -->
                        <div class="skills-list">
                            <?php
                            $skills = $this->fields->skills;
                            if ($skills) {
                                $skillArray = array_map('trim', explode(',', $skills));
                                $skillNames = [
                                    'HTML' => '<i class="fa-brands fa-html5"></i>',
                                    'CSS' => '<i class="fa-brands fa-css3-alt"></i>',
                                    'JavaScript' => '<i class="fa-brands fa-js"></i>',
                                    'PHP' => '<i class="fa-brands fa-php"></i>',
                                    'Typecho' => '<i class="fa-solid fa-blog"></i>',
                                    'Vue' => '<i class="fa-brands fa-vuejs"></i>',
                                    'React' => '<i class="fa-brands fa-react"></i>',
                                    'Node.js' => '<i class="fa-brands fa-node-js"></i>',
                                    'Git' => '<i class="fa-brands fa-git-alt"></i>',
                                    'Linux' => '<i class="fa-brands fa-linux"></i>',
                                    'Python' => '<i class="fa-brands fa-python"></i>',
                                    'MySQL' => '<i class="fa-solid fa-database"></i>'
                                ];

                                foreach ($skillArray as $skill) {
                                    $icon = isset($skillNames[$skill]) ? $skillNames[$skill] : '<i class="fa-solid fa-code"></i>';
                                    echo '<div class="skill-info">';
                                    echo '<div class="skill-icon">' . $icon . '</div>';
                                    echo '<div class="skill-name"><span>' . htmlspecialchars($skill) . '</span></div>';
                                    echo '</div>';
                                }
                            } else {
                                // 默认技能
                                $defaultSkills = [
                                    'HTML' => '<i class="fa-brands fa-html5"></i>',
                                    'CSS' => '<i class="fa-brands fa-css3-alt"></i>',
                                    'JavaScript' => '<i class="fa-brands fa-js"></i>',
                                    'PHP' => '<i class="fa-brands fa-php"></i>',
                                    'Vue' => '<i class="fa-brands fa-vuejs"></i>',
                                    'Git' => '<i class="fa-brands fa-git-alt"></i>'
                                ];

                                foreach ($defaultSkills as $skill => $icon) {
                                    echo '<div class="skill-info">';
                                    echo '<div class="skill-icon">' . $icon . '</div>';
                                    echo '<div class="skill-name"><span>' . htmlspecialchars($skill) . '</span></div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                            <div class="etc">...</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 生涯经历 -->
            <div class="author-content-item careers">
                <div class="card-content">
                    <div class="author-content-item-tips">生涯</div>
                    <span class="author-content-item-title">无限进步</span>
                    <div class="careers-group">
                        <div class="careers-item">
                            <div class="circle" style="background: #357ef5"></div>
                            <div class="name"><?php if ($this->options->education): ?><?php $this->options->education(); ?><?php else: ?>ATA，自动化技术与应用专业<?php endif; ?></div>
                        </div>
                    </div>
                    <img
                        class="no-lightbox"
                        alt="生涯"
                        src="<?php if ($this->options->careersImage): ?><?php $this->options->careersImage(); ?><?php else: ?>https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/custom/sy.3ns3irtbnd.webp<?php endif; ?>"
                    >
                </div>
            </div>
        </div>
    </div>

    <!-- 数据统计和个人信息 -->
    <div class="author-content">
        <!-- 数据统计 -->
        <div
          class="about-statistic author-content-item"
          style="background:url(https://img02.anheyu.com/adminuploads/1/2022/09/23/632d634f8376d.jpg) top/cover no-repeat"
        >
          <div class="card-content">
            <div class="author-content-item-tips">数据</div>
            <span class="author-content-item-title">访问统计</span>
            <div id="statistic">
              <?php
              $stats = get_site_statistics();
              $totalViews = $stats['totalViews'];
              $postCount = $stats['postCount'];
              $commentCount = $stats['commentCount'];
              $userCount = $stats['userCount'];
              
              // 获取Umami统计数据
              $todayUv = 0;
              $todayPv = 0;
              $umamiData = @file_get_contents('https://umami-api.051531.xyz/');
              if ($umamiData !== false) {
                  $umamiJson = json_decode($umamiData, true);
                  if (is_array($umamiJson)) {
                      $todayUv = isset($umamiJson['today_uv']) ? $umamiJson['today_uv'] : 0;
                      $todayPv = isset($umamiJson['today_pv']) ? $umamiJson['today_pv'] : 0;
                  }
              }
              ?>
              <div>
                <span>文章总数</span>
                <span id="total-posts"><?php echo $postCount; ?></span>
              </div>
              <div>
                <span>评论总数</span>
                <span id="total-comments"><?php echo $commentCount; ?></span>
              </div>
              <div>
                <span>用户总数</span>
                <span id="total-users"><?php echo $userCount; ?></span>
              </div>
              <div>
                <span>总浏览量</span>
                <span id="total-views"><?php echo $totalViews; ?></span>
              </div>
              <div>
                <span>今日人数</span>
                <span id="today-uv"><?php echo $todayUv; ?></span>
              </div>
              <div>
                <span>今日访问</span>
                <span id="today-pv"><?php echo $todayPv; ?></span>
              </div>
            </div>
            <div class="post-tips">
              统计信息来自
              <a
                href="https://umami.mcyzsx.top/share/kGj3I6rbV2naMhZH"
                target="_blank"
                rel="noopener nofollow"
              >Umami网站统计</a>
            </div>
            <div class="banner-button-group">
              <a class="banner-button" href="javascript:void(0)">
                <i class="fa-solid fa-arrow-circle-right"></i>
                <span class="banner-button-text">文章隧道</span>
              </a>
            </div>
          </div>
        </div>

        <!-- 地图和个人信息 -->
        <div class="author-content-item-group column mapAndInfo">
          <div class="author-content-item map single">
            <span class="map-title">我现在住在<b><?php if ($this->options->location): ?><?php $this->options->location(); ?><?php else: ?>中国，苏州市<?php endif; ?></b></span>
          </div>
          <div class="author-content-item selfInfo single">
            <div>
              <span class="selfInfo-title">生于</span>
              <span class="selfInfo-content" style="color:#43a6c6"><?php if ($this->options->birthYear): ?><?php $this->options->birthYear(); ?><?php else: ?>2005<?php endif; ?></span>
            </div>
            <div>
              <span class="selfInfo-title">教育</span>
              <span class="selfInfo-content" style="color:#c69043"><?php if ($this->options->education): ?><?php $this->options->education(); ?><?php else: ?>南京工业职业技术大学 自动化技术与应用<?php endif; ?></span>
            </div>
            <div>
              <span class="selfInfo-title">现在职业</span>
              <span class="selfInfo-content" style="color:#b04fe6"><?php if ($this->options->currentJob): ?><?php $this->options->currentJob(); ?><?php else: ?>学生👨‍🎓<?php endif; ?></span>
            </div>
          </div>
        </div>
    </div>

    <!-- 座右铭和特长 -->
    <div class="author-content">
        <div class="author-content-item maxim">
            <div class="author-content-item-tips">座右铭</div>
            <span class="maxim-title">
                <span style="opacity:.6;margin-bottom:8px">每一段旅行，</span>
                <span>都有终点。</span>
            </span>
        </div>

        <div class="author-content-item buff">
            <div class="author-content-item-tips">特长</div>
            <span class="buff-title">
                <span style="opacity:.6;margin-bottom:8px">喜欢尝鲜各种开源项目和分享资源</span>
                <span>折腾相关好奇指数 MAX</span>
            </span>
            <div class="card-background-icon">
                <i class="fa-solid fa-dice-d20"></i>
            </div>
        </div>
    </div>

    <!-- 性格类型和个人照片 -->
    <div class="author-content">
        <div class="author-content-item personalities">
            <div class="author-content-item-tips">性格</div>
            <span class="author-content-item-title">提倡者</span>
            <div class="title2" style="color:#ac899c">INFJ-T</div>
            <div class="post-tips">
                在 <a href="https://www.16personalities.com/" target="_blank" rel="noopener nofollow">16personalities</a>
                了解更多关于 <a target="_blank" rel="noopener external nofollow" href="https://www.16personalities.com/ch/infj-%E4%BA%BA%E6%A0%BC">提倡者</a>
            </div>
            <div class="image">
                <img
                    class="no-lightbox"
                    src="https://www.16personalities.com/static/images/personality-types/avatars/email/large/INFJ_male.png?v=1"
                    onerror="this.onerror=null,this.src='https://bu.dusays.com/2023/03/03/6401a79030db5.png'"
                    data-lazy-src="https://npm.elemecdn.com/anzhiyu-blog@2.0.8/img/svg/ESFJ-A.svg"
                    alt="人格"
                >
            </div>
        </div>

        <div class="author-content-item myPhoto">
            <img
                class="author-content-img no-lightbox"
                alt="自拍"
                src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/custom/map-nanjing.webp"
            >
        </div>
    </div>

    <!-- 游戏爱好和番剧爱好 -->
    <div class="author-content">
        <div class="author-content-item game" style="background:url(https://zsxcoder.vercel.app/jihuang.jpg) top/cover no-repeat">
            <div class="card-content">
                <div class="author-content-item-tips">爱好游戏</div>
                <span class="author-content-item-title">饥荒</span>
                <div class="content-bottom">
                    <div style="font-size:16px;opacity:0.9;">name: Krylin</div>
                </div>
            </div>
        </div>

        <div class="author-content-item comic">
            <div class="card-content">
                <div class="author-content-item-tips">爱好番剧</div>
                <div class="author-content-item-title">追番</div>
                <div class="comic-box">
                    <a class="comic-item" href="https://movie.douban.com/subject/35560080/" target="_blank" rel="external nofollow noreferrer" title="诡秘之主">
                        <div class="comic-item-cover">
                            <img src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/cover/anime-gmzz.webp" data-lazy-src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/cover/anime-gmzz.webp" onerror="this.onerror=null,this.src='https://bu.dusays.com/2023/03/03/6401a79030db5.png'" alt="诡秘之主">
                        </div>
                    </a>
                    <a class="comic-item" href="https://www.bilibili.com/bangumi/media/md28229899/?spm_id_from=666.25.b_6d656469615f6d6f64756c65.1" target="_blank" rel="external nofollow noreferrer" title="咒术回战">
                        <div class="comic-item-cover">
                            <img src="https://pixpro.coul.top/i/2025/04/17/884369.webp" data-lazy-src="https://img02.anheyu.com/adminuploads/1/2022/12/13/6398864e572ed.webp" onerror="this.onerror=null,this.src='https://bu.dusays.com/2023/03/03/6401a79030db5.png'" alt="咒术回战">
                        </div>
                    </a>
                    <a class="comic-item" href="https://movie.douban.com/subject/26339248/" target="_blank" rel="external nofollow noreferrer" title="一拳超人 第一季">
                        <div class="comic-item-cover">
                            <img src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/cover/anime-yqcr.webp" data-lazy-src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/cover/anime-yqcr.webp" onerror="this.onerror=null,this.src='https://bu.dusays.com/2023/03/03/6401a79030db5.png'" alt="一拳超人 第一季">
                        </div>
                    </a>
                    <a class="comic-item" href="https://www.bilibili.com/bangumi/media/md135652/?spm_id_from=666.25.b_6d656469615f6d6f64756c65.1" target="_blank" rel="external nofollow noreferrer" title="鬼灭之刃">
                        <div class="comic-item-cover">
                            <img src="https://pixpro.coul.top/i/2025/04/17/016773.webp" data-lazy-src="https://img02.anheyu.com/adminuploads/1/2022/12/13/639886403d472.webp" onerror="this.onerror=null,this.src='https://bu.dusays.com/2023/03/03/6401a79030db5.png'" alt="鬼灭之刃">
                        </div>
                    </a>
                    <a class="comic-item" href="https://www.bilibili.com/bangumi/media/md135652/?spm_id_from=666.25.b_6d656469615f6d6f64756c65.1" target="_blank" rel="external nofollow noreferrer" title="JOJO的奇妙冒险 黄金之风">
                        <div class="comic-item-cover">
                            <img src="https://pixpro.coul.top/i/2025/04/17/375755.webp" data-lazy-src="https://img02.anheyu.com/adminuploads/1/2022/12/13/6398862649585.webp" onerror="this.onerror=null,this.src='https://bu.dusays.com/2023/03/03/6401a79030db5.png'" alt="JOJO的奇妙冒险">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- 关注偏好和音乐偏好 -->
    <div class="author-content">
        <div class="author-content-item technology" style="background:url(https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/custom/image.1ovwqw278o.webp) top/cover no-repeat">
            <div class="card-content">
                <div class="author-content-item-tips">关注偏好</div>
                <span class="author-content-item-title">博客写作</span>
                <div class="content-bottom">
                    <div class="tips">资源分享</div>
                </div>
            </div>
        </div>

        <div class="author-content-item music" style="background:url(https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/custom/61f1b9b3a1d2e284a22863d2a8adae1e.2h8s8mvbvb.webp) top/cover no-repeat">
            <div class="card-content">
                <div class="author-content-item-tips">音乐偏好</div>
                <span class="author-content-item-title">国风、古风、二创</span>
                <div class="content-bottom">
                    <div class="tips">跟 钟神秀 一起欣赏更多音乐</div>
                </div>
                <div class="banner-button-group">
                    <a class="banner-button" href="https://music.163.com/#/playlist?id=13681647281" target="_blank">
                        <i class="fa-solid fa-arrow-circle-right"></i>
                        <span class="banner-button-text">更多推荐</span>
                    </a>
                </div>
            </div>
        </div>
    </div>





    <!-- 社交媒体 -->
    <div class="author-content">
        <div class="author-content-item single">
            <div class="author-content-item-tips">社交媒体</div>
            <span class="author-content-item-title">保持联系</span>
            <div style="display:flex;flex-wrap:wrap;gap:10px;margin-top:20px;">
                <?php if ($this->options->github): ?>
                    <a href="<?php $this->options->github(); ?>" target="_blank" class="btn btn-primary" style="border-radius:20px;padding:8px 20px;">
                        <i class="fa-brands fa-github me-1"></i>GitHub
                    </a>
                <?php endif; ?>
                <?php if ($this->options->qq): ?>
                    <a href="<?php $this->options->qq(); ?>" target="_blank" class="btn btn-primary" style="border-radius:20px;padding:8px 20px;">
                        <i class="fa-brands fa-qq me-1"></i>QQ
                    </a>
                <?php endif; ?>
                <?php if ($this->options->telegram): ?>
                    <a href="<?php $this->options->telegram(); ?>" target="_blank" class="btn btn-primary" style="border-radius:20px;padding:8px 20px;">
                        <i class="fa-brands fa-telegram me-1"></i>Telegram
                    </a>
                <?php endif; ?>
                <?php if ($this->options->mastodon): ?>
                    <a href="<?php $this->options->mastodon(); ?>" target="_blank" class="btn btn-primary" style="border-radius:20px;padding:8px 20px;">
                        <i class="fa-brands fa-mastodon me-1"></i>Mastodon
                    </a>
                <?php endif; ?>
                <?php if ($this->options->bilibili): ?>
                    <a href="<?php $this->options->bilibili(); ?>" target="_blank" class="btn btn-primary" style="border-radius:20px;padding:8px 20px;">
                        <i class="fa-brands fa-bilibili me-1"></i>哔哩哔哩
                    </a>
                <?php endif; ?>
                <?php if ($this->options->email): ?>
                    <a href="mailto:<?php $this->options->email(); ?>" class="btn btn-primary" style="border-radius:20px;padding:8px 20px;">
                        <i class="fa-solid fa-envelope me-1"></i>Email
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- 心路历程 -->
    <div class="author-content">
        <div class="author-content-item single create-site-post">
            <div class="author-content-item-tips">心路历程</div>
            欢迎来到我的个人主页 😝，这里是我的介绍页面，不是简历🙌，你能在这里看到我比较广泛的兴趣而不是那种正式的简历。目前就读于<?php if ($this->options->education): ?><strong><?php $this->options->education(); ?></strong><?php else: ?><strong>南京工业职业技术大学 自动化技术与应用</strong><?php endif; ?>专业，
            不是经常更新文章，但是更新文章是一件很好的事情，但是我很懒于是更新的很慢但，
            我会尽量每月至少更新一篇文章，然后不断地学习和完善自己的知识，最近黑眼圈又重了
            <span class="psw">肯定又熬夜了</span>
            <del>不要学我，老是熬夜会长痘</del>
            最后给大家推荐一本小说：
            <div class="site-card-group">
                <a class="site-card" target="_blank" href="https://book.douban.com/subject/33424453/">
                    <img
                      class="no-lightbox"
                      src="https://cdn.statically.io/gh/zsxcoder/picx-images-hosting@master/cover/anime-gmzz.webp"
                      alt="诡秘之主"
                    >
                    <div class="site-card-info">
                        <div class="site-card-title">诡秘之主</div>
                        <div class="site-card-desc">一本既慢又快的小说</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php if ($this->allow('comment')): ?>
    <?php $this->need('comments.php'); ?>
<?php endif; ?>
</script>

<?php $this->need('footer.php'); ?>
