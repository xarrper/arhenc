<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$Username = $_SESSION['Username'] ?: null;
$Password = $_SESSION['Password'] ?: null;

if (!empty($_SESSION['Username'])) {
    $Username = $_SESSION['Username'];
}