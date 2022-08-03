<?php

$searchRoot = 'test_search';
$searchName = 'test.txt';

$searchResult = [];

function searchFiles(string $dir, string $fileName, array &$searchResult)
{
    $currDirElements = array_diff(scandir($dir), array('..', '.'));

    foreach ($currDirElements as $element) {    
        if (is_dir($dir . '/' . $element)) {
            searchFiles($dir . '/' . $element, $fileName, $searchResult);
        } else {
            if ($element === $fileName) {
                $searchResult[] = $dir . '/' . $element;
            }
        }
    }
}

searchFiles($searchRoot, $searchName, $searchResult);

if (empty($searchResult)) {
    echo 'Поиск не дал результатов';
} else {
    print_r($searchResult);
}
