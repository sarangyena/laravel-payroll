using System;
using System.Configuration;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace prjAccountability
{
    public class clsBranchM
    {
        public Int64 branchId { get; set; }
        private SqlConnection con;
        public clsBranchM()
        {
            string strCon = "Data Source=sgcserver, 16900; Initial Catalog=dbSGC; User ID = redbaron; Password=m@gi3";
            con = new SqlConnection(strCon);
        }

        public DataTable GetBranch()
        {
            string s = "SELECT id, companyname FROM tbllocation ORDER BY id ASC";
            SqlCommand cmd = new SqlCommand(s, con);
            SqlDataAdapter ada = new SqlDataAdapter(cmd);
            DataSet ds = new DataSet();
            con.Open();
            ada.Fill(ds, "Branch");
            con.Close();
            DataTable dt = ds.Tables["Branch"];
            return dt;
        }
        public DataTable GetAccountability(Int64 branchId)
        {
            string s = "SELECT tblAccountability.AccountabilityId, tblAccountability.IssuanceDate, tblAccountability.AcctIssuanceNoText, " +
                "tblAccountability.IssuedTo, tblAccountability.IssuedBy, tbllocation.companyname, tblAccountabilityDetails.ItemId, tblItemTable.itemdescription, " +
                "tblItemTable.uom, tblAccountabilityDetails.IssuedQty FROM tblAccountability INNER JOIN tblAccountabilityDetails ON " +
                "tblAccountability.AccountabilityId = tblAccountabilityDetails.AccountabilityId INNER JOIN tblItemTable ON " +
                "tblAccountabilityDetails.ItemId = tblItemTable.itemid INNER JOIN tbllocation ON tblAccountability.BranchId = tbllocation.id WHERE tblAccountability.BranchId = @branchid";
            SqlCommand cmd = new SqlCommand(s, con);
            cmd.Parameters.AddWithValue("@branchid", branchId);
            SqlDataAdapter ada = new SqlDataAdapter(cmd);
            DataSet ds = new DataSet();
            con.Open();
            ada.Fill(ds, "Accountability");
            con.Close();
            DataTable dt = ds.Tables["Accountability"];
            return dt;
        }
    }
}
