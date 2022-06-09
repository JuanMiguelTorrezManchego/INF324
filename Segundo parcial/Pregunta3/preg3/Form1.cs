using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Collections;

namespace preg3
{
    public partial class Form1 : Form
    {
        Bitmap bmp;
        int pR, pG, pB;
        int c0 = 0;
        ArrayList v = new ArrayList();

        public Form1()
        {
            InitializeComponent();
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
            {
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
                    if (c0<5 &&(pR - 5 <= mR && mR <= pR + 5) && (pG - 5 <= mG && mG <= pG + 5) && (pB - 5 <= mB && mB <= pB + 5))
                    {
                        switch (c0)
                        {
                            case 0:
                                for (int ki = i; ki < i + 10; ki++)
                                    for (int kj = j; kj < j + 10; kj++)
                                        bmpR.SetPixel(ki, kj, Color.Chocolate);
                                c0++;
                                v.Add(i);
                                v.Add(j);
                                break;
                            case 1:
                                for (int ki = i; ki < i + 10; ki++)
                                    for (int kj = j; kj < j + 10; kj++)
                                        bmpR.SetPixel(ki, kj, Color.Fuchsia);
                                c0++;
                                v.Add(i);
                                v.Add(j);
                                break;
                            case 2:
                                for (int ki = i; ki < i + 10; ki++)
                                    for (int kj = j; kj < j + 10; kj++)
                                        bmpR.SetPixel(ki, kj, Color.Red);

                                c0++;
                                v.Add(i);
                                v.Add(j);
                                break;
                            case 3:
                                for (int ki = i; ki < i + 10; ki++)
                                    for (int kj = j; kj < j + 10; kj++)
                                        bmpR.SetPixel(ki, kj, Color.Yellow);
                                c0++;
                                v.Add(i);
                                v.Add(j);
                                break;
                            case 4:
                                for (int ki = i; ki < i + 10; ki++)
                                    for (int kj = j; kj < j + 10; kj++)
                                        bmpR.SetPixel(ki, kj, Color.BlueViolet);
                                c0++;
                                v.Add(i);
                                v.Add(j);
                                break;
                            default:
                                break;

                        }

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

            }
            pictureBox2.Image = bmpR;
            c0 = 1;
            String cad="Posiciones {\n";
            for (int i = 0; i < v.Count - 2; i += 2)
            {
                cad += " " + c0 + " , [ " + v[i] + " , " + v[i + 1] + " ] ,\n";
                c0++;
            }
            c0 = 0;
            cad += "}";
            label4.Text = cad;
            v.Clear();
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

        

        
    }
}
