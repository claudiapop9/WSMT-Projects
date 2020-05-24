using System;
using System.Collections.Generic;
using System.Linq;

namespace WSMT_5pb
{
    public class Repository
    {
        private readonly List<Node> nodeCollection = new List<Node>();

        public Repository(DataAccess dataAccess)
        {
            this.nodeCollection = dataAccess.LoadData();
        }

        public void GetPostOrderTree()
        {
            PrintPostOrder(CreateBinaryTree());
        }
        void PrintPostOrder(CustomNode node)
        {
            if (node == null)
                return;

            PrintPostOrder(node.LeftNode);

            PrintPostOrder(node.RightNode);

            Console.Write(node);
        }

        private CustomNode CreateBinaryTree()
        {
            var rootNode = FindRoot();
            AddChildren(rootNode);

            return rootNode;
        }

        private CustomNode FindRoot()
        {
            Node rootNode = nodeCollection.First(x => x.ParentId == -1);
            var leftChild = nodeCollection.First(x => x.ParentId == rootNode.NodeId && x.Side == "left").ToCustomNode();
            var rightChild = nodeCollection.First(x => x.ParentId == rootNode.NodeId && x.Side == "right").ToCustomNode();
            return new CustomNode(rootNode.NodeId, leftChild, rightChild, rootNode.Data);
        }

        private void AddChildren(CustomNode node)
        {
            if (node == null) { return; }

            var leftChild = nodeCollection.FirstOrDefault(x => x.ParentId == node.Id && x.Side == "left");
            if (leftChild != null)
            {
                node.LeftNode = leftChild.ToCustomNode();
            }

            var rightChild = nodeCollection.FirstOrDefault(x => x.ParentId == node.Id && x.Side == "right");

            if (rightChild != null)
            {
                node.RightNode = rightChild.ToCustomNode();
            }

            if (node.LeftNode != null)
            {
                AddChildren(node.LeftNode);
            }
            if (node.RightNode != null)
            {
                AddChildren(node.RightNode);
            }
        }

    }
}