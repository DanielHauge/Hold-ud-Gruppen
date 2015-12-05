using System;
using System.Threading;

public class Radiator
{
    public double Temperatur { get; }
    public double pris { get; }

    private double _Temperatur = 20;
    private double _pris = 0;
    private double _Delta = 0;
    private int TændStyrke = 3;
    private bool angiv = false;
    private double angivnetemp = 0;
    private bool online; // er radiatoren online 
    private bool standby; // hvis radiator er på standby, bruger denne lavere watt for at holde temperaturen
    private int SecondsOnline;
    private double hoursOnline; // antal timer radiatoren er tændt
    private double pricePrKwh = 1.87; //prisen pr. Kwh
    private double pricePaid = 1; // pris betalt for session (hoursOnline * 
    private double Kwh; // kwh = watt/1000 * hour
    private Timer timer;

	public Radiator()
	{
        Temperatur = _Temperatur;
        pricePaid = hoursOnline * (pricePrKwh * Kwh);
        _pris = pricePaid;
        pris = _pris;
        timer = new System.Threading.Timer((e) =>
        CallBackMethod(), null, 0, 1000*10);
    }

    private void CallBackMethod()
    {
            timer.Change(1000*1, Timeout.Infinite);
            roomrandomness();
            ændretemperatur();
            kwhMethod();
        if (angiv)
        {
            AngivÆndreStyrke(_Temperatur, angivnetemp);
        }
            
    }

    private int AngivÆndreStyrke(double Temp, double angiv)
    {
        int returning = 0;
        if (!(Temp > angiv))
        {
            if (angiv < 18)
            {
                returning = 0;
            } else if (angiv < 20)
            {
                returning = 1;
            }
            else if (angiv < 22)
            {
                returning = 2;
            }
            else if (angiv < 24)
            {
                returning = 3;
            }
            else if (angiv < 26)
            {
                returning = 4;
            }
            else if (angiv < 28)
            {
                returning = 5;
            }
            
        }

        return returning;
    }
    public void Tænd(int a)
    {
        TændStyrke = a;

    }
    public void Angiv(double angivstyrke)
    {
        angiv = true;
        angivnetemp = angivstyrke;
    }
    public void kwhMethod()
    {
        if (online)
        {
            SecondsOnline = SecondsOnline + 5;
        }
        if (SecondsOnline > 3599)
        {
            SecondsOnline = 0;
            hoursOnline++;
        }
    }
    public void ændretemperatur()
    {
        double ændring = 0;
        double styrke = 0;
        switch (TændStyrke)
        {
            case 0:
                styrke = 0;
                online = false;
                break;
            case 1:
                if (_Temperatur < 18)
                {
                    online = true;
                    styrke = 0.1;
                }
                else
                {
                    online = false;
                }
                break;
            case 2:
                if (_Temperatur < 20)
                {
                    styrke = 0.2;
                    online = true;
                }
                else
                {
                    online = false;
                }
                break;
            case 3:
                if (_Temperatur < 22)
                {
                    online = true;
                    styrke = 0.3;
                }
                else
                {
                    online = false;
                }
                break;
            case 4:
                if (_Temperatur < 24)
                {
                    online = true;
                    styrke = 0.4;
                }
                else
                {
                    online = false;
                }
                break;
            case 5:
                if (_Temperatur < 26)
                {
                    online = true;
                    styrke = 0.5;
                }
                else
                {
                    online = false;
                }
                break;
            default:
                styrke = 0;
                online = false;
                break;
        }


        ændring = _Delta + styrke;

        _Temperatur = _Temperatur + ændring;
    }

    public void roomrandomness()
    {
        if (_Delta > 0)
        {
            _Delta = _Delta - 0.01;
        }
        else
        {
            _Delta = _Delta + 0.01;
        }
        Random random = new Random();
        int randomNumber = random.Next(0, 100);
        if (randomNumber > 85)
        {
            if (_Delta < 1 && _Delta > -1)
            {
                int Randomness = random.Next(-20, 15);
                double r = Convert.ToDouble(Randomness) / 1000; _Delta = _Delta + r;
                
            }
            else if (_Delta < -1)
            {
                int Randomness = random.Next(10, 20);
                double r = Convert.ToDouble(Randomness) / 1000;
                _Delta = _Delta + r; 
                
            }
            else if (_Delta > 1)
            {

                int Randomness = random.Next(-40, -10);
                double r = Randomness / 1000;
                _Delta = _Delta + r;
            }
        }
    }

}
