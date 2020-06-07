<?php
// tests/Entity/testsCategorie.php
namespace App\Tests\Entity;

use App\Entity\Categorie;
use App\Entity\Produit;
use PHPUnit\Framework\TestCase;

/**
 * Test unitaires pour l'entité App\Entity\Categorie
 */
class TestsCategorie extends TestCase{

    public function testInstance() {
        $categorie = new Categorie();
        $this->assertInstanceOf(Categorie, $categorie);
    }

    /**
     * Test unitaire de la fonction addProduit()
     */
    public function addProduitTest(){
        $categorie = new Categorie();
        $categorie->addProduit(new Produit(1, "ProduitTest", "img/produitTest"));
        $this->assertEquals(1, sizeof($categorie->getProduits()));
    }

    /**
     * Test unitaire de la fonction removeProduit()
     * @depends addProduitTest
     */
    public function testRemoveProduit(){
        $categorie = new Categorie();
        $produit = new Produit(1, "ProduitTest", "img/produitTest");
        $categorie->addProduit($produit);
        $categorie->removeProduit($produit);
        $this->assertEquals(0, sizeof($categorie->getProduits()));
    }
}