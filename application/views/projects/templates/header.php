<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>
    <!-- links -->
    <link rel="stylesheet" href="<?= base_url('public/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('public/') ?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php echo $this->session->flashdata('msg');?>