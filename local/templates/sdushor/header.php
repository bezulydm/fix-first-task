<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
    <title><?$APPLICATION->ShowTitle();?></title>
    <?$APPLICATION->ShowHead();?>
    <?
    use Bitrix\Main\Page\Asset;
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/build/common.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/svg.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery-2.1.4.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.customselect.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.mCustomScrollbar.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.magnific-popup.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/flickity.pkgd.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/common.js");
     ?>
    <link rel="shortcut icon" href=<?=SITE_TEMPLATE_PATH?>/img/favicon.ico">
</head>

<body>
<?$APPLICATION->ShowPanel(); ?>
<div id="svg-icons"></div>

<div class="page">

    <header class="page__header header">
        <div class="header__body">

            <div class="layout">
                <div class="layout__sidebar">
                    <div class="layout__sidebar-content">

                        <a href="/" class="logo">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.png" height="62" width="60" alt=""
                                 class="logo__img">
                            <div class="logo__txt">
                                <div class="logo__first">МБУ ДО</div>
                                <div class="logo__second">«<span class="logo__abbr">СДЮСШОР</span>»</div>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="layout__mainbar">

                    <div class="header-inf">
                        <div class="header-inf__i">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/include/address.php"
                                )
                            ); ?> <br>
                            <a href="mailto:sport-hm@mail.ru"><? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/local/include/email.php"
                                    )
                                ); ?></a>
                        </div>

                        <div class="header-inf__i">

                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/include/fblink.php"
                                )
                            ); ?>


                        </div>

                        <div class="header-inf__i">

                            <? $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/include/vklink.php"
                                )
                            ); ?>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </header>

    <div class="page__body">
        <div class="page__content">

            <div class="layout">
                <div class="layout__sidebar layout__sidebar_main layout__sidebar_shadow">
                    <div class="layout__sidebar-content">

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "left",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "top",
                                "USE_EXT" => "N",
                                "COMPONENT_TEMPLATE" => "left"
                            ),
                            false
                        ); ?>


                        <div class="separator"></div>


                        <? $APPLICATION->IncludeComponent(
	"bitrix:news.calendar", 
	"calendar_sidebar", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "calendar_sidebar",
		"DATE_FIELD" => "DATE_ACTIVE_FROM",
		"DETAIL_URL" => "/news_articles/index.php",
		"FILTER_NAME" => "news",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "news",
		"LIST_URL" => "/news_articles/news/",
		"MONTH_VAR_NAME" => "month",
		"NEWS_COUNT" => "0",
		"SET_TITLE" => "N",
		"SHOW_CURRENT_DATE" => "Y",
		"SHOW_MONTH_LIST" => "Y",
		"SHOW_TIME" => "N",
		"SHOW_YEAR" => "Y",
		"TITLE_LEN" => "0",
		"TYPE" => "EVENTS",
		"WEEK_START" => "1",
		"YEAR_VAR_NAME" => "year"
	),
	false
); ?>

                        <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"side_list_banner", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "List_banners",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "URL",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "side_list_banner"
	),
	false
); ?>

                    </div>
                </div>
                <div class="layout__mainbar layout__mainbar_main">
                    <? if ($APPLICATION->GetCurPage(true) != '/index.php'): ?>
                        <h1><? $APPLICATION->ShowTitle(false); ?></h1>
                    <? endif; ?>
