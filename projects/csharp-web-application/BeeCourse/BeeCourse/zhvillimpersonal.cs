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
    public partial class zhvillimpersonal : Form
    {
        public zhvillimpersonal()
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
    }
}
