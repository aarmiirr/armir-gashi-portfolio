using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;


namespace BeeCourse
{
    public partial class Kyqja : Form
    {
        public Kyqja()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            kyqjaemailbox.Text = Properties.Settings.Default.SavedEmail;
            kyqjafjalekalimibox.Text = Properties.Settings.Default.SavedPassword;

            // Nëse ka password të ruajtur, bëj checkbox-in të checked automatikisht
            if (!string.IsNullOrEmpty(Properties.Settings.Default.SavedPassword))
            {
                kyqjacheckBox1.Checked = true;
            }
        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            this.Hide();
            var dritarjaere = new regjistrimi();
            dritarjaere.Show();
        }

        private void kyqjatekst2_Click(object sender, EventArgs e)
        {

        }

        private void kyqjakyqubtn_Click(object sender, EventArgs e)
        {
            string email = kyqjaemailbox.Text.Trim();
            string fjalekalimi = kyqjafjalekalimibox.Text.Trim();

            if (email == "" || fjalekalimi == "")
            {
                MessageBox.Show("Ju lutem plotësoni të gjitha fushat.");
                return;
            }

            /* lidhja eshte bere ne kete menyre per tu mbrojtur nga SQL Injection si krim kibernetik*/
            SqlConnection con = new SqlConnection(@"Data Source=AARMIIRR;Initial Catalog=BeeCourseDB;Integrated Security=True");
            SqlCommand cmd = new SqlCommand("SELECT COUNT(*) FROM BeeCourseperdoruesit WHERE email = @email AND fjalekalimi = @fjalekalimi", con);
            cmd.Parameters.AddWithValue("@email", email);
            cmd.Parameters.AddWithValue("@fjalekalimi", fjalekalimi);

            con.Open();
            int count = (int)cmd.ExecuteScalar();
            con.Close();

            if (count == 1)
            {
                MessageBox.Show("Kyqja u krye me sukses!");
                if (kyqjacheckBox1.Checked)
                {
                    Properties.Settings.Default.SavedEmail = kyqjaemailbox.Text;
                    Properties.Settings.Default.SavedPassword = kyqjafjalekalimibox.Text;
                    Properties.Settings.Default.Save();
                }
                else
                {
                   
                    Properties.Settings.Default.SavedEmail = "";
                    Properties.Settings.Default.SavedPassword = "";
                    Properties.Settings.Default.Save();
                }

                this.Hide();
                var dritarjaere = new Ballina();
                dritarjaere.Show();
                GlobalData.Email = email;
            }
            else
            {
                MessageBox.Show("Email ose fjalëkalim i pasaktë.");
            }
        }
    }
}
 