<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<ul class="main-nav js-nav">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>

            <li class="<?if ($arItem["SELECTED"]):?>main-nav__i main-nav__i_parent is-open <?else:?>main-nav__i main-nav__i_parent<?endif?>">

                <div class="main-nav__h">
			        <a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>main-nav__a is-active<?else:?>main-nav__a<?endif?>"><?=$arItem["TEXT"]?></a>
				    <div class="main-nav__ctrl"></div>
                </div>

            <ul class="main-nav__sub" <?if ($arItem["SELECTED"]):?> style="display: block;"<?endif?>>

		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="main-nav__i">
				<div class="main-nav__h">
				<a  href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>main-nav__a is-active<?else:?>main-nav__a<?endif?>"><?=$arItem["TEXT"]?></a>
				</div>
				</li>
			<?else:?>
				<li class="main-nav__sub-i"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>main-nav__sub-a is-active<?else:?>main-nav__sub-a<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>


		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>