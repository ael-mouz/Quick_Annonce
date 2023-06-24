<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Appartements',
                'description' => 'Appartements à vendre ou à louer',
            ],
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Maisons',
                'description' => 'Maisons à vendre ou à louer',
            ],
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Terrains',
                'description' => 'Terrains à vendre',
            ],
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Bureaux et locaux commerciaux',
                'description' => 'Bureaux et locaux commerciaux à vendre ou à louer',
            ],
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Colocations',
                'description' => 'Colocations à vendre ou à louer',
            ],
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Locations de vacances',
                'description' => 'Locations de vacances à vendre ou à louer',
            ],
            [
                'cat' => 'immobilier',
                'sub_cat' => 'Autres',
                'description' => 'Autres biens immobiliers à vendre ou à louer',
            ],
            /*************************************** */
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Téléphones',
                'description' => 'Téléphones portables, smartphones et accessoires',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Tablettes',
                'description' => 'Tablettes et accessoires',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Ordinateurs',
                'description' => 'Ordinateurs, ordinateurs portables et accessoires',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'TV et vidéo',
                'description' => 'TV, vidéo et accessoires',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Jeux vidéo et consoles',
                'description' => 'Jeux vidéo, consoles et accessoires',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Appareils photo et caméras',
                'description' => 'Appareils photo et caméras',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Audio et vidéo',
                'description' => 'Audio et vidéo',
            ],
            [
                'cat' => 'multimidia',
                'sub_cat' => 'Autres',
                'description' => 'Autres appareils multimédia',
            ],
            /***************************************************/
            [
                'cat' => 'maison',
                'sub_cat' => 'Meubles',
                'description' => 'Meubles pour la maison',
            ],
            [
                'cat' => 'maison',
                'sub_cat' => 'Electroménager',
                'description' => 'Appareils électroménagers pour la maison',
            ],
            [
                'cat' => 'maison',
                'sub_cat' => 'Décoration',
                'description' => 'Articles de décoration pour la maison',
            ],
            [
                'cat' => 'maison',
                'sub_cat' => 'Jardinage',
                'description' => 'Outils et équipements de jardinage',
            ],
            [
                'cat' => 'maison',
                'sub_cat' => 'Bricolage',
                'description' => 'Outils et équipements de bricolage',
            ],
            [
                'cat' => 'maison',
                'sub_cat' => 'Autres',
                'description' => 'Autres articles pour la maison',
            ],
            /*************************************************** */
            [
                'cat' => 'vehicules',
                'sub_cat' => 'Voitures',
                'description' => 'Voitures neuves et d\'occasion',
            ],
            [
                'cat' => 'vehicules',
                'sub_cat' => 'Motos',
                'description' => 'Motos neuves et d\'occasion',
            ],
            [
                'cat' => 'vehicules',
                'sub_cat' => 'Camions',
                'description' => 'Camions neufs et d\'occasion',
            ],
            [
                'cat' => 'vehicules',
                'sub_cat' => 'Bateaux',
                'description' => 'Bateaux neufs et d\'occasion',
            ],
            [
                'cat' => 'vehicules',
                'sub_cat' => 'Pièces et accessoires',
                'description' => 'Pièces et accessoires pour véhicules',
            ],
            [
                'cat' => 'vehicules',
                'sub_cat' => 'Autres',
                'description' => 'Autres véhicules',
            ],
            /*************************************************************** */
            [
                'cat' => 'emploi & services',
                'sub_cat' => 'Offres d\'emploi',
                'description' => 'Offres d\'emploi dans divers secteurs',
            ],
            [
                'cat' => 'emploi & services',
                'sub_cat' => 'Demandes d\'emploi',
                'description' => 'Demandes d\'emploi dans divers secteurs',
            ],
            [
                'cat' => 'emploi & services',
                'sub_cat' => 'Services',
                'description' => 'Services dans divers secteurs',
            ],
            [
                'cat' => 'emploi & services',
                'sub_cat' => 'Cours',
                'description' => 'Cours dans divers secteurs',
            ],
            [
                'cat' => 'emploi & services',
                'sub_cat' => 'Stages',
                'description' => 'Stages dans divers secteurs',
            ],
            [
                'cat' => 'emploi & services',
                'sub_cat' => 'Autres',
                'description' => 'Autres offres et demandes d\'emploi',
            ],
            /************************************************************** */
            [
                'cat' => 'objects personnels',
                'sub_cat' => 'Vêtements',
                'description' => 'Vêtements pour hommes, femmes et enfants',
            ],
            [
                'cat' => 'objects personnels',
                'sub_cat' => 'Chaussures',
                'description' => 'Chaussures pour hommes, femmes et enfants',
            ],
            [
                'cat' => 'objects personnels',
                'sub_cat' => 'Bijoux',
                'description' => 'Bijoux pour hommes et femmes',
            ],
            [
                'cat' => 'objects personnels',
                'sub_cat' => 'Sacs et accessoires',
                'description' => 'Sacs et accessoires pour hommes et femmes',
            ],
            [
                'cat' => 'objects personnels',
                'sub_cat' => 'Autres',
                'description' => 'Autres objets personnels',
            ],
        ];

        foreach ($category as $cat) {
            category::create($cat);
        }
    }
}
