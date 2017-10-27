<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#/news_articles/news/news=(\\d{2})\\.(\\d{2})\\.(\\d{4})#",
		"RULE" => "news_DATE_ACTIVE_FROM_1=\$1.\$2.\$3&news_DATE_ACTIVE_FROM_2=\$1.\$2.\$3&set_filter=Фильтр&set_filter=Y",
		"ID" => "",
		"PATH" => "/news_articles/news/index.php",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news_articles/news/index.php",
	),
);

?>