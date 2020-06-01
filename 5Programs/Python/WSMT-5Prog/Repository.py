from CustomNode import CustomNode


class Repository:

    def __init__(self, data_access):
        self.nodeCollection = data_access.load_data()

    def get_post_order_tree(self):
        self.print_post_order(self.create_binary_tree())

    def print_post_order(self, node):
        if node:
            self.print_post_order(node.left_node)
            self.print_post_order(node.right_node)
            print(node.data)

    def create_binary_tree(self):
        root_node = self.find_root()
        self.add_children(root_node)
        return root_node

    def find_root(self):
        root_node = None
        left_child = None
        right_child = None
        for x in self.nodeCollection:
            if x.parent_id == -1:
                root_node = x
        if root_node:
            left_child = self.find_child(root_node, "left")
            right_child = self.find_child(root_node, "left")
        return CustomNode(root_node.node_id, left_child, right_child, root_node.data)

    def find_child(self, root_node, side):
        for x in self.nodeCollection:
            if x.parent_id == root_node.node_id and x.side == side:
                return x
        return None

    def add_children(self, node):
        if node:
            left_child = self.find_custom_child(node, "left")
            if left_child:
                node.left_node = left_child.to_custom_node()
            right_child = self.find_custom_child(node, "right")
            if right_child:
                node.right_node = right_child.to_custom_node()
            if node.left_node:
                self.add_children(node.left_node)
            if node.right_node:
                self.add_children(node.right_node)

    def find_custom_child(self, root_node, side):
        for x in self.nodeCollection:
            if x.parent_id == root_node.id and x.side == side:
                return x
        return None