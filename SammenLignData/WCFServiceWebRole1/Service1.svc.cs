using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;
using System.Diagnostics;
using System.Net.Sockets;
using System.IO;
using System.Web.Script.Serialization;

namespace WCFServiceWebRole1
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Service1" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Service1.svc or Service1.svc.cs at the Solution Explorer and start debugging.
    public class Service1 : IService1
    {
        TextWriterTraceListener txt = new TextWriterTraceListener("log.txt");
        
        public int Forskellen(string AvgA, string AvgB)
        {
            decimal a = decimal.Parse(AvgA) - decimal.Parse(AvgB);
            if (a < 0)
            {
                a = a * -1;
            }
            return Convert.ToInt16(a);
        }
        public int GennemsnitA(string fra ,string til, string type)
        {
            DateTime FraD = DateTime.Parse(fra);
            DateTime TilD = DateTime.Parse(til);
            txt.WriteLine("Gennemsnit - Fra"+FraD+" - Til: "+TilD+" - Type: "+type);
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT "+type+" FROM SmartHomeData WHERE Dato BETWEEN @p1 AND @p2", con);
            command.Parameters.AddWithValue("@p1", FraD);
            command.Parameters.AddWithValue("@p2", TilD);

            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                Console.WriteLine(dr[0].ToString());
                gennemsnit.Add(decimal.Parse(dr[type].ToString()));
            }
            con.Close();
            int a = Convert.ToInt16(gennemsnit.Average());
            return a;

        }
        
        public int FangData(string a)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            string nyest = "";
            DateTime date = DateTime.Now;

            //var command = new SqlCommand("SELECT Temperature FROM SmartHomeData", con);
            var command = new SqlCommand("SELECT " + a + ", Dato FROM SmartHomeData WHERE ID = IDENT_CURRENT('SmartHomeData')", con);
            SqlDataReader dr = command.ExecuteReader();

            
            while (dr.Read())
            {
                nyest = dr[0].ToString();
                date = DateTime.Parse(dr[1].ToString());
            }
            
            txt.WriteLine("Fang Data: " + a + " - Data: " + nyest);
            return Convert.ToInt16(nyest);

        }
        public string FangDataTilSheet(string type)
        {
            DateTime FraD = DateTime.Now.AddDays(-7);
            DateTime TilD = DateTime.Now;
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            
            var command = new SqlCommand("SELECT " + type + " FROM SmartHomeData WHERE Dato BETWEEN @p1 AND @p2", con);
            command.Parameters.AddWithValue("@p1", FraD);
            command.Parameters.AddWithValue("@p2", TilD);

            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                Console.WriteLine(dr[0].ToString());
                gennemsnit.Add(decimal.Parse(dr[type].ToString()));
            }
            con.Close();
            txt.WriteLine("Liste - Fra" + FraD + " - Til: " + TilD + " - Type: " + type);
            var jsonSerialiser = new JavaScriptSerializer();
            var json = jsonSerialiser.Serialize(gennemsnit);
            return json.ToString();
        
    }
        public void send(string type, int værdi)
        {
            TcpClient clientSocket = new TcpClient("localhost", 6789);
            Stream ns = clientSocket.GetStream();
            StreamReader sr = new StreamReader(ns);
            StreamWriter sw = new StreamWriter(ns);
            sw.AutoFlush = true;
            string mes = type + " " + værdi;
            sw.WriteLine(mes);
            ns.Close();
            clientSocket.Close();
        }
    }
}
