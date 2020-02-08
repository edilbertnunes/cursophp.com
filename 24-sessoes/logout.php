<?php

session_start();
//limpa sessão
session_unset();
session_destroy();

Echo "Encerrando Sessão";