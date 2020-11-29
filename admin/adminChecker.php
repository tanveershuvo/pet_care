<?php
if (!isset($_SESSION['isAdmin']) && !$_SESSION['isAdmin'] == true) {
    header('Location:logout');
}
