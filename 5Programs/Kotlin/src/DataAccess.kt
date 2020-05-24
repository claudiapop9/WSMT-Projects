package org.kotlinlang.play

import java.io.File

class DataAccess(private val fileName: String) {

    fun loadData(): MutableList<Node> {
        val nodeList = mutableListOf<Node>()
        File(fileName).forEachLine {
            val splitedLines = it.split(';')
            nodeList.add(Node(splitedLines[0].toInt(),splitedLines[1].toInt(), splitedLines[2], splitedLines[3]))
        }
        return nodeList
    }
}

