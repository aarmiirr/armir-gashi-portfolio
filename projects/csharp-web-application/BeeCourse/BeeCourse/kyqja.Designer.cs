namespace BeeCourse
{
    partial class Kyqja
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Kyqja));
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.kyqjaemail = new System.Windows.Forms.Label();
            this.kyqjafjalekalimi = new System.Windows.Forms.Label();
            this.kyqjaemailbox = new System.Windows.Forms.TextBox();
            this.kyqjafjalekalimibox = new System.Windows.Forms.TextBox();
            this.kyqjakyqubtn = new System.Windows.Forms.Button();
            this.kyqjallogari = new System.Windows.Forms.Label();
            this.kyqjaregjistrohu = new System.Windows.Forms.LinkLabel();
            this.kyqjatitulli = new System.Windows.Forms.Label();
            this.kyqjacheckBox1 = new System.Windows.Forms.CheckBox();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // pictureBox1
            // 
            this.pictureBox1.BackColor = System.Drawing.Color.Transparent;
            this.pictureBox1.BackgroundImageLayout = System.Windows.Forms.ImageLayout.None;
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(572, 131);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(89, 85);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.pictureBox1.TabIndex = 0;
            this.pictureBox1.TabStop = false;
            // 
            // kyqjaemail
            // 
            this.kyqjaemail.AutoSize = true;
            this.kyqjaemail.BackColor = System.Drawing.Color.Transparent;
            this.kyqjaemail.Font = new System.Drawing.Font("Footlight MT Light", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.kyqjaemail.Location = new System.Drawing.Point(486, 284);
            this.kyqjaemail.Name = "kyqjaemail";
            this.kyqjaemail.Size = new System.Drawing.Size(57, 20);
            this.kyqjaemail.TabIndex = 1;
            this.kyqjaemail.Text = "Email:";
            // 
            // kyqjafjalekalimi
            // 
            this.kyqjafjalekalimi.AutoSize = true;
            this.kyqjafjalekalimi.BackColor = System.Drawing.Color.Transparent;
            this.kyqjafjalekalimi.Font = new System.Drawing.Font("Footlight MT Light", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.kyqjafjalekalimi.Location = new System.Drawing.Point(486, 352);
            this.kyqjafjalekalimi.Name = "kyqjafjalekalimi";
            this.kyqjafjalekalimi.Size = new System.Drawing.Size(98, 20);
            this.kyqjafjalekalimi.TabIndex = 2;
            this.kyqjafjalekalimi.Text = "Fjalekalimi:";
            this.kyqjafjalekalimi.Click += new System.EventHandler(this.kyqjatekst2_Click);
            // 
            // kyqjaemailbox
            // 
            this.kyqjaemailbox.Font = new System.Drawing.Font("Segoe UI", 14.25F);
            this.kyqjaemailbox.Location = new System.Drawing.Point(490, 307);
            this.kyqjaemailbox.Name = "kyqjaemailbox";
            this.kyqjaemailbox.Size = new System.Drawing.Size(259, 33);
            this.kyqjaemailbox.TabIndex = 3;
            // 
            // kyqjafjalekalimibox
            // 
            this.kyqjafjalekalimibox.Font = new System.Drawing.Font("Segoe UI", 14.25F);
            this.kyqjafjalekalimibox.Location = new System.Drawing.Point(490, 375);
            this.kyqjafjalekalimibox.Name = "kyqjafjalekalimibox";
            this.kyqjafjalekalimibox.Size = new System.Drawing.Size(259, 33);
            this.kyqjafjalekalimibox.TabIndex = 4;
            this.kyqjafjalekalimibox.UseSystemPasswordChar = true;
            // 
            // kyqjakyqubtn
            // 
            this.kyqjakyqubtn.BackColor = System.Drawing.Color.Orange;
            this.kyqjakyqubtn.Font = new System.Drawing.Font("Cooper Black", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.kyqjakyqubtn.ForeColor = System.Drawing.Color.White;
            this.kyqjakyqubtn.Location = new System.Drawing.Point(489, 444);
            this.kyqjakyqubtn.Name = "kyqjakyqubtn";
            this.kyqjakyqubtn.Size = new System.Drawing.Size(260, 42);
            this.kyqjakyqubtn.TabIndex = 5;
            this.kyqjakyqubtn.Text = "Kyçu";
            this.kyqjakyqubtn.UseVisualStyleBackColor = false;
            this.kyqjakyqubtn.Click += new System.EventHandler(this.kyqjakyqubtn_Click);
            // 
            // kyqjallogari
            // 
            this.kyqjallogari.AutoSize = true;
            this.kyqjallogari.BackColor = System.Drawing.Color.Transparent;
            this.kyqjallogari.Font = new System.Drawing.Font("Footlight MT Light", 14.25F);
            this.kyqjallogari.Location = new System.Drawing.Point(485, 489);
            this.kyqjallogari.Name = "kyqjallogari";
            this.kyqjallogari.Size = new System.Drawing.Size(131, 20);
            this.kyqjallogari.TabIndex = 6;
            this.kyqjallogari.Text = "Nuk ke llogari?";
            // 
            // kyqjaregjistrohu
            // 
            this.kyqjaregjistrohu.AutoSize = true;
            this.kyqjaregjistrohu.BackColor = System.Drawing.Color.Transparent;
            this.kyqjaregjistrohu.Font = new System.Drawing.Font("Footlight MT Light", 14.25F);
            this.kyqjaregjistrohu.LinkColor = System.Drawing.Color.DarkOrange;
            this.kyqjaregjistrohu.Location = new System.Drawing.Point(644, 489);
            this.kyqjaregjistrohu.Name = "kyqjaregjistrohu";
            this.kyqjaregjistrohu.Size = new System.Drawing.Size(104, 20);
            this.kyqjaregjistrohu.TabIndex = 7;
            this.kyqjaregjistrohu.TabStop = true;
            this.kyqjaregjistrohu.Text = "Regjistrohu ";
            this.kyqjaregjistrohu.LinkClicked += new System.Windows.Forms.LinkLabelLinkClickedEventHandler(this.linkLabel1_LinkClicked);
            // 
            // kyqjatitulli
            // 
            this.kyqjatitulli.AutoSize = true;
            this.kyqjatitulli.Font = new System.Drawing.Font("Cooper Black", 36F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.kyqjatitulli.ForeColor = System.Drawing.Color.Orange;
            this.kyqjatitulli.Location = new System.Drawing.Point(480, 219);
            this.kyqjatitulli.Name = "kyqjatitulli";
            this.kyqjatitulli.Size = new System.Drawing.Size(279, 55);
            this.kyqjatitulli.TabIndex = 8;
            this.kyqjatitulli.Text = "BeeCourse";
            // 
            // kyqjacheckBox1
            // 
            this.kyqjacheckBox1.AutoSize = true;
            this.kyqjacheckBox1.Font = new System.Drawing.Font("Footlight MT Light", 14.25F);
            this.kyqjacheckBox1.Location = new System.Drawing.Point(490, 414);
            this.kyqjacheckBox1.Name = "kyqjacheckBox1";
            this.kyqjacheckBox1.Size = new System.Drawing.Size(163, 24);
            this.kyqjacheckBox1.TabIndex = 11;
            this.kyqjacheckBox1.Text = "Ruaj Fjalekalimin";
            this.kyqjacheckBox1.UseVisualStyleBackColor = true;
            // 
            // Kyqja
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(1230, 707);
            this.Controls.Add(this.kyqjacheckBox1);
            this.Controls.Add(this.kyqjatitulli);
            this.Controls.Add(this.kyqjaregjistrohu);
            this.Controls.Add(this.kyqjallogari);
            this.Controls.Add(this.kyqjakyqubtn);
            this.Controls.Add(this.kyqjafjalekalimibox);
            this.Controls.Add(this.kyqjaemailbox);
            this.Controls.Add(this.kyqjafjalekalimi);
            this.Controls.Add(this.kyqjaemail);
            this.Controls.Add(this.pictureBox1);
            this.DoubleBuffered = true;
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.Fixed3D;
            this.MaximizeBox = false;
            this.Name = "Kyqja";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "BeeCourse - Kyqja";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Label kyqjaemail;
        private System.Windows.Forms.Label kyqjafjalekalimi;
        private System.Windows.Forms.TextBox kyqjaemailbox;
        private System.Windows.Forms.TextBox kyqjafjalekalimibox;
        private System.Windows.Forms.Button kyqjakyqubtn;
        private System.Windows.Forms.Label kyqjallogari;
        private System.Windows.Forms.LinkLabel kyqjaregjistrohu;
        private System.Windows.Forms.Label kyqjatitulli;
        private System.Windows.Forms.CheckBox kyqjacheckBox1;
    }
}

