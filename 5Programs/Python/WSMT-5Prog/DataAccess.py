from typing import List

from Node import Node


class DataAccess:
    def __init__(self, filename):
        self.filename = filename

    def load_data(self):
        nodes: List[Node] = []
        with open(self.filename, "r") as file:
            while True:
                line = file.readline()
                if not line:
                    break
                split_line = line.strip().split(';')
                node = Node(int(split_line[0]), int(split_line[1]), split_line[2], split_line[3])
                nodes.append(node)

        return nodes
