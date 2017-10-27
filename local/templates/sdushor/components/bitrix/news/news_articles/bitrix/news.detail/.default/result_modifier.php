<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?

if (is_array($arResult["DISPLAY_PROPERTIES"]["FILE_IMAGE"])) {

    foreach ($arResult["DISPLAY_PROPERTIES"]["FILE_IMAGE"]["FILE_VALUE"] as $key => $img) {
        $resize_img = CFile::ResizeImageGet(
            $img,
            Array('width' => 160, 'height' => 160),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $arResult["DISPLAY_PROPERTIES"]["FILE_IMAGE"]["FILE_VALUE"][$key]["SMALL"] = $resize_img['src'];
    }

}

