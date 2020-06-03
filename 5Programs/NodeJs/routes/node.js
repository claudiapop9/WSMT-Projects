var CustomNode = require("./custom_node.js");
var method = Node.prototype;

function Node(node_id, parent_id, side, data) {
    this.node_id = node_id;
    this.parent_id = parent_id;
    this.side = side;
    this.data = data;
}

method.getNodeId = function () {
    return this.node_id;
};
method.getParentId = function () {
    return this.parent_id;
};
method.getSide = function () {
    return this.side;
};
method.getData = function () {
    return this.data;
};
method.to_custom_node = function () {
    var node = new CustomNode(this.node_id, null, null, this.data);
    return node
};
method.toString = function () {
    return 'Node_id ' + this.node_id + ' Parent_id ' + this.parent_id;
};


module.exports = Node;
