<h1>Alteração de Dados</h1>
<form action="user-edit.php" method="post">
    <table>
        <tr><td>Usuario<td><input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION['user']?>" readonly size="10" maxlength="10">
        <tr><td>Nome<td><input type="text" name="nome" id="nome" size="10" maxlength="10" value="<?php echo $_SESSION['nome']?>" >
        <tr><td>tipo<td><input type="text" name="tipo" id="tipo" readonly value="<?php echo $_SESSION['tipo']?>" >
        <tr><td>Senha<td><input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Confirme a senha<td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td>Nome<td><input type="submit" value="Salvar">



    </table>
</form>