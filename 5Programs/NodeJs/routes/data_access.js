var fs = require('fs');
var Node = require("./node.js");

var method = DataAccess.prototype;

function DataAccess() {
    // this._filename = filename;
    this._filename = "C:\\wsmt\\binaryTree.txt";
}

method.loadData = function() {
    var node_collection = [];
    fs.readFileSync(this._filename, 'utf-8').split(/\r?\n/).forEach(function(line) {
        var split_data = line.split(';');
        var node = new Node(split_data[0],split_data[1],split_data[2], split_data[3])
        node_collection.push(node);
    });

    return node_collection;
};

module.exports = DataAccess;
