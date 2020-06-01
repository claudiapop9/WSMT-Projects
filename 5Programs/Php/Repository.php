<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 5/24/2020
 * Time: 9:32 PM
 */
require_once("CustomNode.php");

class Repository
{
    private $nodeCollection = array();

    public function __construct(DataAccess $dataAccess)
    {
        $this->nodeCollection = $dataAccess->loadData();
    }

    public function getPostOrderTree()
    {
        $this->printPostOrder($this->createBinaryTree());
    }


    private function printPostOrder(CustomNode $node)
    {
        if (is_null($node)) {
            return;
        }
        $leftChild = $node->get_leftChild();
        $rightChild = $node->get_rightChild();

        if (!is_null($leftChild))
            $this->printPostOrder($node->get_leftChild());
        if (!is_null($rightChild))
            $this->printPostOrder($node->get_rightChild());

        echo $node;
    }

    private function createBinaryTree()
    {
        $rootNode = $this->findRoot();
        $this->addChildren($rootNode);

        return $rootNode;
    }

    private function findRoot()
    {
        $rootNode = $this->findParent();
        $leftChild = ($this->findChild($rootNode, "left"))->toCustomNode();
        $rightChild = ($this->findChild($rootNode, "right"))->toCustomNode();
        return new CustomNode($rootNode->getNodeId(), $leftChild, $rightChild, $rootNode->getData());
    }

    private function addChildren(CustomNode $rootNode)
    {
        if ($rootNode == null) {
            return;
        }
        $leftChild = $this->findCustomChild($rootNode, "left");
        if ($leftChild != null) {
            $rootNode->set_leftChild($leftChild->ToCustomNode());
        }

        $rightChild = $this->findCustomChild($rootNode, "right");
        if ($rightChild != null) {
            $rootNode->set_rightChild($rightChild->ToCustomNode());
        }

        if ($rootNode->get_leftChild() != null) {
            $this->addChildren($rootNode->get_leftChild());
        }
        if ($rootNode->get_rightChild() != null) {
            $this->addChildren($rootNode->get_rightChild());
        }

    }

    private function findParent()
    {
        foreach ($this->nodeCollection as $node) {
            if ($node->getParentId() == -1) {
                return $node;
            }
        }
        return null;
    }

    private function findChild(Node $rootNode, $side)
    {
        foreach ($this->nodeCollection as $node) {
            if ($node->getParentId() == $rootNode->getNodeId() && $node->getSide() == $side) {
                return $node;
            }
        }
        return null;
    }

    private function findCustomChild(CustomNode $rootNode, $side)
    {
        foreach ($this->nodeCollection as $node) {
            if ($node->getParentId() == $rootNode->get_nodeId() && $node->getSide() == $side) {
                return $node;
            }
        }
        return null;
    }


}