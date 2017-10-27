<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Видео");
$APPLICATION->SetTitle("Видео");
?>Text here....
<p>
    <?$APPLICATION->ShowTitle()?>

</p>
<p>
    <?$APPLICATION->GetPageProperty("title");?>
</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>