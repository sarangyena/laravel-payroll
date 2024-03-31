using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace prjAccountability
{
    public partial class Form1 : Form
    {
        public Int64 branchId { get; set; }
        public Form1()
        {
            InitializeComponent();
        }
            
        private void Form1_Load(object sender, EventArgs e)
        {
            LoadBranch();
        }
        private void LoadBranch()
        {
            try
            {
                clsBranchM m = new clsBranchM();
                grdBranch.DataSource = m.GetBranch().AsDataView();
            }
            catch (SqlException ex)
            {
                MessageBox.Show(ex.Message);
            }
        }

        private void MasterTemplate_DoubleClick(object sender, EventArgs e)
        {
            try
            {
                branchId = Convert.ToInt64(grdBranch.SelectedRows[0].Cells["id"].Value.ToString());
                clsBranchM m = new clsBranchM();
                grdAccountability.DataSource = m.GetAccountability(branchId).AsDataView();
            }
            catch(SqlException err)
            {
                MessageBox.Show(err.Message, "Billing", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
    }
}
