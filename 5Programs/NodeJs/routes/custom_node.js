var method = CustomNode.prototype;

function CustomNode(id, left, right, data) {
    this.id = id;
    this.leftChild = left;
    this.rightChild = right;
    this.data = data;
}

method.getId = function() {
    return this.id;
};
method.setId = function(value) {
   this.id = value;
};
method.getLeftChild = function() {
    return this.leftChild;
};
method.setLeftChild = function(value) {
    this.leftChild = value;
};
method.getRightChild = function() {
    return this.rightChild;
};
method.setRightChild = function(value) {
    this.rightChild = value;
};
method.getData = function() {
    return this.data;
};
method.setData = function(value) {
    this.data = value;
};

method.toString = function(){
    return 'Id ' + this.node_id + ' Data: ' + this.data;
};

module.exports = CustomNode;