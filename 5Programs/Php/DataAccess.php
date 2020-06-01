<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 5/24/2020
 * Time: 9:31 PM
 */

require_once("Node.php");
class DataAccess
{
    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
        //$this->filename = "binaryTree.txt";
    }

    public function loadData()
    {
        $nodes = array();
        $file = fopen($this->filename, "r") or die("Unable to open file!");

        while (!feof($file)) {
            list($id, $parentId, $side, $data) = explode(';', fgets($file));
            array_push($nodes, new Node($id, $parentId, $side, $data));
        }
        fclose($file);

        return $nodes;
    }
}



