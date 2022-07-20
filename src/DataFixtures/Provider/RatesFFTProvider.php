<?php

namespace App\DataFixtures\Provider;

class RatesFFTProvider
{
    // Taleau des tarifs FFT
    private $ratesFFT = [
        [
            'code' => '1A',
            'label' => 'Jeune Nouveau',
            'entryFee' => 35,
            'cotisation' => 49,
            'licence' => 50,
            'amount' =>134
        ],
        [
            'code' => '1B',
            'label' => 'Jeune Renouvellement',
            'entryFee' => 0,
            'cotisation' => 49,
            'licence' => 50,
            'amount' =>99
        ],
        [
            'code' => '1C',
            'label' => 'Jeune 2 Club Nouveau',
            'entryFee' => 35,
            'cotisation' => 49,
            'licence' => 0,
            'amount' =>84
        ],
        [
            'code' => '1D',
            'label' => 'Jeune 2 Club Renouvellement',
            'entryFee' => 0,
            'cotisation' => 49,
            'licence' => 0,
            'amount' =>49
        ],
        [
            'code' => '1E',
            'label' => 'Jeune Expert',
            'entryFee' => 0,
            'cotisation' => 36,
            'licence' => 50,
            'amount' =>86
        ],
        [
            'code' => '1F',
            'label' => 'Jeune Maître',
            'entryFee' => 0,
            'cotisation' => 24,
            'licence' => 50,
            'amount' => 74
        ],
        [
            'code' => '1I',
            'label' => 'Podium Championnat de France',
            'entryFee' => 0,
            'cotisation' => 6,
            'licence' => 50,
            'amount' => 56
        ],
        [
            'code' => '2G',
            'label' => 'Spécial - 25 Ans',
            'entryFee' => 35,
            'cotisation' => 129,
            'licence' => 80,
            'amount' => 244
        ],
        [
            'code' => '3A',
            'label' => 'Senior Nouveau',
            'entryFee' => 100,
            'cotisation' => 129,
            'licence' => 80,
            'amount' => 309
        ],
        [
            'code' => '3B',
            'label' => 'Senior Renouvellement',
            'entryFee' => 0,
            'cotisation' => 129,
            'licence' => 80,
            'amount' => 209
        ],
        [
            'code' => '3C',
            'label' => 'Senior 2 Club Nouveau',
            'entryFee' => 100,
            'cotisation' => 129,
            'licence' => 0,
            'amount' => 229
        ],
        [
            'code' => '3D',
            'label' => 'Senior 2 Club Renouvellement',
            'entryFee' => 0,
            'cotisation' => 129,
            'licence' => 0,
            'amount' => 129
        ],
        [
            'code' => '3E',
            'label' => 'Senior Expert',
            'entryFee' => 0,
            'cotisation' => 96,
            'licence' => 80,
            'amount' => 176
        ],
        [
            'code' => '3F',
            'label' => 'Senior Maître',
            'entryFee' => 0,
            'cotisation' => 64,
            'licence' => 80,
            'amount' => 144
        ],
        [
            'code' => '3G',
            'label' => 'Conseil + Controleur au compte',
            'entryFee' => 0,
            'cotisation' => 64,
            'licence' => 80,
            'amount' => 144
        ],
        [
            'code' => '3H',
            'label' => 'License Seule',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 80,
            'amount' => 80
        ],
        [
            'code' => '3I',
            'label' => 'Podium Championnat de France',
            'entryFee' => 0,
            'cotisation' => 21,
            'licence' => 80,
            'amount' => 101
        ],
        [
            'code' => 'GR',
            'label' => 'Gratuit / Membres d\'honneurs',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 0,
            'amount' => 0
        ],
        [
            'code' => 'CA',
            'label' => 'Caisson',
            'entryFee' => 0,
            'cotisation' => 46,
            'licence' => 0,
            'amount' => 46
        ],
        [
            'code' => 'CA',
            'label' => 'Caisson',
            'entryFee' => 0,
            'cotisation' => 46,
            'licence' => 0,
            'amount' => 46
        ],
        [
            'code' => 'CA',
            'label' => 'Caisson',
            'entryFee' => 0,
            'cotisation' => 46,
            'licence' => 0,
            'amount' => 46
        ],
        [
            'code' => 'CA',
            'label' => 'Caisson',
            'entryFee' => 0,
            'cotisation' => 46,
            'licence' => 0,
            'amount' => 46
        ],
        [
            'code' => 'CA',
            'label' => 'Caisson',
            'entryFee' => 0,
            'cotisation' => 46,
            'licence' => 0,
            'amount' => 46
        ],
    ];
            
    /**
     * 
     */
    public function getRates()
    {
        return $this->ratesFFT;
    }
}
