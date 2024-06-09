
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

  <header class="header">
    <nav class="nav">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="https://jeromelpushparaj.netlify.app/" target="_blank">Myporfolio</a></li>
        <li><a href="https://www.linkedin.com/in/jeromel-pushparaj/" target="_blank">Contact</a></li>
        <?php
        include('user.php');
        // Check if a username is stored in the session
        if (isset($_SESSION['username'])) {
          echo '<li class="right"><a href="#">Welcome, ' . $_SESSION['username'] . '</a></li>';  // Display username if logged in
        } else {
          echo '<li class="right"><a href="signup.php">Signup</a></li>';
          echo '<li class="right"><a href="signin.php">Signin</a></li>';  // Display signup and signin buttons if not logged in
        }
        ?>
      </ul>
    </nav>
  </header>

  <main class="main">
    <h2>Latest Posts</h2>

    <article class="article">
      <h3>Blog Post 1: Demystifying Database Management Systems</h3>
      <p>In the digital age, data is king. But managing vast amounts of information efficiently requires robust tools. That's where Database Management Systems (DBMS) come in. A DBMS is a software application that allows users to create, store, organize, and retrieve data in a structured and centralized way.</p>
      <p>Here's a glimpse into the wonders of DBMS:</p>
      <ul>
        <li>Organized Data Storage: DBMS stores data in a structured format (like tables in a spreadsheet), making it easy to find and manage specific information.</li>
        <li>Efficient Data Retrieval: Powerful querying capabilities allow users to fetch specific data sets based on defined criteria, saving time and effort compared to manual searching.</li>
        <li>Data Integrity: DBMS enforces data integrity rules, ensuring data accuracy and consistency across applications.</li>
        <li>Scalability and Security: DBMS solutions can scale to accommodate growing data volumes and offer robust security features to protect sensitive information.</li>
      </ul>
      <p>Whether you're managing customer records, product information, or website content, a DBMS can be a game-changer. It streamlines data management tasks, improves data accessibility, and ensures data integrity – all essential elements for efficient operations in today's data-driven world.</p>
    </article>

    <article class="article">
      <h3>Blog Post 2: The Wonders of PHP for Web Development</h3>
      <p>If you're venturing into the world of web development, PHP is a language worth considering. It's a powerful, open-source scripting language specifically designed for creating dynamic and interactive web pages. Here's why PHP stands out:</p>
      <ul>
        <li>Versatility: PHP can be used for various web development tasks, from building simple websites and blogs to complex e-commerce platforms and content management systems.</li>
        <li>Ease of Learning: With a relatively simple syntax and vast online resources, PHP offers a gentle learning curve for beginners.</li>
        <li>Large Community: PHP boasts a massive and active developer community, providing readily available support and solutions for common challenges.</li>
        <li>Cost-Effective: Being open-source, PHP eliminates licensing fees, making it a budget-friendly choice for web development projects.</li>
        <li>Integration with Databases: PHP seamlessly integrates with popular database management systems, allowing you to build data-driven web applications.</li>
      </ul>
      <p>So, if you're looking for a powerful, versatile, and cost-effective language to kickstart your web development journey, PHP is an excellent choice. Its vast capabilities and supportive community can empower you to create dynamic and engaging web experiences.</p>
    </article>
  </main>

  <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?> My Blog</p>
  </footer>

</body>
</html>
