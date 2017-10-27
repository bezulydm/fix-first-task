<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?
foreach( $arResult["ITEMS"] as $key => $img){
    if(is_array($arResult["ITEMS"][$key]["PREVIEW_PICTURE"])) {
        $resize_img = CFile::ResizeImageGet(
            $img['PREVIEW_PICTURE'],
            Array('width'=>140, 'height'=>110),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $arResult["ITEMS"][$key]["PREVIEW_PICTURE"]["SRC"] = $resize_img['src'];
    }
}
?>