<?php
    $this->load->view('templates/header');
    $this->load->view('templates/navbar');
    $this->load->view($view, $data);
    $this->load->view('templates/footer');
