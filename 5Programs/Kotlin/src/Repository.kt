package org.kotlinlang.play

class Repository(dataAccess: DataAccess) {
    private val nodeCollection = dataAccess.loadData()

    fun getPostOrderTree() {
        printPostOrder(createBinaryTree())
    }

    private fun printPostOrder(node: CustomNode?) {
        if (node == null)
            return
        printPostOrder(node.leftNode)
        printPostOrder(node.rightNode)
        print(node)
    }

    private fun createBinaryTree(): CustomNode {
        val rootNode = findRoot()
        addChildren(rootNode)

        return rootNode
    }

    private fun findRoot(): CustomNode {
        val rootNode = nodeCollection.find { x -> x.parentId == -1 } ?: return CustomNode()
        val leftChild = nodeCollection.find { x -> x.parentId == rootNode.nodeId && x.side == "left" }
        val rightChild = nodeCollection.find { x -> x.parentId == rootNode.nodeId && x.side == "right" }
        return CustomNode(rootNode.nodeId, leftChild?.toCustomNode(), rightChild?.toCustomNode(), rootNode.data)
    }

    private fun addChildren(node: CustomNode?) {
        if (node == null) return

        val leftChild = nodeCollection.find { x -> x.parentId == node.id && x.side == "left" }
        val rightChild = nodeCollection.find { x -> x.parentId == node.id && x.side == "right" }

        if (leftChild != null) {
            node.leftNode = leftChild.toCustomNode()
        }
        if (rightChild != null) {
            node.rightNode = rightChild.toCustomNode()
        }

        if (node.leftNode != null) {
            addChildren(node.leftNode)
        }
        if (node.rightNode != null) {
            addChildren(node.rightNode)
        }
    }
}