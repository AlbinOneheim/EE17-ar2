<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intro till PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Intro till PHP</h1>
        <?php
        /* Ritningen */
        class User {
            /* Denna variabel syns inte utåt: den går inte att nå */
            private $username, $email;

            public function __construct($uname)
            {
                $this->username = $uname;
            }
            /* Denna function syns utåt: den går att använda */
            public function addEmail($mail) {
                $this->email = $mail;
            }
        }

        /* Skapa ett objekt */
        $user1 = new User("Albin");
        /* Använd objektets function */
        $user1->addEmail("albin.oneheim@gmail.com");

        /* Skapa ett till objekt */
        $user2 = new User("Emil");
        $user2->addEmail("Emil@gmail.com");
        ?>
    </div>
</body>
</html>