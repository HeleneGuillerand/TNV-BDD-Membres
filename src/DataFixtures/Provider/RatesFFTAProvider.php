<?php

namespace App\DataFixtures\Provider;

class RatesFFTAProvider
{
    // Taleau des tarifs FFT
    private $ratesFFTA = [
        [
            'code' => '1A',
            'label' => 'Jeune Nouveau',
            'entryFee' => 35,
            'cotisation' => 97,
            'licence' => 52.75,
            'amount' => 184
        ],
        [
            'code' => '1A2',
            'label' => 'Jeune Nouveau 2eme Club',
            'entryFee' => 35,
            'cotisation' => 97,
            'licence' => 0,
            'amount' => 132
        ],
        [
            'code' => '1B',
            'label' => 'Jeune Renouvellement',
            'entryFee' => 0,
            'cotisation' => 97,
            'licence' => 52.75,
            'amount' => 149.75
        ],
        [
            'code' => '1B2',
            'label' => 'Jeune Renouvellement 2eme Club',
            'entryFee' => 0,
            'cotisation' => 97,
            'licence' => 0,
            'amount' => 97
        ],
        [
            'code' => '1E',
            'label' => 'Jeune Expert (RGX)',
            'entryFee' => 0,
            'cotisation' => 72,
            'licence' => 52.75,
            'amount' => 124.75
        ],
        [
            'code' => '1E2',
            'label' => 'Jeune Expert (RGX) 2eme Club',
            'entryFee' => 0,
            'cotisation' => 72,
            'licence' => 0,
            'amount' => 72
        ],
        [
            'code' => '1F',
            'label' => 'Jeune Maître (CHPT France)',
            'entryFee' => 0,
            'cotisation' => 47,
            'licence' => 52.75,
            'amount' => 99.75
        ],
        [
            'code' => '1F2',
            'label' => 'Jeune Maître (CHPT France) 2eme Club',
            'entryFee' => 0,
            'cotisation' => 47,
            'licence' => 0,
            'amount' => 47
        ],
        [
            'code' => '1I',
            'label' => 'Jeune Podium Individuel France',
            'entryFee' => 0,
            'cotisation' => 12,
            'licence' => 52.75,
            'amount' => 64.75
        ],
        [
            'code' => '1I2',
            'label' => 'Jeune Podium Individuel France 2eme Club',
            'entryFee' => 0,
            'cotisation' => 12,
            'licence' => 0,
            'amount' => 12
        ],
        [
            'code' => '2L',
            'label' => 'Spécial - 25 Ans CLUB',
            'entryFee' => 35,
            'cotisation' => 207,
            'licence' => 64.75,
            'amount' => 306.75
        ],
        [
            'code' => '2C',
            'label' => 'Spécial - 25 Ans COMPETITION',
            'entryFee' => 35,
            'cotisation' => 207,
            'licence' => 77.75,
            'amount' => 319.75
        ],
        [
            'code' => '2C2',
            'label' => 'Spécial - 25 Ans 2eme Club',
            'entryFee' => 35,
            'cotisation' => 207,
            'licence' => 0,
            'amount' => 242
        ],
        [
            'code' => '3L',
            'label' => 'Senior Nouveau CLUB',
            'entryFee' => 100,
            'cotisation' => 207,
            'licence' => 64.75,
            'amount' => 371.75
        ],
        [
            'code' => '3C',
            'label' => 'Senior Nouveau COMPETITION',
            'entryFee' => 100,
            'cotisation' => 207,
            'licence' => 77.75,
            'amount' => 384.75
        ],
        [
            'code' => '3C2',
            'label' => 'Senior Nouveau 2eme Club',
            'entryFee' => 100,
            'cotisation' => 207,
            'licence' => 0,
            'amount' => 307
        ],
        [
            'code' => 'BL',
            'label' => 'Senior Renouvellement CLUB',
            'entryFee' => 0,
            'cotisation' => 207,
            'licence' => 64.75,
            'amount' => 271.75
        ],
        [
            'code' => 'BC',
            'label' => 'Senior Renouvellement COMPETITION',
            'entryFee' => 0,
            'cotisation' => 207,
            'licence' => 77.75,
            'amount' => 284.75
        ],
        [
            'code' => 'B2',
            'label' => 'Senior Renouvellement 2eme Club',
            'entryFee' => 0,
            'cotisation' => 207,
            'licence' => 0,
            'amount' => 207
        ],
        [
            'code' => 'EC',
            'label' => 'Senior Expert (RGX)',
            'entryFee' => 0,
            'cotisation' => 142,
            'licence' => 77.75,
            'amount' => 219.75
        ],
        [
            'code' => 'EC2',
            'label' => 'Senior Expert (RGX) 2eme Club',
            'entryFee' => 0,
            'cotisation' => 142,
            'licence' => 0,
            'amount' => 142
        ],
        [
            'code' => 'FC',
            'label' => 'Senior Maître (CHPT France)',
            'entryFee' => 0,
            'cotisation' => 77,
            'licence' => 77.75,
            'amount' => 154.75
        ],
        [
            'code' => 'FC2',
            'label' => 'Senior Maître (CHPT France) 2eme Club',
            'entryFee' => 0,
            'cotisation' => 77,
            'licence' => 0,
            'amount' => 77
        ],
        [
            'code' => 'IC',
            'label' => 'Senior Podium Individuel France & Moniteur',
            'entryFee' => 0,
            'cotisation' => 42,
            'licence' => 77.75,
            'amount' => 119.75
        ],
        [
            'code' => 'IC2',
            'label' => 'Senior Podium Individuel France & Moniteur 2eme Club',
            'entryFee' => 0,
            'cotisation' => 42,
            'licence' => 0,
            'amount' => 42
        ],
        [
            'code' => 'TL',
            'label' => 'Senior Renouvellement TNV CLUB',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 64.75,
            'amount' => 64.75
        ],
        [
            'code' => 'TC',
            'label' => 'Senior Renouvellement TNV COMPETITION',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 77.75,
            'amount' => 77.75
        ],
        [
            'code' => 'TE',
            'label' => 'Senior Expert TNV (RGX)',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 77.75,
            'amount' => 77.75
        ],
        [
            'code' => 'TF',
            'label' => 'Senior Maître TNV (CHPT France)',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 77.75,
            'amount' => 77.75
        ],
        [
            'code' => 'T2',
            'label' => 'Senior TNV 2eme Club',
            'entryFee' => 0,
            'cotisation' => 0,
            'licence' => 0,
            'amount' => 0
        ],
        [
            'code' => 'TNVCA',
            'label' => 'Conseil d\'Administration TNV',
            'entryFee' => 0,
            'cotisation' => 64,
            'licence' => 80,
            'amount' => 144
        ],
        [
            'code' => 'ZKT',
            'label' => 'Kit',
            'entryFee' => 0,
            'cotisation' => 65,
            'licence' => 0,
            'amount' => 65
        ],
        [
            'code' => 'ZAS',
            'label' => 'Assurance',
            'entryFee' => 0,
            'cotisation' => 0.25,
            'licence' => 0,
            'amount' => 0.25
        ],
        
    ];
            
    /**
     * 
     */
    public function getRates()
    {
        return $this->ratesFFTA;
    }
}
