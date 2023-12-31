<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    if (session_id() == "") session_start();
?>

<div class="amigoMuseu-wrapper">
    <span class="material-symbols-outlined close-icon">close</span>

    <form method ="POST" action="/prototipo-museu-racatinga/view/pages/logarUsuario.php" class="account-wrapper login">
        <h1>Bem Vindo de Volta!</h1>
        
        <?php
            if (isset($_SESSION["loginMessage"])) {
                echo "<div class='loginMessage'>".$_SESSION["loginMessage"]."</div>";
                unset($_SESSION["loginMessage"]);
            }
        ?>

        <div class="userinfo-box">
            <label for="nome">Nome:</label>
            <input type="text" name="nomeLogin">
        </div>
        
        <div class="userinfo-box">
            <label for="">Senha: </label>
            <input type="password" name="senhaLogin">
        </div>

        <button type="submit" name="login">Entrar</button>

        <div class="change-wrapper">
            <p>Não tem uma conta? <span class="register-button">Registre-se agora!</span></p>
        </div>
    </form>

    <form method ="POST" action="/prototipo-museu-racatinga/view/pages/logarUsuario.php" class="account-wrapper register">
        <h1>Bem Vindo ao Museu!</h1>

        <?php
            if (isset($_SESSION["registroMessage"])) {
                echo "<div class='registroMessage'>".$_SESSION["registroMessage"]."</div>";
                unset($_SESSION["registroMessage"]);
            }
        ?>

        <div class="userinfo-area">
            <div class="userinfo-box">
                <label for="nome">Nome Completo:</label>
                <input type="text" name="nomeRegistro" >
            </div>

            <div class="userinfo-box">
                <label for="username">Nome de Usuário:</label>
                <input type="text" name="usernameRegistro" >
            </div>
            
            <div class="userinfo-box">
                <label for="">Senha: </label>
                <input type="password" name="senhaRegistro" required>
            </div>
        </div>

        <div class="userinfo-area">
            <div class="userinfo-box">
                <label for="">CPF: </label>
                <input placeholder="Digite apenas números." type="text" pattern="\d*" name="cpfRegistro" minlength="11" maxlength="11" required>
            </div>

            <div class="userinfo-box">
                <label for="">RG: </label>
                <input placeholder="Digite apenas números." type="text" pattern="\d*" name="rgRegistro" minlength="9" maxlength="9" required>
            </div>
        </div>

        <button type="submit" name="cadastrar" value="true">Registrar</button>

        <div class="change-wrapper">
            <p>Já tem uma conta? <span class="login-button">Entre agora!</span></p>
        </div>
    </form>
</div>