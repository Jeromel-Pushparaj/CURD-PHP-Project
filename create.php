<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <title>Create New Article</title>
</script>
    <style>
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .container form {
            display: flex;
            flex-direction: column;
        }

        .container label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .container input[type="text"], .container textarea {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
        }
        .sumb {
            padding: 15px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .sumb {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Article</h1>
        <form action="submit_article.php" method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>

            <label for="articleContent" >Content</label>
            <textarea id="markdown-editor" id="content" name="content"></textarea>

            <button class="sumb" type="submit">Submit Article</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script>
        var easyMDE = new EasyMDE({ element: document.getElementById('markdown-editor') });
    </script>
</body>
</html>
