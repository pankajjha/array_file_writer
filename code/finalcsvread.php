<?php
$translationLanguage = 'en_US';
$translatedfileName = 'frontend.php';
$inputCsvFile = 'frontend.csv';


$csvFile = file($inputCsvFile);

if(!file_exists($translationLanguage))
	mkdir($translationLanguage);



$file_name = "$translationLanguage".'/'."$translatedfileName";
$data = [];
foreach ($csvFile as $row_no => $line) {
	/* if($row_no == 0){
		continue;
	} */
	$row = str_getcsv($line);

	$lang_key = (isset($row[0]))?$row[0]:'';
	$lang_value = (isset($row[1]))?$row[1]:'';
	if($lang_key == '' || $lang_value == ''){
		continue;
	}
	assignArrayByPath($data, $lang_key, $lang_value);
	
}


function assignArrayByPath(&$data_array, $key_string, $value) {
    $keys = explode('.', $key_string);

    foreach ($keys as $key) {
        $data_array = &$data_array[$key];
    }

    $data_array = $value;
}


