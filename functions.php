<?php

function themeConfig($form) {
    $slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', NULL, NULL, _t('首页图片标语文字'), _t('在这里文字，用于在首页中图片的文字显示'));
    $form->addInput($slogan);

    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL, NULL, _t('标题栏和书签栏Icon'), _t('在这里填入一个图片URL地址, 作为标题栏和书签栏Icon, 默认不显示'));
    $form->addInput($siteIcon);

    $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, _t('粤ICP备14072384号-2'), _t('备案号'), _t('在这里填入天朝备案号，不显示则留空'));
    $form->addInput($miibeian);

    $cnzzCode = new Typecho_Widget_Helper_Form_Element_Text('cnzzCode', NULL, _t(''), _t('统计代码'), _t('输入统计代码，没有则留空'));
    $form->addInput($cnzzCode);

    $githubName = new Typecho_Widget_Helper_Form_Element_Text('githubName', NULL, _t('biezhi'), _t('github账号'), _t('输入github用户名，没有则留空'));
    $form->addInput($githubName);

    $weibolink = new Typecho_Widget_Helper_Form_Element_Text('weibolink', NULL, _t('http://weibo.com/u/5238733773'), _t('微博链接'), _t('输入微博链接地址'));
    $form->addInput($weibolink);
	
	$qqgroup = new Typecho_Widget_Helper_Form_Element_Text('qqgroup', NULL, _t(''), _t('QQ群代码'), _t('输入QQ群代码'));
    $form->addInput($qqgroup);
		
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', array(
        'ShowSearch' => _t('显示搜索框'),
        'ShowRecentPosts' => _t('显示最新文章'),
        'ShowRecentComments' => _t('显示最近回复'),
        'ShowTags' => _t('显示标签'),
        'ShowArchive' => _t('显示归档'),
        'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowFriend', 'ShowOther'), _t('侧边栏显示'));
    $form->addInput($sidebarBlock->multiMode());

    $misc = new Typecho_Widget_Helper_Form_Element_Checkbox('misc', array(
        'ShowLogin' => _t('前台显示登录入口'),
        'ShowLoadTime' => _t('页脚显示加载耗时')
        ),
    array('ShowLogin'), _t('杂项'));
    $form->addInput($misc->multiMode());
}

function timer_start() {
    global $timestart;
    $mtime = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
 
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime = explode( ' ', microtime() );
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = $timeend - $timestart;
    $r = number_format( $timetotal, $precision );
    if ( $display )
    echo $r;
    return $r;
}
