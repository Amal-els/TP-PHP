*Ex1:*
On a intégré la partie Session(la classe Session et les fichiers nbVisites.php et resetSession.php) avec le premier exercice des étudiants et non pas dans un autre exercice à part.

*Ex2:*
Tout les scripts redondants ont été mis dans le dossier fargments pour eviter de réécrire le meme code à plusieurs reprises, il suffit juste de l'importer(de meme pour les autres exercices aussi). Par exemple la fonction efficace qui 
definit les attaques efficaces de chaque sous classe de Pokemons contient le meme code pour tout les sous classes à l'exception de type de pokemon plus efficace ou moin efficace donc il suffira juste de passer ces types en parametres 
et exploiter la meme fonction commune à tout les pokemons.

*Ex3:*
Pour faire l'exportation des donnees des étudiants en CSV on a installé vendors a l'aide de composer . On a également installé datatables pour pouvoir afficher les tableaux dynamiques paginés et pour filtrer les listes des étudiants par nom et les listes des sections par designation. 