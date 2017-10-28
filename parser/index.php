<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Парсер"); ?>
<?
include($_SERVER["DOCUMENT_ROOT"] . "/parser/script.php");

$time_start_script = microtime(true);
$obj = new Script("6", "6", "40", "15");
$data = $obj->getData();
$time_end_script = microtime(true) - $time_start_script;

?>
    <p>Время исполнения: <span style="color: red"><? printf('%.4F', $time_end_script); ?></span> сек.</p>
<?
dump($data);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>