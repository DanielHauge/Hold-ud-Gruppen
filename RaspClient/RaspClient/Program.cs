using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Net;
using System.Net.Sockets;
using System.Security.Cryptography.X509Certificates;
using System.Text;
using System.Threading.Tasks;

namespace RaspClient
{
    class Program
    {


        private const int listenPort = 7000;
        
        private static void StartListener()
        {
            bool done = false;

            UdpClient listener = new UdpClient(listenPort);
            IPEndPoint groupEP = new IPEndPoint(IPAddress.Any, listenPort);

            try
            {
                while (!done)
                {
                    Console.WriteLine("Waiting for SmartHome Data");
                    byte[] bytes = listener.Receive(ref groupEP);

                    //Console.WriteLine("Received broadcast from {0} :\n {1}\n",
                    //    groupEP.ToString(),
                    //    Encoding.ASCII.GetString(bytes, 0, bytes.Length));

                    string text = Encoding.ASCII.GetString(bytes, 0, bytes.Length);

                    string[] teksts = text.Split(':');
                    string a = teksts[4].Substring(0, 5);
                    string b = teksts[5].Substring(0, 5);
                    string c = teksts[6].Substring(0, 5);
                    string d = teksts[7].Substring(0, 7);

                    double a1 = double.Parse(a);
                    double b1 = double.Parse(b);
                    double c1 = double.Parse(c);
                    

                    Console.WriteLine(a1);
                    Console.WriteLine(b1);
                    Console.WriteLine(c1);
                    
                    

                    SqlConnection con =
                        new SqlConnection(

                            "Data Source=(localdb)\\MSSQLLocalDB;Initial Catalog=PowernapDB;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
                    
                    
                    con.Open();

                    var command = new SqlCommand("INSERT INTO SmartHomeData (Temperature, Fugt, Lys, Movement, Dato) VALUES (@Temperature, @Fugt, @Lys, @Movement, @Dato) , ", con);

                    command.Parameters.AddWithValue("@Temperature", a1);
                    command.Parameters.AddWithValue("@Fugt", b1);
                    command.Parameters.AddWithValue("@Lys", c1);
                    command.Parameters.AddWithValue("@Movement", a1);
                    command.Parameters.AddWithValue("@Dato", d);


                    command.ExecuteNonQuery();
                    
                    //command.Parameters.AddWithValue("@Movement", bytes[0]);


                    //command.Connection = con;
                    //con.Close();
                    //command.Connection = con;







                }

            }
            catch (Exception e)
            {
                Console.WriteLine(e.ToString());
            }


            
            finally
            {
                listener.Close();
            }
        }



        public static int Main()
        {
            StartListener();

            return 0;
        }
    }

	
    
}
