![cropped-VELO-CITE-2023_couleur-horizontal-1](https://github.com/paulop33/bilan-plaidoyer/assets/3404409/b1b94f0f-668b-4ac5-bbb7-1db3c3e2e3ce)

Commande pour générer des lettres au format PDF à envoyer aux couleurs de Vélo-Cité en y insérant les données d'un CSV.
La première ligne du CSV est directement utilisée dans le fichier de templating twig.

Le projet tourne via Docker, Gotenberg et Symfony/PHP.

# Installation

```
# clone du dépot
git clone git@github.com:paulop33/bilan-plaidoyer.git

# lancement du docker (gotenberg)
docker compose up

# téléchargement des dépendances
composer install
```


# Commande de génération des pdfs :

```
php bin/console app:generate-letter data-lettre.csv
```



