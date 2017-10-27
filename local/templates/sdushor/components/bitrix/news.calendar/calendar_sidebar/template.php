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
$this->setFrameMode(true);
?>
<h2>Календарь событий</h2>
<div class="calendar">
    <? //dump($arResult)?>
    <div class="calendar__header">
        <? if ($arResult["SHOW_MONTH_LIST"]): ?>
            <select onChange="month_result()" name="MONTH_SELECT" id="month_sel" class="js-select select">
                <? foreach ($arResult["SHOW_MONTH_LIST"] as $month => $arOption): ?>
                    <option value="<?= $arOption["VALUE"] ?>" <? if ($arResult["currentMonth"] == $month) echo "selected"; ?>><?= $arOption["DISPLAY"] ?></option>
                <? endforeach ?>
            </select>
            <script language="JavaScript" type="text/javascript">
                function month_result() {
                    var idx = document.getElementById("month_sel").selectedIndex;
                    <?if($arParams["AJAX_ID"]):?>
                    BX.ajax.insertToNode(document.getElementById("month_sel").options[idx].value, 'comp_<?echo CUtil::JSEscape($arParams['AJAX_ID'])?>', <?echo $arParams["AJAX_OPTION_SHADOW"] == "Y" ? "true" : "false"?>);
                    <?else:?>
                    window.document.location.href = document.getElementById("month_sel").options[idx].value;
                    <?endif?>
                }
            </script>


            <select onChange="year_result()" name="YEAR_SELECT" id="year_sel" class="js-select select">

                <option value="<?= $arResult["currentYear"] ?>"
                        class="selected"><?= $arResult["currentYear"] ?></option>
                <? if (!empty($arResult["PREV_YEAR_URL"])): ?>
                <option value="<?= $arResult["PREV_YEAR_URL"] ?>"><?= $arResult["PREV_YEAR"] ?></option>
                <? endif; ?>

                <? if (!empty($arResult["NEXT_YEAR_URL"])): ?>
                    <option value="<?= $arResult["NEXT_YEAR_URL"] ?>"><?= $arResult["NEXT_YEAR"] ?></option>
                <? endif; ?>

            </select>

            <script language="JavaScript" type="text/javascript">

                function year_result() {
                    var idx = document.getElementById("year_sel").selectedIndex;
                    <?if($arParams["AJAX_ID"]):?>
                    BX.ajax.insertToNode(document.getElementById("year_sel").options[idx].value, 'comp_<?echo CUtil::JSEscape($arParams['AJAX_ID'])?>', <?echo $arParams["AJAX_OPTION_SHADOW"] == "Y" ? "true" : "false"?>);
                    <?else:?>
                    window.document.location.href = document.getElementById("year_sel").options[idx].value;
                    <?endif?>
                }


            </script>

        <? endif ?>
    </div>

    <div class="calendar__day-names">
        <? foreach ($arResult["WEEK_DAYS"] as $WDay): ?>
            <div class="calendar__day-name"><?= $WDay["SHORT"] ?></div>
        <? endforeach ?>
    </div>

    <?//dump($arResult["MONTH"])?>
    <? foreach ($arResult["MONTH"] as $arWeek): ?>
        <div class="calendar__days">

            <? foreach ($arWeek as $arDay): ?>

                <? if (count($arDay["events"]) > 0): ?>
                    <a href="<?= $arDay["events"][0]["url"] ?>"
                       class="calendar__day calendar__day_has-event"><?= $arDay["day"] ?></a>
                <? else: ?>
                    <div class="
                    <? if ($arDay["tday_class"] == 'NewsCalDayOther'): ?> calendar__day calendar__day_prev
                    <?elseif($arDay["td_class"] == 'NewsCalToday'):?>calendar__day calendar__day_current
                    <? else: ?>calendar__day <? endif; ?>"><?= $arDay["day"] ?></div>
                <? endif; ?>

            <? endforeach ?>
        </div>
    <? endforeach ?>

</div>
