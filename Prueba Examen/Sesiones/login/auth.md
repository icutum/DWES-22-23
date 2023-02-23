|publica.php|privada1.php|privada2.php|privada3.php|login.php|logout.php|
|-|-|-|-|-|-|

## Enviar usuario a la página de login
```
session_start()
if (!isset($_SESSION["user"]) || $_SESSION["user"] = "") {
    header("Location: login.php?url='pagina-de-la-que-venía'");
}
```

## Consultas preparadas
```
SELECT user, password FROM table WHERE ...;
$_SESSION["user"] = ...;
```

## Redirigir a donde quería ir el usuario
```
<form>
    <input type="text" name="user">
    <input type="password" name="password">
    <input type="hidden" name="url" value="https://...">
    <input type="submit" name="submit" value="Iniciar sesión">
</form>
```