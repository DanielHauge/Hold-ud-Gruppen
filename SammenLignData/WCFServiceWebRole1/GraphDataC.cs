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
    internal class GraphDataC
    {

        public int GraphData { get; set; }
        public DateTime dennetid { get; set; }


        private int _GraphData;
        private DateTime _dennetid;

        public GraphDataC()
        {
            GraphData = _GraphData;
            dennetid = _dennetid;
        }

    }
}