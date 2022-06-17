using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data;
using System.Data.SqlClient;

namespace WindowsFormsApplication3
{
    public partial class Form1 : Form
    {
        Bitmap bmp;
        int pR, pG, pB;
        String cadCon = "Data Source=DESKTOP-4HGHNHI; Initial Catalog=sistema; Integrated Security=True";
        ArrayList v = new ArrayList();

        public Form1()
        {
            InitializeComponent();
            cargarImagen(cbImg);
        }


        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            Color c = new Color();
            pR = 0;
            pG = 0;
            pB = 0;
            for (int ki = e.X; ki < e.X + 10; ki++)
                for (int kj = e.Y; kj < e.Y + 10; kj++)
                {
                    c = bmp.GetPixel(ki, kj);
                    pR = pR + c.R;
                    pG = pG + c.G;
                    pB = pB + c.B;
                }
            pR = pR / 100;
            pG = pG / 100;
            pB = pB / 100;
            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();
            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.Filter = "Todos *.*|";
            openFileDialog1.ShowDialog();
            bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            int mR = 0, mG = 0, mB = 0;
            Color c = new Color();
            Bitmap bmpR = new Bitmap(bmp.Width, bmp.Height);
            for (int i = 0; i < bmp.Width - 10; i = i + 10)
                for (int j = 0; j < bmp.Height - 10; j = j + 10)
                {
                    mR = 0;
                    mG = 0;
                    mB = 0;
                    for (int ki = i; ki < i + 10; ki++)
                        for (int kj = j; kj < j + 10; kj++)
                        {
                            c = bmp.GetPixel(ki, kj);
                            mR = mR + c.R;
                            mG = mG + c.G;
                            mB = mB + c.B;
                        }
                    mR = mR / 100;
                    mG = mG / 100;
                    mB = mB / 100;

                    c = bmp.GetPixel(i, j);
                    if ((pR - 20 <= mR && mR <= pR + 20) && (pG - 20 <= mG && mG <= pG + 20) && (pB - 20 <= mB && mB <= pB + 20))
                    {
                        for (int ki = i; ki < i + 10; ki++)
                            for (int kj = j; kj < j + 10; kj++)
                                bmpR.SetPixel(ki, kj, Color.Fuchsia);
                    }
                    else
                    {
                        for (int ki = i; ki < i + 10; ki++)
                            for (int kj = j; kj < j + 10; kj++)
                            {
                                c = bmp.GetPixel(ki, kj);
                                bmpR.SetPixel(ki, kj, Color.FromArgb(c.R, c.G, c.B));
                            }

                    }
                }
      
            pictureBox2.Image = bmpR;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            if (textBox4.Text != "")
            {
                byte[] v = ImageToByte(pictureBox2.Image);
                string imgdataURL64 = "data:image/jpg;base64" + Convert.ToBase64String(v);

                //DB
                SqlConnection con = new SqlConnection(cadCon);
                SqlCommand cmd = new SqlCommand();
                cmd.CommandText = "insert into T_textura (titulo, image, pR, pG, pB) values (@titulo, @image, @pR, @pG, @pB)";
                cmd.Parameters.Add("@titulo", SqlDbType.Text).Value = textBox4.Text;
                cmd.Parameters.Add("@image", SqlDbType.Image).Value = v;
                cmd.Parameters.Add("@pR", SqlDbType.Int).Value = pR;
                cmd.Parameters.Add("@pG", SqlDbType.Int).Value = pG;
                cmd.Parameters.Add("@pB", SqlDbType.Int).Value = pB;

                cmd.CommandType = CommandType.Text;
                cmd.Connection = con;
                con.Open();
                cmd.ExecuteNonQuery();

                string msg = "Imagen Guardada";
                MessageBox.Show(msg, "Guardar");
                cargarImagen(cbImg);
            }
            else
            {
                string msg = "Se necesita el campo titulo";
                MessageBox.Show(msg, "ERROR");
            }

                

        }

        public static byte[] ImageToByte(Image img)
        {
            ImageConverter converter = new ImageConverter();
            return (byte[])converter.ConvertTo(img, typeof(byte[]));
        }

        public void cargarImagen(ComboBox cbImg)
        {
            cbImg.Items.Clear();
            SqlConnection con = new SqlConnection(cadCon);
            SqlCommand cmd = new SqlCommand("select titulo from T_textura",con);
            con.Open();
            SqlDataReader datos = cmd.ExecuteReader();
            while (datos.Read())
            {
                cbImg.Items.Add(datos["titulo"]);
            }
            datos.Close();
        }

        private void cbImg_SelectedIndexChanged(object sender, EventArgs e)
        {
            verImg(pictureBox2, cbImg.SelectedItem.ToString());
        }

        public void verImg(PictureBox pb, string titulo) 
        {
            SqlConnection con = new SqlConnection(cadCon);
            SqlDataAdapter da = new SqlDataAdapter("select image, pR, pG, pB from T_textura where titulo = '" + titulo + "'", con);
            DataSet ds = new DataSet();
            DataRow dr;
            da.Fill(ds, "image");
            byte[] datos = new byte[0];
            dr = ds.Tables["image"].Rows[0];
            datos = (byte[])dr["image"];
            System.IO.MemoryStream ms = new System.IO.MemoryStream(datos);
            pictureBox2.Image = System.Drawing.Bitmap.FromStream(ms);
            da.Fill(ds, "pR");
            dr = ds.Tables["pR"].Rows[0];
            textBox1.Text = dr["pR"].ToString();
            da.Fill(ds, "pG");
            dr = ds.Tables["pG"].Rows[0];
            textBox2.Text = dr["pG"].ToString();
            da.Fill(ds, "pB");
            dr = ds.Tables["pB"].Rows[0];
            textBox3.Text = dr["pB"].ToString();
            
        }
    }
}
