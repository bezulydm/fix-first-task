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

<div class="news-detail">

    <?if(is_array($arResult["DETAIL_PICTURE"])):?>

        <div class="txt-to-center">
            <a class="graph graph-inf_space-bottom_none">
                <img
                        class="graph__img"
                        src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                        alt="<?=$arResult["NAME"]?>"
                        title="<?=$arResult["NAME"]?>"
                />
            </a>
        </div>

    <?endif;?>

    <p><?=$arResult["~DETAIL_TEXT"]?></p>

    <?if(is_array($arResult["DISPLAY_PROPERTIES"]["FILE_IMAGE"])):?>

        <div class="js-scroll scrolled">
            <ul class="scrolled__lst js-img-zoom">
                <?foreach ($arResult["DISPLAY_PROPERTIES"]["FILE_IMAGE"]["FILE_VALUE"] as $arItem):?>
                    <li class="scrolled__i">
                        <a href="<?=$arItem["SRC"]?>"
                           title="" class="scrolled__a js-img-zoom__target" rel="group">
                            <img src="<?=$arItem["SMALL"]?>" class="scrolled__img">
                        </a>
                    </li>
                <?endforeach;?>
            </ul>
        </div>

    <?endif;?>

    <span class="folding__date" style="float: right"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
</div>