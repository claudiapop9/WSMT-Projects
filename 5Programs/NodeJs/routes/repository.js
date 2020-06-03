var CustomNode = require("./custom_node.js");
var method = Repository.prototype;

function Repository(dataAccess) {
    this.nodeCollection = dataAccess.loadData();
}

method.getPostOrderTree = function () {
    this.printPostOrder(this.createBinaryTree());
};

method.printPostOrder = function (node) {
    if (node == null) {
        return;
    }
    this.printPostOrder(node.leftChild);
    this.printPostOrder(node.rightChild);
    console.log(node);
};

method.createBinaryTree = function () {
    var rootNode = this.findRoot();
    this.addChildren(rootNode);

    return rootNode;
};

method.findRoot = function () {
    var root_node = this.findParent();
    var leftChild = this.findChild(root_node, 'left');
    var rightChild = this.findChild(root_node, 'right');
    return new CustomNode(root_node.node_id, leftChild, rightChild, root_node.getData());
};

method.findParent = function () {
    for (var i = 0; i < this.nodeCollection.length; i++) {
        var node = this.nodeCollection[i];
        if (node.parent_id === '-1') {
            return node;
        }
    }
    return null;
};

method.findChild = function (root_node, side) {
    for (var i = 0; this.nodeCollection.length > i; i++) {
        var node = this.nodeCollection[i];
        if (node.parent_id === root_node.node_id && node.side === side) {
            return node.to_custom_node();
        }
    }
    return null;
};

method.findCustomChild = function(root_node, side) {
    for (var i = 0; this.nodeCollection.length> i; i++) {
        var node = this.nodeCollection[i];
        if (node.parent_id === root_node.getId() && node.side === side) {
            return node;
        }
    }
    return null;
};

method.addChildren = function (rootNode) {
    if (rootNode == null) {
        return;
    }
    var leftChild = this.findCustomChild(rootNode, "left");
    if (leftChild != null) {
        rootNode.setLeftChild(leftChild.to_custom_node());
    }

    var rightChild = this.findCustomChild(rootNode, "right");
    if (rightChild != null) {
        rootNode.setRightChild(rightChild.to_custom_node());
    }

    if (rootNode.leftChild != null) {
        this.addChildren(rootNode.getLeftChild());
    }
    if (rootNode.rightChild != null) {
        this.addChildren(rootNode.getRightChild());
    }
};


module.exports = Repository;