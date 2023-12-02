<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Action extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_action',
        'devise',
        'prix_unitaire_achat',
        'prix_unitaire_vente',
        'frais',
        'quantite',
        'date_vente',
    ];

    /**
     * Calculer le pourcentage de gain ou de perte pour une vente d'action
     *
     * @return float
     */
    public function calculerPourcentage()
    {

        $cout_total_achat = $this->prix_unitaire_achat * $this->quantite + $this->frais;

        if ($cout_total_achat == 0) {
            return 0;
        }

        $total_vente = $this->prix_unitaire_vente * $this->quantite;

        $pl = $total_vente - $cout_total_achat;

        return ($pl / $cout_total_achat) * 100;
    }
}
