<?php
require __DIR__ . '/../../services/articleservice.php';

class ArticleController {

    private $articleService; 

    // initialize services
    function __construct() {
        $this->articleService = new ArticleService();
    }

    public function index() {
        if($_SERVER['REQUEST_METHOD'] === "POST"){
            $jsonData = file_get_contents("php://input");
            $articleDecoded = json_decode($jsonData);

            $article = new Article();
            $article->setContent($articleDecoded->content);
            $article->setTitle($articleDecoded->title);
            $article->setAuthor("Bas");


            $this->articleService->insert($article);
            
            echo "Article inserted in the database!";
        }

        if($_SERVER['REQUEST_METHOD'] === "GET"){
            // return all articles in the database as JSON
        
            $articlesJSON = $this->articleService->getAll();
            echo json_encode($articlesJSON);
        }


        
    }
}
?>