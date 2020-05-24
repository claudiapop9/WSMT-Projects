namespace WSMT_5pb
{
    public class Node
    {
        public int NodeId { get; set; }
        public int ParentId { get; set; }
        public string Side { get; set; }
        public string Data { get; set; }

        public Node(int nodeId, int parentId, string side, string data)
        {
            NodeId = nodeId;
            ParentId = parentId;
            Side = side;
            Data = data;
        }

        public CustomNode ToCustomNode()
        {
            return new CustomNode(NodeId, null, null, Data);
        }

        public override string ToString()
        {
            return "[NodeId: " + NodeId + " ParentId: " + ParentId + " Side: " + Side + " " + Data + "]";
        }

    }
}