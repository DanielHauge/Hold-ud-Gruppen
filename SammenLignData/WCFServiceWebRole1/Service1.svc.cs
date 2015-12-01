using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

namespace WCFServiceWebRole1
{
    // NOTE: You can use the "Rename" command on the "Refactor" menu to change the class name "Service1" in code, svc and config file together.
    // NOTE: In order to launch WCF Test Client for testing this service, please select Service1.svc or Service1.svc.cs at the Solution Explorer and start debugging.
    public class Service1 : IService1
    {
        public string Forskellen(string AvgA, string AvgB)
        {
            decimal a = decimal.Parse(AvgA) - decimal.Parse(AvgB);
            if (a < 0)
            {
                a = a * -1;
            }
            return a.ToString();
        }

        public string GennemsnitA(string fra, string til, string type)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            DateTime FraD = DateTime.Parse(fra);
            DateTime TilD = DateTime.Parse(til);
            var command = new SqlCommand("SELECT @p3 FROM SmartHomeData WHERE Dato BETWEEN @p1 AND @p2", con);
            command.Parameters.AddWithValue("@p1", FraD);
            command.Parameters.AddWithValue("@p2", TilD);
            command.Parameters.AddWithValue("@pe", type);

            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                Console.WriteLine(dr[0].ToString());
                gennemsnit.Add(decimal.Parse(dr[type].ToString()));
            }
            con.Close();
            string a = type+" A: " + gennemsnit.Average();
            return a;
        }


        public string GennemsnitB(string fra, string til, string type)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            DateTime FraD = DateTime.Parse(fra);
            DateTime TilD = DateTime.Parse(til);
            var command = new SqlCommand("SELECT @p3 FROM SmartHomeData WHERE Dato BETWEEN @p1 AND @p2", con);
            command.Parameters.AddWithValue("@p1", FraD);
            command.Parameters.AddWithValue("@p2", TilD);
            command.Parameters.AddWithValue("@pe", type);

            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                Console.WriteLine(dr[0].ToString());
                gennemsnit.Add(decimal.Parse(dr[type].ToString()));
            }
            con.Close();
            string a = type + " B: " + gennemsnit.Average();
            return a;
        }

        
    }
}
