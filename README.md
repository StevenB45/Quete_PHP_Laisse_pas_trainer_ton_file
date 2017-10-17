Challenge

Mettre en place une bibliothèque d'image

Voici un challenge qui risque de te donner du file à retordre !

Tu vas devoir mettre en place un système d'upload d'images multiple, qui n'acceptera que les fichiers de moins de 1Mo, et uniquement des fichiers jpg, png ou gif
Les noms de fichiers devront commencer par 'image' suivi d'un identifiant unique puis de l'extension, par ex : image15163e5b15.png
Dans tes projets, tu seras très souvent amené à gérer ainsi de l'upload de fichier, la plupart du temps tu auras à sauvegarder les chemins vers ces fichiers dans une base de données, ce qui te permettra de lister par exemple les fichiers déjà présents, et de les supprimer si besoin.

Pour ne pas s'encombrer ici d'une gestion de base de données, pour cet exercice, tu vas devoir lister directement les fichiers contenus dans ton dossier upload. Pour cela, tu peux utiliser différentes fonctions PHP, comme FilesystemIterator ou encore scandir.

Tu devras donc afficher sous forme de vignettes (pense à utiliser les thumbnails boostrap) les images déjà uploadées et le nom de chaque fichier.
Dans chaque vignette, ajoute un bouton Delete permettant de supprimer le fichier du serveur. C'est la fonction unlink de PHP qui permet de supprimer un fichier.
Astuce: avant de supprimer un fichier, pense à vérifier qu'il existe bel et bien, la fonction file_exists pourra t'aider.

Critéres de validation

le formulaire permet d'uploader plusieurs fichiers
les fichiers >1Mo sont rejetés
les fichiers autres que jpg, png et gif sont rejetés
les images uploadées dans le dossier upload s'affiche sous forme de vignettes
le nom des fichiers uploadés est affiché sous chaque image et suit bien la forme image / id unique / extension
un bouton delete permet de supprimer des fichiers uploadés préalablement
