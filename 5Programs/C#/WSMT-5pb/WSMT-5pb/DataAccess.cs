using System;
using System.Collections.Generic;
using System.IO;

namespace WSMT_5pb
{
    public class DataAccess
    {
        private string filename;

        public DataAccess(string filename)
        {
            this.filename = filename;
        }

        public List<Node> LoadData()
        {
            List<Node> nodes = new List<Node>();
            try
            {
                string[] lines = File.ReadAllLines(filename);

                foreach (string line in lines)
                {
                    string[] splittedLine = line.Split(';');
                    Node node = new Node(Int32.Parse(splittedLine[0]), Int32.Parse(splittedLine[1]), splittedLine[2].ToString(), splittedLine[3].ToString());
                    nodes.Add(node);
                }
            }
            catch (IOException e)
            {
                Console.WriteLine("Could not read from file" + e);
            }

            return nodes;
        }
    }
}