<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
<div class="js-scroll scrolled mCustomScrollbar _mCS_1">
    <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_horizontal mCSB_inside" style="max-height: none;"
         tabindex="0">
        <ul class="scrolled__lst js-img-zoom">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <li class="scrolled__i" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                       title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                       class="scrolled__a js-img-zoom__target" rel="group">
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SMALL"] ?>"
                             height="160" width="160" class="scrolled__img mCS_img_loaded">
                    </a>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
</div>