<?php
require_once("connection_db.php");

if(isset($_GET['id']) && isset($_GET['action'])) {
  if($_GET['action'] == 'delete') {
    deleteWhere('data_mahasiswa','id',$_GET['id']);
  }
}