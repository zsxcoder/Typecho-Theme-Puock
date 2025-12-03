<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

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
.puock-editor-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}
.puock-editor-modal-content {
    background: #fff;
    padding: 25px;
    border-radius: 8px;
    min-width: 400px;
    max-width: 90%;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}
.puock-editor-modal-header {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 10px;
}
.puock-editor-modal-body {
    margin-bottom: 20px;
}
.puock-editor-modal-field {
    margin-bottom: 15px;
}
.puock-editor-modal-label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
    font-weight: 500;
}
.puock-editor-modal-input {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s;
}
.puock-editor-modal-input:focus {
    outline: none;
    border-color: #467b96;
    box-shadow: 0 0 0 2px rgba(70, 123, 150, 0.1);
}
.puock-editor-modal-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}
.puock-editor-btn {
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.3s;
}
.puock-editor-btn-primary {
    background: #467b96;
    color: #fff;
}
.puock-editor-btn-primary:hover {
    background: #3a6680;
}
.puock-editor-btn-secondary {
    background: #f0f0f0;
    color: #666;
}
.puock-editor-btn-secondary:hover {
    background: #e0e0e0;
}
</style>
<script>
// 编辑器工具类
var PuockEditor = {
    // 显示模态框
    showModal: function(config) {
        var modal = $('<div class="puock-editor-modal"></div>');
        var content = $('<div class="puock-editor-modal-content"></div>');
        var header = $('<div class="puock-editor-modal-header">' + config.title + '</div>');
        var body = $('<div class="puock-editor-modal-body"></div>');
        var footer = $('<div class="puock-editor-modal-footer"></div>');

        // 创建表单字段
        config.fields.forEach(function(field) {
            var fieldDiv = $('<div class="puock-editor-modal-field"></div>');
            var label = $('<label class="puock-editor-modal-label">' + field.label + '</label>');
            var input = $('<input type="text" class="puock-editor-modal-input" placeholder="' + (field.placeholder || '') + '" value="' + (field.defaultValue || '') + '">');
            input.attr('data-field-name', field.name);
            if (field.required) {
                input.attr('required', 'required');
            }
            fieldDiv.append(label).append(input);
            body.append(fieldDiv);
        });

        // 创建按钮
        var btnCancel = $('<button class="puock-editor-btn puock-editor-btn-secondary">取消</button>');
        var btnConfirm = $('<button class="puock-editor-btn puock-editor-btn-primary">确定</button>');

        footer.append(btnCancel).append(btnConfirm);
        content.append(header).append(body).append(footer);
        modal.append(content);
        $('body').append(modal);

        // 聚焦第一个输入框
        setTimeout(function() {
            body.find('input').first().focus();
        }, 100);

        // 取消按钮事件
        btnCancel.on('click', function() {
            modal.remove();
            if (config.onCancel) config.onCancel();
        });

        // 点击背景关闭
        modal.on('click', function(e) {
            if (e.target === modal[0]) {
                modal.remove();
                if (config.onCancel) config.onCancel();
            }
        });

        // 确认按钮事件
        btnConfirm.on('click', function() {
            var values = {};
            var valid = true;
            body.find('input').each(function() {
                var input = $(this);
                var name = input.attr('data-field-name');
                var value = input.val().trim();
                if (input.attr('required') && !value) {
                    input.css('border-color', '#ff4444');
                    valid = false;
                } else {
                    input.css('border-color', '#ddd');
                }
                values[name] = value;
            });

            if (valid) {
                modal.remove();
                if (config.onConfirm) config.onConfirm(values);
            }
        });

        // 回车提交
        body.find('input').on('keypress', function(e) {
            if (e.which === 13) {
                btnConfirm.click();
            }
        });
    },

    // 插入文本到编辑器
    insertText: function(text) {
        var textarea = $('#text')[0];
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var value = textarea.value;
        textarea.value = value.substring(0, start) + text + value.substring(end);
        textarea.setSelectionRange(start + text.length, start + text.length);
        textarea.focus();
        $('#text').trigger('change');
    },

    // 获取选中的文本
    getSelectedText: function() {
        var textarea = $('#text')[0];
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        return textarea.value.substring(start, end);
    }
};

