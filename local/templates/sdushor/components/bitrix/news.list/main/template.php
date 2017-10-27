<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<h2>Последние новости</h2>
<div class="teasers">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="teasers__i" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="teasers__photo">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="teasers__photo-a">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="teasers__img">
                </a>
            </div>
            <div class="teasers__body">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="teasers__h"><?echo $arItem["NAME"]?></a>
                <span class="folding__date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
                <div class="teasers__txt">
                    <?=$arItem["PREVIEW_TEXT"];?> </div>
            </div>
        </div>
    <?endforeach;?>
    <div class="teasers__more">
        <a href="/news_articles/news/" class="teasers__more-a">Все новости</a>
    </div>
</div>