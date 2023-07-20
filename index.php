<?php include('db.php'); ?>
<?php include('function.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link rel="stylesheet" href="css/null.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<main class="main">
    <div class="wrapper">
        <form action="index.php" method="post" class="add-contact-form">
            <p class="title">
                Добавить контакт
            </p>
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="" placeholder="Имя" required />
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="phone" value="" placeholder="Телефон" required />
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Добавить</button>
        </form>
        <div class="contacts-list">
            <p class="title title-contacts">
                Список контактов
            </p>
            
            <?php foreach ($peoples as $people) { ?>
                <div class="contact">
                    <p class="contact-name"> <?php echo $people['name']; ?> <a href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/contacts/?delete=<?php echo $people['id']; ?>">x</a></p>
                    <p class="contact-phone">
                        <?php echo phone_format($people['phone']); ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
</main> 
</body>
</html>