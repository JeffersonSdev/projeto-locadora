<h1>Novo Usuário</h1>
<form action="user-new.php" method="post">
    <table>
        <tr><td>Usuario <td><input type="text" name="usuario" id="usuario" size="10" maxlength="10">
        <tr><td>Nome <td><input type="text" name="nome" id="nome" size="30" maxlength="30">
        <tr><td>Tipo<td><select name="tipo" id="tipo">
            <option value="admin">Administrador do Sistema</option>
            <option value="editor" selected>Editor Autorizado</option>
        </select>
        
        <tr><td>senha <td><input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Confirme sua senha<td><input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td><input type="submit" value="Salvar">
    </table>
</form>