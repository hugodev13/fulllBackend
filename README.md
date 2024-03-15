### For code quality, you can use some tools : which one and why (in a few words) ?

Pour garantir la qualité du code, on peut utiliser PHP_CodeSniffer et PHPStan qui sont des outils 
que l'on peut intégrer dans notre IDE et qui vont analyser le respect des normes de codage PHP et 
détecter les éventuelles erreurs.
Personnellement, j'utilise aussi SonarLint qui va aussi donner des conseils sur les bonnes pratiques, 
telles que le nombre maximal de caractères sur une ligne ou le nombre de ligne dans une méthode de Controller.

De plus, il y a des framework PHP de test comme PHPUnit qui permettent de tester des fonctions de notre projet, 
en spécifiant des arguments en entrée et en vérifiant que le résultat correspond à celui attendu.

### you can consider to setup a ci/cd process : describe the necessary actions in a few words

Personnellement, je n'ai jamais mis en place un process CI/CD dans le cadre professionnel.
Mais pour ce faire, il faut que le repository du projet soit sur une plateforme comme GitLab ou GitHub.
Puis il faut configurer le déploiement, en incluant les instructions et l'exécution des tests.