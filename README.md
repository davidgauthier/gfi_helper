# gfi_helper

A Symfony project created on March 5, 2018, 8:42 pm.
Room reservation management helper by workers from [GFI](http://gfi.fr)

Any ideas are welcome!

## Install

### Get the code

    git clone https://github.com/davidgauthier/gfi_helper.git

### Configure

increase memory limit in php.ini

    memory_limit = 2G

Enable OPCACHE in php.ini

    [opcache]
    opcache.enable=1
    opcache.enable_cli=0
    opcache.memory_consumption=256
    opcache.interned_strings_buffer=16
    opcache.max_accelerated_files=4000
    opcache.revalidate_freq=120
    opcache.fast_shutdown=1
    
    ;adapt the path to your config
    zend_extension="C:\MyWamp\php\5.6.26\ext\php_opcache.dll"

Activating output buffering (to prevent 'zend_mm_heap corrupted' error)

    output_buffering = 8192

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

- Accédez à [https://github.com/davidgauthier/gfi_helper](https://github.com/davidgauthier/gfi_helper)
- GitHub vous notifie dans un encadré jaune que vous avez poussé une branche récemment
- Cliquez sur "Compare & pull request"
- Sélectionnez la branche cible 'develop' dans la liste déroulante "base:" en haut à gauche
- Laissez un petit commentaire ;)
- Validez avec le bouton "Create pull request"

## Continuer sans pull request

	git checkout develop
	git merge nom_de_ma_branch

## Une fois la feature finie, revenir sur develop

	git checkout develop

Si pull request validée et merge :

	git pull origin develop

# Ressources
- [http://ohshitgit.com/](http://ohshitgit.com/)
- [https://git-scm.com/book/fr/v2](https://git-scm.com/book/fr/v2)
---
- [https://tempusdominus.github.io/bootstrap-4/](https://tempusdominus.github.io/bootstrap-4/)
- [https://momentjs.com/](https://momentjs.com/)

