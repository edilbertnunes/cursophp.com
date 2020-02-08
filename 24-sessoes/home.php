<?php
session_start();
echo "Página com início de sessão<br>";
echo $_SESSION['cor'];
echo "<br>";
echo $_SESSION['carro'];
echo "<br>";
echo session_id();



