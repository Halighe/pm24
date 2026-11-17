<?php
require __DIR__ . "\bd.php";

$stmt = "SELECT id, name, email, password FROM user";
$result = $pdo->prepare($stmt);
$result->execute();
// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//  print_r($row);
// }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой сайт</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-top">
                <div>
                    <img class="header-logo" src="img/image.png" alt="логотип">
                </div>
                <div>
                    <nav>
                        <ul>
                            <li class="header-menu-item"><a href="#about-me">Обо мне</a></li>
                            <li class="header-menu-item"><a href="#my-projects">Мои проекты</a></li>
                            <li class="header-menu-item">Контакты</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <main id="about-me">
        <div class="container">
            <h1 class="main-title">Липецкий Государственный Технический Университет</h1>
            <p class="main-text">
                Основанный в 1956 году, Липецкий Политех сегодня – это прогрессивный научно-образовательный центр,
                который успешно сочетает традиции инженерного вуза с современными тенденциями и разнообразием
                образовательных программ.
            </p>
        </div>
    </main>

    <div id="my-projects">
        <div class="container">
            <h1 class="main-title">Мои проекты</h1>
            <div class="projects">
                <?php foreach ($result as $user): ?>
                <div class="project-item">
                    <h3><?= $user['name'] ?></h3>
                    <p><?= $user['email'] ?></p>
                    <p><?= $user['password'] ?></p>
                    <a href="/web2/subject.php?id=<?= $user['id'] ?>">Подробнее</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>