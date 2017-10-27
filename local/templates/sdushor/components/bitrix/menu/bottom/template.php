<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="footer-cols">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
		    <div class="footer-cols__i">
                <ul class="list-nav">
			    <li class="list-nav__i"><a href="<?=$arItem["LINK"]?>" class="list-nav__a"><?=$arItem["TEXT"]?></a></li>
				
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			    <div class="footer-cols__i">
				    <ul class="list-nav">
				        <li class="list-nav__i"><a href="<?=$arItem["LINK"]?>" class="list-nav__a"><?=$arItem["TEXT"]?></a></li>
				    </ul>
                </div>
			<?else:?>
				<li class="list-nav__i"><a href="<?=$arItem["LINK"]?>" class="list-nav__a"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>
</div>
<?endif?>