<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Видео");
?>Text here....
<p>
    <?$APPLICATION->ShowTitle()?>

</p>
<p>
    <?$APPLICATION->GetPageProperty("title");?>
</p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>