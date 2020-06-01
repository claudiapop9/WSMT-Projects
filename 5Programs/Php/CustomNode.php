<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 5/24/2020
 * Time: 9:32 PM
 */

class CustomNode
{
    private $nodeId;
    private $leftChild;
    private $rightChild;
    private $data;

    public function __construct($nodeId, $leftChild, $rightChild, $data)
    {
        $this->nodeId = $nodeId;
        $this->leftChild = $leftChild;
        $this->rightChild = $rightChild;
        $this->data = $data;
    }

    public function get_nodeId()
    {
        return $this->nodeId;
    }

    public function get_leftChild()
    {
        return $this->leftChild;
    }

    public function set_leftChild(CustomNode $left)
    {
        $this->leftChild = $left;
    }

    public function get_rightChild()
    {
        return $this->rightChild;
    }

    public function set_rightChild(CustomNode $right)
    {
        $this->rightChild = $right;
    }

    public function __toString()
    {
        return " NodeId: $this->nodeId Data: $this->data";
    }
}