$(document).ready(function() {
    // 初始化所有编辑器按钮
    PuockEditor.initArticleButton();
    PuockEditor.initGithubButton();
    PuockEditor.initAlertButtons();
    PuockEditor.initCollapseButton();
    PuockEditor.initDownloadButton();
    PuockEditor.initReplyButton();
});

// 初始化文章引用按钮
PuockEditor.initArticleButton = function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-article-button" title="插入文章引用"><span style="background: none;"><svg t="1687164718203" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4158" width="20" height="20"><path d="M810.666667 213.333333H213.333333c-46.933333 0-85.333333 38.4-85.333333 85.333334v426.666666c0 46.933333 38.4 85.333333 85.333333 85.333334h597.333334c46.933333 0 85.333333-38.4 85.333333-85.333334V298.666667c0-46.933333-38.4-85.333333-85.333333-85.333334z m0 512H213.333333V298.666667h597.333334v426.666666z" p-id="4159"></path><path d="M298.666667 384h426.666666v85.333333H298.666667zM298.666667 554.666667h426.666666v85.333333H298.666667z" p-id="4160"></path></svg></span></li>');

    $('#wmd-article-button').on('click', function() {
        PuockEditor.showModal({
            title: '插入文章引用',
            fields: [{
                name: 'articleId',
                label: '文章ID',
                placeholder: '请输入要引用的文章ID',
                required: true
            }],
            onConfirm: function(values) {
                if (values.articleId) {
                    PuockEditor.insertText('[article id="' + values.articleId + '"]');
                }
            }
        });
    });
};

// 初始化GitHub仓库按钮
PuockEditor.initGithubButton = function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-github-button" title="插入GitHub仓库"><span style="background: none;"><svg t="1714380000000" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="8888" width="20" height="20"><path d="M512 76C276.6 76 80 272.6 80 508c0 190.2 123.2 351.4 294 408.6 21.4 4 29.2-9.2 29.2-20.4 0-10-0.4-43-0.6-78.2-119.6 26-144.8-57.6-144.8-57.6-19.4-49.2-47.4-62.2-47.4-62.2-38.8-26.6 2.8-26 2.8-26 42.8 3 65.4 44 65.4 44 38.2 65.4 100.2 46.5 124.6 35.6 3.8-27.7 15-46.5 27.2-57.2-95.4-10.8-195.8-47.7-195.8-212.4 0-46.9 16.8-85.3 44.2-115.4-4.4-10.8-19.2-54.2 4.2-113 0 0 36.2-11.6 118.8 44.1 34.4-9.6 71.4-14.4 108.2-14.6 36.8 0.2 73.8 5 108.2 14.6 82.6-55.7 118.8-44.1 118.8-44.1 23.4 58.8 8.6 102.2 4.2 113 27.4 30.1 44.2 68.5 44.2 115.4 0 164.9-100.6 201.5-196.2 212.1 15.4 13.2 29.2 39.2 29.2 79.1 0 57.1-0.5 103.2-0.5 117.3 0 11.3 7.7 24.6 29.4 20.4C820.8 859.4 944 698.2 944 508 944 272.6 747.4 76 512 76z" p-id="8889" fill="#181616"></path></svg></span></li>');

    $('#wmd-github-button').on('click', function() {
        PuockEditor.showModal({
            title: '插入GitHub仓库',
            fields: [{
                name: 'repo',
                label: 'GitHub仓库',
                placeholder: '例如：jkjoy/typecho',
                required: true
            }],
            onConfirm: function(values) {
                if (values.repo) {
                    PuockEditor.insertText('[github=' + values.repo + ']');
                }
            }
        });
    });
};

