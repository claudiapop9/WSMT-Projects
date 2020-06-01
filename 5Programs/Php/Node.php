<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 5/24/2020
 * Time: 9:32 PM
 */

class Node
{
    private $nodeId;
    private $parentId;
    private $side;
    private $data;

    public function __construct($nodeId, $parentId, $side, $data)
    {
        $this->nodeId = $nodeId;
        $this->parentId = $parentId;
        $this->side = $side;
        $this->data = $data;
    }

    public function toCustomNode()
    {
        return new CustomNode($this->nodeId, null, null, $this->data);
    }

    public function getNodeId()
    {
        return $this->nodeId;
    }

    public function getParentId()
    {
        return $this->parentId;
    }

    public function getSide()
    {
        return $this->side;
    }

    public function getData()
    {
        return $this->data;
    }

    public function __toString()
    {
        return " [NodeId: $this->nodeId ParentId: $this->parentId Side: $this->side Data: $this->data ]";
    }
}