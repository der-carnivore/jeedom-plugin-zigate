Plugin ZiGate pour Jeedom
=========================

Documentation et changlog du plugin ZiGate pour Jeedom

## Documentation utilisateur

Voir la [documentation utilisateur](documentation/Documentation.md).

## ChangeLog

* 2018-07-20 :
	- Ajout de vignettes
	- Amélioration de la gestion du cube Xiaomi
	- Diverses amélioration/correction de bugs

* 2018-06-26 :
	- Ajout de vignettes
	- Ajout du type de le nom par défaut des équipements
	- Gestion des zone IAS (Détecteur d'inondation, de fumée, d'intrusion, etc)
	- Ajout de la commande refresh
	- Correction bug multiclick pas à 0 au démarrage
	- Amélioration de la gestion du cube XIAOMI
	- Modification de l'information current_level varie maintenant de 0-100 au lieu de 0-254

* 2018-06-05 :
    - Publication des sources sur github
    - Ajout de la commande Toggle
    
* 2018-05-14 :
    - Ajout de vignettes

* 2018-04-20 :
    - Correction installation des dépendances

* 2018-04-18 :
    - Amélioration des équipements HUE
    - Corrections de bug
    - Ajout de vignettes

* 2018-04-16 :
    - Correction bug gestion des couleurs

* 2018-04-11 :
    - Commande des prises Legrand
    - Commande des ampoules Sunricher DIM Lighting
    - Information de présence sous forme binaire et non numérique
    - Correction des informations onoff manquantes pour les interrupteurs multiples
    - Correction d'un bug concernant les jeedom utilisant HTTPS
    - Gestion du cluster 0x0500 IAS Zone (capteur d'inondation, fumée, présence, etc)
    - Gestion des couleurs pour les ampoules
    - Ajout de vignettes
    - Fonction de reconnexion automatique

* 2018-03-21 :
    - Ajout commande Touchlink
    - Ajout commande Network Scan
    - Ajout commande Identifier
    - Ajout de vignettes
    - Gestion des capteurs de luminosité
    - Ebauche information couleur des ampoules

* 2018-03-17 :
    - Correction d'un bug de sélection automatique du port usb
    - Correction d'un bug empéchant parfois les valeurs de remonter

* 2018-03-15 :
    - Remontée état des ampoules IKEA
    - Retour à 0 des capteurs de présence
    - Ajout de vignettes

* 2018-03-08 :
    - Ajout de vignettes
    - Correction d'un bug dans la dépendance du démon provoquant son crash

* 2018-03-07 :
    - Ajout de vignettes
    - Ajout inversion pour les infos binaires
    - Ajout min/max pour les infos numériques
    - Corrections de bugs

* 2018-03-02 :
    - Petite mise à jour pour corriger un bug empéchant l'inclusion (erreur 128)

* 2018-02-28 :
    - Correction de bugs
    - Ajout des vignettes (pour les équipements XIAOMI, les autres arriveront prochainement)
    - Ajout d'un bouton pour rafraichir les informations d'un équipement
    - Amélioration de la gestion du niveau de batterie

* 2018-02-24 :
    - Correction de bugs
    - Support de la ZiGate Wifi

* 2018-02-22 :
    - Correction de bugs
    - Ajout niveau de batterie

* 2018-02-19 :
    - Ajout du support des commandes on/off et level control
    - Attention il est nécessaire de refaire l'appairage des équipements pour faire apparaitre les nouvelles commandes
    - il est nécessaire de mettre à jour le firmware de la clé zigate à la version **3.0d**

* 2018-02-08 : Version initiale
    - Support en lecture des équipements, testé avec des capteurs Xiaomi
