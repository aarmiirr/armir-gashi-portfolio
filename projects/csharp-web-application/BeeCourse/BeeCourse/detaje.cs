using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace BeeCourse
{
    public partial class detaje : Form
    {
        DataTable table = new DataTable("table");
        int index;
        public detaje()
        {
            InitializeComponent();
        }
        private void detaje_load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'beeCourseDBDataSet3.BeeCourseKomentet' table. You can move, or remove it, as needed.
            this.beeCourseKomentetTableAdapter.Fill(this.beeCourseDBDataSet3.BeeCourseKomentet);
            table.Columns.Add("id", Type.GetType("System.Int32"));
            table.Columns.Add("Komenti", Type.GetType("System.String"));
            dataGridView1.DataSource = table;
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

        private void detaje_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'beeCourseDBDataSet2.BeeCourseperdoruesit' table. You can move, or remove it, as needed.
            this.beeCourseperdoruesitTableAdapter.Fill(this.beeCourseDBDataSet2.BeeCourseperdoruesit);

        }

        private void button1_Click(object sender, EventArgs e)
        {
            table.Rows.Add(textBox1.Text,textBox2.Text);
        }

        private void button2_Click(object sender, EventArgs e)
        {
            textBox1.Text = String.Empty;
            textBox2.Text = String.Empty;
        }

        private void dataGrudView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            index = e.RowIndex;
            DataGridViewRow row = dataGridView1.Rows[index];
            textBox1.Text = row.Cells[0].Value.ToString();
            textBox2.Text = row.Cells[1].Value.ToString();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            DataGridViewRow newdata = dataGridView1.Rows[index];
            newdata.Cells[0].Value = textBox1.Text;
            newdata.Cells[1].Value = textBox1.Text;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            index = dataGridView1.CurrentCell.RowIndex;
            dataGridView1.Rows.RemoveAt(index);
        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            table.Rows.Add(textBox1.Text, textBox2.Text);
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            textBox1.Text = String.Empty;
            textBox2.Text = String.Empty;
        }

        private void button3_Click_1(object sender, EventArgs e)
        {
            DataGridViewRow newdata = dataGridView1.Rows[index];
            newdata.Cells[0].Value = textBox1.Text;
            newdata.Cells[1].Value = textBox1.Text;
        }

        private void button4_Click_1(object sender, EventArgs e)
        {
            index = dataGridView1.CurrentCell.RowIndex;
            dataGridView1.Rows.RemoveAt(index);
        }
    }
}