// 初始化Alert提示按钮
PuockEditor.initAlertButtons = function() {
    var alertTypes = [
        {id: 'success', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(100,205,138,1)"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>', label: '成功', placeholder: '请输入成功提示内容'},
        {id: 'primary', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(240,187,64,1)"><path d="M11.9996 0.5L16.2256 6.68342L23.4123 8.7918L18.8374 14.7217L19.053 22.2082L11.9996 19.6897L4.94617 22.2082L5.16179 14.7217L0.586914 8.7918L7.7736 6.68342L11.9996 0.5ZM9.99959 12H7.99959C7.99959 14.2091 9.79045 16 11.9996 16C14.1418 16 15.8907 14.316 15.9947 12.1996L15.9996 12H13.9996C13.9996 13.1046 13.1042 14 11.9996 14C10.9452 14 10.0814 13.1841 10.0051 12.1493L9.99959 12Z"></path></svg>', label: '重要', placeholder: '请输入重要提示内容'},
        {id: 'danger', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(251,12,12,1)"><path d="M10.5859 12L2.79297 4.20706L4.20718 2.79285L12.0001 10.5857L19.793 2.79285L21.2072 4.20706L13.4143 12L21.2072 19.7928L19.793 21.2071L12.0001 13.4142L4.20718 21.2071L2.79297 19.7928L10.5859 12Z"></path></svg>', label: '危险', placeholder: '请输入危险警告内容'},
        {id: 'warning', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M4.00001 20V14C4.00001 9.58172 7.58173 6 12 6C16.4183 6 20 9.58172 20 14V20H21V22H3.00001V20H4.00001ZM6.00001 14H8.00001C8.00001 11.7909 9.79087 10 12 10V8C8.6863 8 6.00001 10.6863 6.00001 14ZM11 2H13V5H11V2ZM19.7782 4.80761L21.1924 6.22183L19.0711 8.34315L17.6569 6.92893L19.7782 4.80761ZM2.80762 6.22183L4.22183 4.80761L6.34315 6.92893L4.92894 8.34315L2.80762 6.22183Z"></path></svg>', label: '警告', placeholder: '请输入警告提示内容'},
        {id: 'info', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11V17H13V11H11ZM11 7V9H13V7H11Z"></path></svg>', label: '关于', placeholder: '请输入信息内容'},
        {id: 'dark', icon: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M4 3H20C20.5523 3 21 3.44772 21 4V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3Z"></path></svg>', label: '黑色', placeholder: '请输入黑色提示内容'}
    ];

    alertTypes.forEach(function(type) {
        $('#wmd-button-row').append('<li class="wmd-button" id="wmd-alert-' + type.id + '" title="插入' + type.label + '提示"><span>' + type.icon + '</span></li>');
        $('#wmd-alert-' + type.id).on('click', function() {
            var selected = PuockEditor.getSelectedText();
            PuockEditor.showModal({
                title: '插入' + type.label + '提示',
                fields: [{
                    name: 'content',
                    label: '提示内容',
                    placeholder: type.placeholder,
                    defaultValue: selected || '',
                    required: true
                }],
                onConfirm: function(values) {
                    if (values.content) {
                        PuockEditor.insertText('[' + type.id + ']' + values.content + '[/' + type.id + ']');
                    }
                }
            });
        });
    });
};

// 初始化折叠面板按钮
PuockEditor.initCollapseButton = function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-collapse-button" title="插入折叠面板"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M19 12C20.0929 12 21.1175 12.2922 22 12.8027V6C22 5.44772 21.5523 5 21 5H12.4142L10.4142 3H3C2.44772 3 2 3.44772 2 4V20C2 20.5523 2.44772 21 3 21H13.8027C13.2922 20.1175 13 19.0929 13 18C13 14.6863 15.6863 12 19 12ZM20.4143 17.9999L22.5356 20.1212L21.1214 21.5354L19.0001 19.4141L16.8788 21.5354L15.4646 20.1212L17.5859 17.9999L15.4646 15.8786L16.8788 14.4644L19.0001 16.5857L21.1214 14.4644L22.5356 15.8786L20.4143 17.9999Z"></path></svg></span></li>');

    $('#wmd-collapse-button').on('click', function() {
        PuockEditor.showModal({
            title: '插入折叠面板',
            fields: [{
                name: 'title',
                label: '折叠面板标题',
                placeholder: '请输入标题',
                defaultValue: '折叠标题',
                required: true
            }],
            onConfirm: function(values) {
                if (values.title) {
                    var selected = PuockEditor.getSelectedText() || '这里是折叠内容';
                    PuockEditor.insertText("[collapse title='" + values.title + "']" + selected + "[/collapse]");
                }
            }
        });
    });
};

// 初始化下载按钮
PuockEditor.initDownloadButton = function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-download-button" title="插入下载信息"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M3 19H21V21H3V19ZM13 9H20L12 17L4 9H11V1H13V9Z"></path></svg></span></li>');

    $('#wmd-download-button').on('click', function() {
        PuockEditor.showModal({
            title: '插入下载信息',
            fields: [
                {
                    name: 'file',
                    label: '文件名',
                    placeholder: '例如：xxx.zip',
                    defaultValue: 'xxx.zip',
                    required: true
                },
                {
                    name: 'size',
                    label: '文件大小',
                    placeholder: '例如：12MB',
                    defaultValue: '12MB',
                    required: true
                },
                {
                    name: 'url',
                    label: '下载地址',
                    placeholder: 'https://example.com/file.zip',
                    defaultValue: 'https://example.com/file.zip',
                    required: true
                }
            ],
            onConfirm: function(values) {
                if (values.file && values.size && values.url) {
                    PuockEditor.insertText("[download file='" + values.file + "' size='" + values.size + "']" + values.url + "[/download]");
                }
            }
        });
    });
};

// 初始化回复可见按钮
PuockEditor.initReplyButton = function() {
    $('#wmd-button-row').append('<li class="wmd-button" id="wmd-reply-button" title="插入回复可见"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M10.1305 15.8421L9.34268 18.7821L7.41083 18.2645L8.1983 15.3256C7.00919 14.8876 5.91661 14.2501 4.96116 13.4536L2.80783 15.6069L1.39362 14.1927L3.54695 12.0394C2.35581 10.6105 1.52014 8.8749 1.17578 6.96843L2.07634 6.80469C4.86882 8.81573 8.29618 10.0003 12.0002 10.0003C15.7043 10.0003 19.1316 8.81573 21.9241 6.80469L22.8247 6.96843C22.4803 8.8749 21.6446 10.6105 20.4535 12.0394L22.6068 14.1927L21.1926 15.6069L19.0393 13.4536C18.0838 14.2501 16.9912 14.8876 15.8021 15.3256L16.5896 18.2645L14.6578 18.7821L13.87 15.8421C13.2623 15.9461 12.6376 16.0003 12.0002 16.0003C11.3629 16.0003 10.7381 15.9461 10.1305 15.8421Z"></path></svg></span></li>');

    $('#wmd-reply-button').on('click', function() {
        var selected = PuockEditor.getSelectedText();
        PuockEditor.showModal({
            title: '插入回复可见内容',
            fields: [{
                name: 'content',
                label: '隐藏内容',
                placeholder: '请输入需要回复后才能查看的内容',
                defaultValue: selected || '',
                required: true
            }],
            onConfirm: function(values) {
                if (values.content) {
                    PuockEditor.insertText('[reply]' + values.content + '[/reply]');
                }
            }
        });
    });
};
</script>
EOF;
    }
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
    $text = '';
    if (is_array($post)) {
        $text = isset($post['text']) ? $post['text'] : '';
    } else {
        $text = isset($post->text) ? $post->text : '';
    }
    
    if (empty($text)) {
        return '暂无摘要';
    }
    
    $text = strip_tags($text); // 去除HTML标签
    $text = str_replace(["\r", "\n", "\t"], '', $text); // 去除换行和制表
    if (mb_strlen($text, 'UTF-8') > $length) {
        return mb_substr($text, 0, $length, 'UTF-8') . '...';
    }
    return $text;
}

Typecho_Plugin::factory('admin/write-post.php')->bottom = array('EditorButton', 'render');
Typecho_Plugin::factory('admin/write-page.php')->bottom = array('EditorButton', 'render');


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