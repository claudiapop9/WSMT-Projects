package org.kotlinlang.play

class CustomNode {
    var id: Int = 0
    var leftNode: CustomNode? = null
    var rightNode: CustomNode? = null
    var data: String = ""

    constructor()
    constructor(id: Int, leftNode: CustomNode?, rightNode: CustomNode?, data: String) {

        this.id = id
        this.leftNode = leftNode
        this.rightNode = rightNode
        this.data = data
    }

    override fun toString(): String {
        return "[Id: $id Data: $data]"
    }
}