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
<h2>Фотогалерея</h2>
<div class="carousel js-carousel js-img-zoom flickity-enabled is-draggable">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>

    <div class="carousel__i" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="carousel__a js-img-zoom__target">
            <img src="<?= $arItem["PREVIEW_PICTURE"]["SMALL"] ?>" height="160" width="160" alt="" class="carousel__img">
        </a>
    </div>

<?endforeach;?>
</div>