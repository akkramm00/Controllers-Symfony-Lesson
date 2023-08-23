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

    <h2> Les routes</h2>

    <p>
      Notons egalement que dans notre code , nous avons mmappé une URL avec le controller .Cela s'est efféctué avec l'annotation @Route('/', name: 'app_pictures_index', methods: ["GET"]).

      Recemment, via PHP 8 , une nouvlle notion est née,le PHP Attribule, que l'on retrouve notamment à partir de la version 5.4 et 6 de Symfony. Cela permet de déclarer de la métadonnée directement compris par PHP, sous forme:
      #[Route('/', name: 'app_pictures_index', methods: ['GET'])] sans avoir besoin d'utiliser les astérisques. Le routing est un sujet à part entière.
    </p>

   <h2> AbstractController</h2> 
    <p>
      Symfony propose par defauts d'etendre le contrôleur avec "AbstractController". Cette yclasse va fournir diverses methods qui permettent de rendre un template., d'effectuer une redirection, de gérer des erreurs et bien d'autre choses encore. Abstractcontroller, sous Symfony 5.4 et PHP¨8, propose ces différentes méthodes:

      * setContainer()
      * getParameter()
      * getSubscribedservices()
      * generateUrl()
      * forward()
      * redirect()
      * redirectToRoute()
      * json()
      * file()
      * addFlash()
      * isGranted()
      * denyAccessUnlessGranted()
      * renderView()
      * render()
      * renderForm()
      * stream()
      * createAccessDeniedException()
      * createForm()
      * createFormBuilder()
      * getUser()
      * isCsrfTokenValid()
      * addLink()

    </p>

  <h2>les Services </h2>
    <p>
      Les services sont des classes qui vont pouvoir être appelées dans notre code. Ils sont très utiles pour les controlleurs? car cela leur poermet d'ajouter de nombreuses fonctionnalités sans pour autant les surcharger. Certains services sont proposées par Symfony, mais nous pouvons en créer autant que nous avons besoin.

      Pour connaitre tous les services que propose Symfony, on peut taper la commande suivante:
      
     " $ php bin/console debug:autowiring "
      
    </p>

    <h2>Création de services</h2>
    <p>
      Nous pouvons aussi créer nois propres services .Pouir cela , nous devons créer un fichier qui contiendra le nm "services" par exemple"UserServices"  le même que notre classe. A l'interieur de cette classe , nous pouvons mettre autant de méthode que nous le souhaitons. Apres, grâce à l'injection de dépendances et au namespace? nous pouvons l'utiliser dans notre controller.

      Toutefois, pour être certain que le chargement de service se fasse automatiquement, vérifieons le fichier "servoces.yaml" et assurons-nous d'avboir les deux variables "autwire" et "autoconfigure " à "true" . Ce sont elles qui permettent à Symfony d'instancier nos classe de service automatiquement et d'aller chercher d'autre dépendances.

      Voici comment ce fichier doit etre par defauts sous Symfony 5.4 :

      ==> Voir le fichier "Config/ services.yaml"
    </p>

    <h2>
       Les composants HTTPFoundation
    </h2>
    <p>
      Les accés à une application web se font ^par une requête HTTP. Cette requête contient un en-tête et un body. CVes elements contiennent plusieurs informations . 
      La réponse du serveur renverra  aussi un esyntaxe similaire. Grace aux classes "request et response" de HttpFoundation, il est ppossible de récupérer ces informations dans le controlleur. Pour utiliser ces classes , il faudra procéder de la même manière que pour les services? c'est-à-dire insérer dans les paramètres de la méthode du controller "Request  et response" avec un nom de variable, souvent, nous trouverons "$request" et "$response" (pensons à toujours l'ajouter au namespace utilisé).
    </p>
  </body>
</html>