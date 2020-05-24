package org.kotlinlang.play

fun main(args: Array<String>) {
    val filename = requestFile()
    val dataAccess = DataAccess(filename)
    val repository = Repository(dataAccess)
    repository.getPostOrderTree()
}

private fun requestFile(): String {
    var str = "------------Menu----------------\n\n"
    str += "Please enter the filename: \n"
    println(str)
    val filename = readLine()
    return filename.toString()
}