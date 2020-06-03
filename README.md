### Requirement ###
5Programe Assignment requires to implement in 5 programming languages: C#, Java or Kotlin, PHP, Python or Go, NodeJs the following problem:
Write a program which parse in postorder a binar tree. The tree is read from a text file and each Node has the following attributes: NodeId, ParentId, If is left/right child, NodeData.
The file name is read from console line, and the tree has no preset dimension;”

### Proposed solution ###
The implementation is written in the following languages: C#, Kotlin, PHP,Python ,NodeJs. 
The file containing the nodes data is read line by line. Each line is parsed and split by ,, ; ”. After we obtain a list of nodes, we create a binary tree using a custom node entity. In the end the previously created binary tree is parsed in post order.
The data in the file is random and does not matter the size of the tree.  Note: in case the file has no valid nodes they won’t be added to the tree;(for instance node with invalid parent).
