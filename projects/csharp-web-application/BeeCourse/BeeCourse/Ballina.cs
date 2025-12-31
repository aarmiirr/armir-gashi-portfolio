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
    public partial class Ballina : Form
    {
        public Ballina()
        {
            InitializeComponent();
            labelballina.Text = GlobalData.Email;
        }


        private void ballinabutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new Ballina();
            dritarjaere.Show();
        }


        private void zhvillimpersonalbutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new zhvillimpersonal();
            dritarjaere.Show();
        }

        private void teknologjibutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new teknologji();
            dritarjaere.Show();
        }

        private void gjuhebutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new gjuhe();
            dritarjaere.Show();
        }

        private void dizajnbutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new Dizajn();
            dritarjaere.Show();
        }

        private void biznesbutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new biznes();
            dritarjaere.Show();
        }

        private void natyrebutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new natyre();
            dritarjaere.Show();
        }

        private void detajebutton_Click(object sender, EventArgs e)
        {
            this.Hide();
            var dritarjaere = new detaje();
            dritarjaere.Show();
        }

        private void dilbutton_Click(object sender, EventArgs e)
        {
            var rezultati = MessageBox.Show("A jeni i sigurt?", "VEMENDJE!", MessageBoxButtons.OKCancel);

            if (rezultati == DialogResult.OK)
            {
                Timer timer = new Timer();
                timer.Interval = 3000;
                timer.Tick += (s, args) =>
                {
                    timer.Stop();
                    this.Hide();
                    Kyqja dritarjaere = new Kyqja();
                    dritarjaere.Show();
                };
                timer.Start();
            }
        }

        private void regjistrimibutton_Click(object sender, EventArgs e)
        {
            int id;
            if (!int.TryParse(ballinaidbox.Text.Trim(), out id))
            {
                MessageBox.Show("Shkruaj një ID të vlefshme.");
                return;
            }

            if (ballinakategoriacombobox.SelectedItem == null)
            {
                MessageBox.Show("Zgjidh një kategori.");
                return;
            }

            string kategoria = ballinakategoriacombobox.SelectedItem.ToString();

           
            SqlConnection con = new SqlConnection(@"Data Source=AARMIIRR;Initial Catalog=BeeCourseDB;Integrated Security=True");

            SqlCommand checkCmd = new SqlCommand("SELECT COUNT(*) FROM BeeCourseKategorite WHERE id = @id AND Kategoria = @kategoria", con);
            checkCmd.Parameters.AddWithValue("@id", id);
            checkCmd.Parameters.AddWithValue("@kategoria", kategoria);

            SqlCommand insertCmd = new SqlCommand("INSERT INTO BeeCourseKategorite (id, Kategoria) VALUES (@id, @kategoria)", con);
            insertCmd.Parameters.AddWithValue("@id", id);
            insertCmd.Parameters.AddWithValue("@kategoria", kategoria);

            try
            {
                con.Open();

                int exists = (int)checkCmd.ExecuteScalar();
                if (exists > 0)
                {
                    MessageBox.Show("Ju jeni i regjistruar.");
                    return;
                }

                insertCmd.ExecuteNonQuery();
                MessageBox.Show("Kursi u regjistrua me sukses. Shikoni Email Per informata!");
            }
            catch (SqlException ex)
            {
                MessageBox.Show("Gabim gjatë regjistrimit: " + ex.Message);
            }
            finally
            {
                con.Close();
            }
        }

        private void regjistrimibutton2_Click(object sender, EventArgs e)
        {
            int id;
            if (!int.TryParse(ballinaidbox2.Text.Trim(), out id))
            {
                MessageBox.Show("Shkruaj një ID të vlefshme.");
                return;
            }

            if (ballinalibricombobox.SelectedItem == null)
            {
                MessageBox.Show("Zgjidh një libër.");
                return;
            }

            string EmriLibrit = ballinalibricombobox.SelectedItem.ToString();


            SqlConnection con = new SqlConnection(@"Data Source=AARMIIRR;Initial Catalog=BeeCourseDB;Integrated Security=True");
            SqlCommand cmd = new SqlCommand("INSERT INTO BeeCourseLiteratura (id, EmriLibrit) VALUES (@id, @EmriLibrit)", con);
            cmd.Parameters.AddWithValue("@id", id);
            cmd.Parameters.AddWithValue("@EmriLibrit", EmriLibrit);

            try
            {
                con.Open();
                cmd.ExecuteNonQuery();
                MessageBox.Show("Libri u regjistrua dhe u dergua ne email me sukses! ");
            }
            catch (SqlException ex)
            {
                MessageBox.Show("Gabim gjatë regjistrimit: " + ex.Message);
            }
            finally
            {
                con.Close();
            }
        }
    }
    }
