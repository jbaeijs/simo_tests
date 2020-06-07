Baeijs Jarno - SIMO
Tests unitaires et fonctionnels
=======================
Dans le répertoire `TP1` vous trouverez les tests unitaires réalisé sur Adhérent pendant le premier cours.
Dans le répertoire `Tests symfony` vous trouverez :
* Des tests unitaires sur les entités du projet Symfony.
* Des tests fonctionnels ayant pour scénario :
	*  Un ajout d'un produit dans le panier. Ce test comprends le module de navigation à partir de la page d'accueil du projet jusqu'au panier. Le test est un succès si le mot "Pêche" est détecté sur la page du panier.
	* Un tests fonctionnel sur l'utilisation et le bon fonctionnement du formulaire de contact. Le test détecte le formulaire et le rempli avec des informations de test. Le test est un succès si le code retour du client est 200.
	* Un test d'intégration de la langue Française. Le test est un succès si le titre principal contient "Bienvenue".
	* Un test d'intégration sur la langue Anglaise. Le test est un succès si le titre principal contient "Welcome"