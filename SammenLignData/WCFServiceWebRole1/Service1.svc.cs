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
        public string FugtA(string Fra, string Til)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT Fugt FROM SmartHomeData WHERE Dato between '"+Fra+"' AND '"+Til+"'", con);
            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                gennemsnit.Add(decimal.Parse(dr["Fugt"].ToString()));
            }
            string a = "Fugt A: " + gennemsnit.Average();
            return a;
        }

        public string FugtB(string Fra, string Til)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT Fugt FROM SmartHomeData WHERE Dato between '" + Fra + "' AND '" + Til + "'", con);
            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                gennemsnit.Add(decimal.Parse(dr["Fugt"].ToString()));
            }
            string a = "Fugt B: " + gennemsnit.Average();
            return a;
        }

        public string LysA(string Fra, string Til)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT Lys FROM SmartHomeData WHERE Dato between '" + Fra + "' AND '" + Til + "'", con);
            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                gennemsnit.Add(decimal.Parse(dr["Lys"].ToString()));
            }
            string a = "Lys A: " + gennemsnit.Average();
            return a;
        }

        public string LysB(string Fra, string Til)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT Lys FROM SmartHomeData WHERE Dato between '" + Fra + "' AND '" + Til + "'", con);
            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                gennemsnit.Add(decimal.Parse(dr["Lys"].ToString()));
            }
            string a = "Lys B: " + gennemsnit.Average();
            return a;
        }

        public string TempA(string Fra, string Til)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT Temperature FROM SmartHomeData WHERE Dato between '" + Fra + "' AND '" + Til + "'", con);
            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                gennemsnit.Add(decimal.Parse(dr["Temperature"].ToString()));
            }
            string a = "Varme A: " + gennemsnit.Average();
            return a;
        }

        public string TempB(string Fra, string Til)
        {
            SqlConnection con = new SqlConnection("Data Source=ramaldb.database.windows.net;Initial Catalog=SmartHomeDB;Integrated Security=False;User ID=ramal;Password=Rs123456;Connect Timeout=60;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False");
            con.Open();
            var command = new SqlCommand("SELECT Temperature FROM SmartHomeData WHERE Dato between '" + Fra + "' AND '" + Til + "'", con);
            SqlDataReader dr = command.ExecuteReader();
            List<decimal> gennemsnit = new List<decimal>();
            while (dr.Read())
            {
                gennemsnit.Add(decimal.Parse(dr["Temperature"].ToString()));
            }
            string a = "Temperature B: " + gennemsnit.Average();
            return a;
        }
    }
}
