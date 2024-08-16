<?php
include_once 'database.php';
class Action {
    private $db;

    public function __construct() {
        // Assign the database connection in the constructor
        $this->db = Database::getConnection();
    }

    // Create an article
    public function create($title, $content) {
        // SQL query to insert a new article
        $stmt = $this->db->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);
        return $stmt->execute();
    }

    // Update an article
    public function update($id, $title, $content) {
        // SQL query to update an existing article
        $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
        $stmt->bind_param("ssi", $title, $content, $id);
        return $stmt->execute();
    }

    // Delete an article
    public function delete($id) {
        // SQL query to delete an article by ID
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // View an article
    public function view($id) {
            // Prepare and execute the SQL statement
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
            // Fetch the article data
        if ($result->num_rows > 0) {
            $article = $result->fetch_assoc();
            $content = $article['content'];
        
            // Include Parsedown library
            require './_libs/include/Parsedown.php';
            $Parsedown = new Parsedown();
        
            // Display content
            $content = $Parsedown->text($content);
            return $content;
        } else {
            echo "Article not found.";
            exit;
        }

    }

    // View all articles
    public function viewAll() {
        // SQL query to select all articles
        // $result = $this->db->query("SELECT * FROM articles");
        return $this->db->query("SELECT * FROM articles");
    }
}
?>
