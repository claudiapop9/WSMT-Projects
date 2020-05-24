using System;

namespace WSMT_5pb
{
    class Program
    {
        public static string RequestFile()
        {
            string str = "------------Menu----------------\n\n";
            str += "Please enter the filename: \n";
            
            Console.WriteLine(str);
            string c = Console.ReadLine();
            return c;
        }

        static void Main(string[] args)
        {
            string filename = RequestFile();
            DataAccess dataAccess= new DataAccess(filename);
            Repository repo = new Repository(dataAccess);
            repo.GetPostOrderTree();            
            Console.ReadKey();
        }
    }
}
