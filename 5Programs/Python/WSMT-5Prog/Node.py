from CustomNode import CustomNode


class Node:

    def __init__(self, node_id, parent_id, side, data):
        self.node_id = node_id
        self.parent_id = parent_id
        self.side = side
        self.data = data

    def to_custom_node(self):
        return CustomNode(self.node_id, None, None, self.data)
