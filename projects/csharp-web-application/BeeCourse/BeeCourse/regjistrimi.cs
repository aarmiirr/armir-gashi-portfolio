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
    public partial class regjistrimi : Form
    {
        public regjistrimi()
        {
            InitializeComponent();
        }

        private void comboBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

       

        private void regjistrimibutton_Click(object sender, EventArgs e)
        {
            string email = regjemailbox.Text.Trim();
            string fjalekalimi = regjfjalekalimibox.Text.Trim();
            string emri = regjemribox.Text.Trim();
            string mbiemri = regjmbiemribox.Text.Trim();
            string id = regjidbox.Text.Trim();

            if (string.IsNullOrEmpty(id) || string.IsNullOrEmpty(email) || string.IsNullOrEmpty(emri) ||
                string.IsNullOrEmpty(mbiemri) || string.IsNullOrEmpty(fjalekalimi))
            {
                MessageBox.Show("Ju lutem plotësoni të gjitha fushat.");
                return;
            }

            if (!email.Contains("@") || !email.Contains("."))
            {
                MessageBox.Show("Emaili nuk është i vlefshëm. Ju lutem shkruani një email të saktë.");
                return;
            }
            if (regjfjalekalimibox.Text != regjfjalekalimi2box.Text)
            {
                MessageBox.Show("Fjalëkalimet nuk përputhen.");
                return;
            }
            if (string.IsNullOrEmpty(regjshteticombobox.Text) || regjshteticombobox.SelectedIndex == -1)
            {
                MessageBox.Show("Ju lutem zgjidhni një shtet.");
                return;
            }
            string gjinia = "";
            if (regjistrimiradiobtn1.Checked)
                gjinia = "Mashkull";
            else if (regjistrimiradiobtn2.Checked)
                gjinia = "Femer";
            else
            {
                MessageBox.Show("Ju lutem zgjidhni gjininë.");
                return;
            }
            SqlConnection con = new SqlConnection(@"Data Source = AARMIIRR; Initial Catalog = BeeCourseDB; Integrated Security = true");
            SqlCommand cmd = new SqlCommand(@"INSERT INTO [dbo].[BeeCourseperdoruesit]
           ([id]
           ,[email]
           ,[emri]
           ,[mbiemri]
           ,[fjalekalimi]
           ,[shteti]
           ,[gjinia]
           ,[kategoria])
     VALUES
('" + regjidbox.Text + "','" + regjemailbox.Text + "','" + regjemribox.Text + "','" + regjmbiemribox.Text + "','" + regjfjalekalimibox.Text + "','" + regjshteticombobox.Text + "','" + regjgjiniacombobox.Text + "','" + regjkategoriacombobox.Text + "')", con);
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
            MessageBox.Show("Urime,ju u regjistruat me sukses!");

            this.Hide();
            var dritarjaere = new Kyqja();
            dritarjaere.Show();
        }

        private void regjistrimikyqu_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            this.Hide();
            var dritarjaere = new Kyqja();
            dritarjaere.Show();
        }
    }
}
