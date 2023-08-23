<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
 <h1>Les Controlleurs</h1>

    <p>
      Sur laa première ligne, nous pouvons constater l'utilisation des namespaces"espaces de noms en francais" , fonctionnalité issue de PHP via la librairie SPL et ses foonctions d'autoload(également intégrée dans Symfony via Composer).

      Il donc indiquer le chemin d'accès après le terme "namespace", dans l'exemple , nous le trouvons sous "App\Controller" qui est un alias du dossier "\src". On retrouve cette configuration dans le fichier de configuration "composer.json".

      => use : appelle les classe dont nous avons besoin pour faire fonctionner ce controller, suivi du chemin d'accès pour les retrouver.

      => La classe de ce controller se nomme "PictureController". Notons que, par convention, toutes les classes de controller doivent terminer leur nom par "Controller".

      => Cette classe hérite d'AbstractController . Cela signifie que , comme toute classe controller , elle doit hériter de la classe mère et abstraite AbstractController, délivrée par Symfony pour disposer d'une panoplie de fonctionnalités. 

      => la méthode qui est déclarée avec "public function se nomme "index"
 et appellle, grace a ses paramètres et l'injection de dépendance (que l'on verra plus tard) , la classe  "picturesRepository et retournera un objet de type "Response" fourni par le composant mère HttFoundation.

      => la variable  "$allPictures" récupère toutes les images enregistrées dans la base de données grâce à la méthode "findAll", proposée par Doctrine.

      => Dans le retour , on demande à Symfony d'écrire une répponse http, contenant dans son corps le HTML résultant de la vue "index.html.twig " puis on fait passer l'objet "$AllPictures " que l'on pourra appeler dans Twig sous l'appelation "pictures".
    </p>
  </body>
</html>