<?php
    require "header.php";
?>

    <main>

        <h1>Signup</h1>

        <form action="includes/signup.inc.php" method="post">

            <input type="text" name="UserName" placeholder="Introduzir o nome de utilizador"/>

            <input type="text" name="Email" placeholder="Introduzir o email"/>

            <input type="password" name="password" placeholder="Introduzir a password"/>

            <input type="password" name="passwordV" placeholder="Voltar a introduzir a password"/>

            <button type="submit" name="signup-submit">Signup</button>

        </form>
        
    </main>

<?php
    require "footer.php";
?>