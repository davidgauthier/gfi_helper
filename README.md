# gfi_helper

A Symfony project created on March 5, 2018, 8:42 pm.
Room reservation management helper by workers from [GFI](http://gfi.fr)

Any ideas are welcome!

## Install

### Get the code

    git clone https://github.com/davidgauthier/gfi_helper.git

### Configure

Install vendors

    php composer.phar install

Create the database

    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate

Load Fixtures

    php bin/console doctrine:fixtures:load



## GIT WorkFlow

## Récupérer la branche de développement

	git pull
	git checkout --track origin/develop

## Création d'une branche à partir de la branche de développement

	git checkout develop
	git branch nom_de_ma_branche (exemple: git branch user_registration)
	git checkout nom_de_ma_branche

## Réaliser ses commits


	git status // On vérifie ce qu'on va commit
	git add les/fichiers/a_commit.html.twig
	git commit -m "ajout d'un fichier"
	...
	git commit -m "ajout ..." // On peut effectuer plusieurs commits

## Envoyer la branche sur le serveur distant

	git push origin nom_de_ma_branche

## Créer la pull request

	TODO
	Faire attention à bien sélectioner "develop" dans "Target branch"


## Une fois la feature finie, revenir sur develop

	git checkout develop
	git pull origin develop

# Ressources
- [http://ohshitgit.com/](http://ohshitgit.com/)
- [https://git-scm.com/book/fr/v2](https://git-scm.com/book/fr/v2)
---
- [https://tempusdominus.github.io/bootstrap-4/](https://tempusdominus.github.io/bootstrap-4/)
- [https://momentjs.com/](https://momentjs.com/)

