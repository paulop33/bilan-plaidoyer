<?php

namespace App\Model;

class BilanReVECity
{
    const VILLE = "Ville";
    const CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEATTENDUE = "Correspondance du ReVE avec le plaidoyer Vélo-Citéattendue";
    const CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITENOMBRE_DE_LIGNE_ITINERAIRE_CORRESPONDANT_AUX_ATTENTES = "Correspondance du ReVE avec le plaidoyer Vélo-Citénombre de ligne (itinéraire correspondant aux attentes)";
    const CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEDESSERTE_POINTS_DINTERET_MAJEUR_GARE_ETC = "Correspondance du ReVE avec le plaidoyer Vélo-Citédesserte points d'intérêt majeur (gare, etc)";
    const CORRESPONDANCE_DU_REVE_AVEC_LE_PLAIDOYER_VELO_CITEDESSERTE_CENTRE_VILLE = "Correspondance du ReVE avec le plaidoyer Vélo-Citédesserte centre-ville";
    const NOTE_PROJET_REVE = 'Note\nprojet\nReVE';
    const ACTIONS_POUR_LA_CONSTRUCTION_DU_REVEALETUDE = "Actions pour la construction du ReVEà l'étude";
    const ACTIONS_POUR_LA_CONSTRUCTION_DU_REVEENTIEREMENTALETUDE = "Actions pour la construction du ReVEentierement à l'étude";
    const ACTIONS_POUR_LA_CONSTRUCTION_DU_REVECOMMENCEE = "Actions pour la construction du ReVEcommencée";
    const ACTIONS_POUR_LA_CONSTRUCTION_DU_REVETERMINEE = "Actions pour la construction du ReVEterminée";
    const NOTE_REALISATION_REVE = "Note réalisation ReVE";
    const NOTE_GLOBALE_REVE = "Note globale ReVE";

    public function __construct(
        public string $nombreDeLigneCorrespondant,
        public bool $dessertePointsInteretMajeur,
        public bool $desserteCentreVille,
        public bool $constructionALEtude,
        public bool $constructionEntierementALEtude,
        public bool $constructionCommencee,
        public bool $constructionTerminee,
        public float $noteGlobalReVE,
        public ?float $noteProjetReve = null,
        public ?float $noteRealisationReVE = null,
    )
    {
    }
}