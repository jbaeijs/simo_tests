<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionnalTests extends WebTestCase{
    
    /**
     * Test de vérification de connexion au serveur
     */
    public function livenessProbe(){
        $client = static::createClient();
        $client->request('GET', '/fr');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Test fonctionnel d'ajout d'un produit dans le panier
     * @depends livenessProbe
     */
    public function testAddProductToBasket(){
        $client = static::createClient();
        $crawler = $client->request('GET','/fr');
        
        // Récupération et click sur le lien vers la boutique
        $linkBoutique = $crawler->filter('a:contains("Boutique")')->eq(1)->link();
        $crawler = $client->click($linkBoutique);

        // Récupération et click sur le lien menant vers le rayon des fruits
        $linkRayon = $crawler->filter('a:contains("Fruits")')->eq(1)->link();
        $crawler = $client->click($linkRayon);

        //Ajout d'une pêche dans le panier
        $linkAjout = $crawler->filter('a:contains("Pêche")')->eq(1)->link();
        $crawler = $client->click($linkAjout);

        // Récupération et click sur le lien menant au panier dans la barre de navigation
        $linkPanier = $crawler->filter('a:contains("Panier")')->eq(1)->link();
        $crawler = $client->click($linkPanier);

        // Vérification de la présence du mot "Pêche" sur la page Panier
        $this->assertSelectorTextContains('html p', 'Pêche');
    }

    /**
     * Test fonctionnel du formaulaire /contact
     * @depends livenessProbe
     */
    public function testContactForm(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/fr/contact');

        $form = $cselectButton->submitForm('submit')->form();
        $form['nom'] = "TestName";
        $form['mail'] = "mail@test.com";
        $form['sujet'] = "Test fonctionnel"; 
        $form['message'] = "Test du fonctionnement du formulaire de contact";
        $crawler = $client->submit($form);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Test fonctionnel de l'implémentation de la langue Française sur la page d'accueil
     * @depends livenessProbe
     */
    public function testFrenchLanguage(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/fr');

        $this->assertSelectorTextContains('html h1.title', 'Bienvenue');
    }

    /**
     * Test fonctionnel de l'implémentation de la langue Anglaise sur la page d'accueil
     * @depends livenessProbe
     */
    public function testEnglishLanguage(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/en');

        $this->assertSelectorTextContains('html h1.title', 'Welcome');
    }
}