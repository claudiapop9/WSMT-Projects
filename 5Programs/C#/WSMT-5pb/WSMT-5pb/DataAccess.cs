using System;
using System.Collections.Generic;
using System.IO;

namespace WSMT_5pb
{
    public class DataAccess
    {
        private readonly string filename;

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
                    string[] splitLine = line.Split(';');
                    Node node = new Node(Int32.Parse(splitLine[0]), Int32.Parse(splitLine[1]), splitLine[2], splitLine[3]);
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