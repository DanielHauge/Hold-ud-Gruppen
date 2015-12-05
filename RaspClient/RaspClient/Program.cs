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
        public static Radiator rad = new Radiator();
        private static void StartListener(Radiator rad)
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



                    if (text.Substring(0, 2).Equals("ON"))
                    {
                        TændRadiator(text, rad);
                    }
                    else if (text.Substring(0, 2).Equals("AN"))
                    {
                        AngivRadiator(text, rad);
                    }

                    string[] teksts = text.Split(':');
                    string a = teksts[4].Substring(0, 5);
                    string b = teksts[5].Substring(0, 5);
                    string c = teksts[6].Substring(0, 5);

                    decimal a1 = decimal.Parse(a);
                    decimal b1 = decimal.Parse(b);
                    decimal c1 = decimal.Parse(c);

                    Console.WriteLine(a1);
                    Console.WriteLine(b1);
                    Console.WriteLine(c1);

                    SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");


                    con.Open();

                    var command = new SqlCommand("INSERT INTO SmartHomeData (Temperature, Fugt, Lys, Dato, Forbrug) VALUES (@Temperature, @Fugt, @Lys, @Dato, @Forbrug)", con);

                    command.Parameters.AddWithValue("@Temperature", a1);
                    command.Parameters.AddWithValue("@Fugt", b1);
                    command.Parameters.AddWithValue("@Lys", c1);
                    command.Parameters.AddWithValue("@Dato", DateTime.Now);
                    command.Parameters.AddWithValue("@Forbrug", rad.pris);

                    command.ExecuteNonQuery();
                    con.Close();
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
        
        private static void AngivRadiator(string text, Radiator rad)
        {
            rad.Angiv(double.Parse(text.Substring(3, 6)));
        }

        private static void TændRadiator(string text, Radiator rad)
        {
            if (text.Substring(0, 4).Equals("ON 1"))
            {
                rad.Tænd(1);
            }
            else if (text.Substring(0, 4).Equals("ON 2"))
            {
                rad.Tænd(2);
            }
            else if (text.Substring(0, 4).Equals("ON 3"))
            {
                rad.Tænd(3);
            }
            else if (text.Substring(0, 4).Equals("ON 4"))
            {
                rad.Tænd(4);
            }
            else if (text.Substring(0, 4).Equals("ON 5"))
            {
                rad.Tænd(5);
            }
        }

        public static int Main()
        {
            StartListener(rad);

            return 0;
        }
    }

	
    
}
