namespace WSMT_5pb
{
    public class CustomNode
    {
        public int Id { get; set; }
        public CustomNode LeftNode { get; set; }
        public CustomNode RightNode { get; set; }
        public string Data { get; set; }
        public CustomNode()
        {

        }
        public CustomNode(int id, CustomNode left, CustomNode right, string data)
        {
            this.Id = id;
            this.LeftNode = left;
            this.RightNode = right;
            this.Data = data;
        }
       
        public override string ToString()
        {
            return "[Id: " + Id + " Data: "+ Data+"]";
        }
    }
}
