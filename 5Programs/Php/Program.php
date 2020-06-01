<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 5/24/2020
 * Time: 9:32 PM
 */
require_once("DataAccess.php");
require_once("Repository.php");
function requestFile()
{
    echo "------------Menu----------------\n\n";
    echo "Please enter the filename: \n";
    $c = readline();
    return $c;
}

function main(){
    $filename = requestFile();
    $dataAccess = new DataAccess($filename);

    $repo = new Repository($dataAccess);
    $repo ->getPostOrderTree();
}

main();
