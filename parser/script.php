<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
include_once($_SERVER["DOCUMENT_ROOT"] . "/parser/lib/phpQuery/phpQuery/phpQuery.php");

class Script {
    private $steppingTime;
    private $step;
    private $data;
    private $START_PAGE;
    private $END_PAGE;
    private $IMAGE_NUMBER = 0;
    private $COUNT_ADD_ELEMENTS = 0;

    function __construct($START_PAGE, $END_PAGE, $step, $steppingTime) {
        $this->steppingTime = $steppingTime;
        $this->step = $step;
        $this->START_PAGE = $START_PAGE;
        $this->END_PAGE = $END_PAGE;
        $this->run();
    }

    function run() {
        ini_set('max_execution_time', 4000);
        $data = array();
        $COUNTER_ELEMENT_NEWS = 0;
        $ELEMENT_NUMBER = 0;
        for ($j = $this->START_PAGE; $j <= $this->END_PAGE; $j++) {
            $string_href_list = 'http://xn----gtbzgkdb9ax2d.xn--p1ai/news_and_stats/news/20854?PAGEN_2=' . $j . '&SIZEN_2=8';
            $document = phpQuery::newDocument($this->curlInit($string_href_list));
            $hentry = $document->find('div.teasers__i');
            foreach ($hentry as $el) {
                $pq = pq($el);
                $data[$ELEMENT_NUMBER]["DETAIL_PAGE_URL"] = 'http://xn----gtbzgkdb9ax2d.xn--p1ai' . $pq->find("div.teasers__body a")->attr('href');
                $data[$ELEMENT_NUMBER]["TITLE"] = $pq->find("div.teasers__body .teasers__h")->text();
                $data[$ELEMENT_NUMBER]["DATE"] = $pq->find("div.teasers__body .folding__date")->text();
                $PREVIEW_TEXT = $pq->find("div.teasers__body .teasers__txt")->text();
                $PREVIEW_TEXT = preg_replace("#([\r\n])[\s]+#", "", $PREVIEW_TEXT);
                $data[$ELEMENT_NUMBER]["PREVIEW_TEXT"] = $PREVIEW_TEXT;
                $data[$ELEMENT_NUMBER]["PREVIEW_IMG_SRC"] = 'http://xn----gtbzgkdb9ax2d.xn--p1ai' . $pq->find("div.teasers__photo img")->attr('src');
                $data[$ELEMENT_NUMBER]["PREVIEW_LINK_IMG"] = substr($this->createFile($this->IMAGE_NUMBER . '_preview', $data[$ELEMENT_NUMBER]["PREVIEW_IMG_SRC"]), 47);
                $document_detail = phpQuery::newDocument($this->curlInit($data[$ELEMENT_NUMBER]["DETAIL_PAGE_URL"]));
                $hentry_detail = $document_detail->find('div.news-detail');
                foreach ($hentry_detail as $el_detail) {
                    $pq_detail = pq($el_detail);
                    if (!empty($pq_detail->find("div.txt-to-center img")->attr('src'))) {
                        $data[$ELEMENT_NUMBER]["DETAIL"]["DETAIL_IMG_SRC"] = 'http://xn----gtbzgkdb9ax2d.xn--p1ai' . $pq_detail->find("div.txt-to-center img")->attr('src');
                        $data[$ELEMENT_NUMBER]["DETAIL"]["DETAIL_LINK_IMG"] = substr($this->createFile($this->IMAGE_NUMBER . '_detail', $data[$ELEMENT_NUMBER]["DETAIL"]["DETAIL_IMG_SRC"]), 47);
                    }
                    $count_context = 0;
                    foreach ($pq_detail->find('p') as $value) {
                        $value_pq = pq($value);
                        if (!empty($value_pq->find('img')->attr('src'))) {
                            $context_img_src = 'http://xn----gtbzgkdb9ax2d.xn--p1ai' . $value_pq->find('img')->attr('src');
                            $context_img_style = $value_pq->find('img')->attr('style');
                            $context_img_style_wrapper = $value_pq->attr('style');
                            $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]['CONTEXT_IMG_SRC'] = $context_img_src;
                            $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]['CONTEXT_IMG_STYLE'] = $context_img_style;
                            $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]["CONTEXT_IMG_LINK"] = substr($this->createFile($this->IMAGE_NUMBER . '_more_detail', $context_img_src), 47);
                            $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]["CONTEXT_STYLE"] = $context_img_style_wrapper;
                        }
                        if (!empty($value_pq->text())) {
                            if (!empty($value_pq->find('img')->attr('src'))) {
                                $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]['CONTEXT_P'] = $value_pq->text();
                            } else {
                                $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]['CONTEXT_P'] = $value_pq->html();
                            }
                            $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]['CONTEXT_P_ALIGN'] = $value_pq->attr('align');
                            $data[$ELEMENT_NUMBER]["DETAIL"]['P'][$count_context]['CONTEXT_STYLE'] = $value_pq->attr('style');
                        }
                        $count_context++;
                    }
                    foreach ($pq_detail->find('h3 span') as $value) {
                        $value_pq = pq($value);
                        if (!empty($value_pq->find('img')->attr('src'))) {
                            $context_img_src = $value_pq->find('img')->attr('src');
                            $context_img_style = $value_pq->find('img')->attr('style');
                            $data[$ELEMENT_NUMBER]["DETAIL"]["h3"]['CONTEXT_IMG_SRC'] = $context_img_src;
                            $data[$ELEMENT_NUMBER]["DETAIL"]["h3"]['CONTEXT_IMG_STYLE'] = $context_img_style;
                        }
                        $data[$ELEMENT_NUMBER]["DETAIL"]["h3"]["TEXT"] = $value_pq->text();
                    }
                    if (strlen($data[$ELEMENT_NUMBER]["DETAIL"]['P'][0]['CONTEXT_P']) < 5 && count($data[$ELEMENT_NUMBER]["DETAIL"]['P'])==1
                        &&  empty($data[$ELEMENT_NUMBER]["DETAIL"]['P'][0]['CONTEXT_IMG_SRC'])) {
                        $pq_detail->find('img')->remove();
                        $data[$ELEMENT_NUMBER]["DETAIL"]["TEXT"] = $pq_detail->html();
                    } else {
                        $summary_string = "";
                        foreach ($data[$ELEMENT_NUMBER]["DETAIL"]["P"] as $element_p) {
                            if (!empty($element_p["CONTEXT_IMG_LINK"])) {
                                $summary_string .= "<p ";
                                if (!empty($element_p["CONTEXT_STYLE"])) {
                                    $summary_string .= "style=\"";
                                    $summary_string .= $element_p['CONTEXT_STYLE'] . "\" >";
                                } else  $summary_string .= ">";
                                $summary_string .= "<img src =\" " . $element_p["CONTEXT_IMG_LINK"] . "\" ";
                                if (!empty($element_p["CONTEXT_IMG_STYLE"])) {
                                    $summary_string .= "style = \" " . $element_p["CONTEXT_IMG_STYLE"] . "\" >";
                                } else $summary_string .= " >";
                                if (!empty($element_p["CONTEXT_P"])) $summary_string .= $element_p["CONTEXT_P"];
                                $summary_string .= "</p>";
                            } else {
                                $summary_string .= "<p ";
                                if (!empty($element_p['CONTEXT_P_ALIGN'])) {
                                    $summary_string .= "align=\"";
                                    $summary_string .= $element_p['CONTEXT_P_ALIGN'] . "\" >";
                                    $summary_string .= $element_p["CONTEXT_P"] . "</p>";
                                } elseif(!empty($element_p['CONTEXT_STYLE'])) {
                                    $summary_string .= "style=\"";
                                    $summary_string .= $element_p['CONTEXT_STYLE'] . "\" >";
                                    $summary_string .= $element_p["CONTEXT_P"] . "</p>";
                                } else {
                                    $summary_string .= ">";
                                    $summary_string .= $element_p["CONTEXT_P"] . "</p>";
                                }
                            }
                        }
                        $data[$ELEMENT_NUMBER]["DETAIL"]["TEXT"] = $summary_string;
                    }
                }

                CModule::IncludeModule('iblock');
                $el = new CIBlockElement;
                $fields = array(
                    'IBLOCK_ID' => 2,
                    'NAME' => $data[$ELEMENT_NUMBER]["TITLE"],
                    'ACTIVE' => "Y",
                    'SEARCHABLE_CONTENT' => $data[$ELEMENT_NUMBER]["TITLE"],
                    'CREATED_BY' => '1',
                    'PREVIEW_TEXT'   => $data[$ELEMENT_NUMBER]["PREVIEW_TEXT"],
                    'DETAIL_TEXT'    => $data[$ELEMENT_NUMBER]["DETAIL"]["TEXT"],
                    'DATE_CREATE'    => $data[$ELEMENT_NUMBER]["DATE"],
                    'ACTIVE_FROM'    => $data[$ELEMENT_NUMBER]["DATE"],
                    'PREVIEW_PICTURE'    =>  CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$data[$ELEMENT_NUMBER]["PREVIEW_LINK_IMG"]),
                    'DETAIL_PICTURE'    =>  CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].$data[$ELEMENT_NUMBER]["DETAIL"]["DETAIL_LINK_IMG"]),
                    'MODIFIED_BY' => '1'
                );
                if ($ELEMENT_ID = $el->Add($fields)) {
                    $this->COUNT_ADD_ELEMENTS++;
                } else {
                    echo "Error[" . $ELEMENT_ID . "]: " . $el->LAST_ERROR . '<br />';
                }
                unset($data[$ELEMENT_NUMBER]["DETAIL"]["P"]);
                unset($data[$ELEMENT_NUMBER]["DETAIL"]["TEXT"]);
                $ELEMENT_NUMBER++;
                $COUNTER_ELEMENT_NEWS++;
                if ($COUNTER_ELEMENT_NEWS == $this->step) {
                    $COUNTER_ELEMENT_NEWS = 0;
                    sleep($this->steppingTime);
                }
            }
        }
        echo 'Добавлено элементов: ' . $this->COUNT_ADD_ELEMENTS . '<br />';
        $this->data = $data;
    }

    private function createFile($filename, $src) {
        $str_dir = $_SERVER['DOCUMENT_ROOT'] . '/upload/temp/';
        if (!file_exists($str_dir)) {
            mkdir($str_dir, 0700, true);
        }
        if (preg_match("#(jpg)#", $src)) {
            return $link = $this->selectParamFile($str_dir, $src, $filename, ".jpg");
        } elseif (preg_match("#(png)#", $src)) {
            return $link = $this->selectParamFile($str_dir, $src, $filename, ".png");
        } elseif (preg_match("#(gif)#", $src)) {
            return $link = $this->selectParamFile($str_dir, $src, $filename, ".gif");
        } else {
            return $link = $this->selectParamFile($str_dir, $src, $filename, ".jpg");
        }
    }

    private function selectParamFile($str_dir, $src, $filename, $param) {
        $link = $str_dir . $filename . $param;
        $fp = fopen($link, "w");
        fwrite($fp, $this->curlInit($src));
        fclose($fp);
        $this->IMAGE_NUMBER++;
        return $link;
    }

    private function registerFile($filename) {
        $arFile = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"] . "/upload/temp/" . $filename);
        $arFile["MODULE_ID"] = "iblock";
        $id = CFile::SaveFile($arFile, "/iblock/");
        return $id;
    }

    private function curlInit($url) {
        $ch_list = curl_init();
        curl_setopt($ch_list, CURLOPT_URL, $url);
        curl_setopt($ch_list, CURLOPT_RETURNTRANSFER, true);
        $prepare_curl = curl_exec($ch_list);
        curl_close($ch_list);
        return $prepare_curl;
    }


    public function getPrintData() {
        return print_r($this->data);
    }

    public function getData() {
        return $this->data;
    }

    public function getAllField() {
        echo '<pre>';
        print_r(get_object_vars($this));
        echo '</pre>';
    }

    function __destruct() {
        //print "" . $this->name . "\n";
    }
}

?>
