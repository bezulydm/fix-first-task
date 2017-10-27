<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


</div>
</div>
</div>
</div>

<footer class="page__footer">

    <div class="page__content page__content_spaced">
        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "bottom",
            array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "2",
                "MENU_CACHE_GET_VARS" => array(),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "bottom",
                "USE_EXT" => "N",
                "COMPONENT_TEMPLATE" => "bottom",
                "MENU_THEME" => "site"
            ),
            false
        ); ?>

        <? $APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "footer",
            Array(
                "PAGE" => "#SITE_DIR#search/index.php",
                "USE_SUGGEST" => "N"
            )
        ); ?>
        <div class="footer-inf">
            <div class="footer-inf__i footer-inf__i_name">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/include/name.php"
                    )
                ); ?>
            </div>
            <div class="footer-inf__i footer-inf__i_counters">
                <a href="#" class="counter">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/include/counter.php"
                        )
                    ); ?>
                </a>
            </div>
            <div class="footer-inf__i footer-inf__i_made-by">

                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/include/copyright.php"
                    )
                ); ?>
            </div>
        </div>

    </div>

</footer>

</div>
</body>

</html>