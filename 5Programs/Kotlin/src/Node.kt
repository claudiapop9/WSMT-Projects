package org.kotlinlang.play

class Node {
    val nodeId: Int
    val parentId: Int
    val side: String
    val data: String

    constructor(nodeId: Int, parentId: Int, side: String, data: String) {

        this.nodeId = nodeId
        this.parentId = parentId
        this.side = side
        this.data = data
    }

    fun toCustomNode(): CustomNode{
        return CustomNode(nodeId, null, null, data)
    }
}