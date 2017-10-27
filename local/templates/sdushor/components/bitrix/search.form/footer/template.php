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
$this->setFrameMode(true); ?>

<form action="<?= $arResult["FORM_ACTION"] ?>" class="search">
    <input type="text" name="q" value="" class="search__input">
    <input name="s" type="submit" class="search__button">
    <svg class="search__icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 17.5 17.5" enable-background="new 0 0 17.5 17.5" xml:space="preserve"><path fill="currentColor"
                                                                                                  d="M6.5,0C10.1,0,13,2.9,13,6.5c0,1.6-0.6,3.1-1.6,4.2l0.3,0.3h0.8l5,5L16,17.5l-5-5v-0.8l-0.3-0.3c-1.1,1-2.6,1.6-4.2,1.6C2.9,13,0,10.1,0,6.5S2.9,0,6.5,0 M6.5,2C4,2,2,4,2,6.5S4,11,6.5,11S11,9,11,6.5S9,2,6.5,2"/></svg>
</form>
