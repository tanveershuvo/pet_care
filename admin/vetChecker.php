<?php
session_start();
if (!isset($_SESSION['isVet']) && !$_SESSION['isVet'] == true) {
    header('Location:logout');
}
