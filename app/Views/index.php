<?php $this->extend('layout') ?>

<?php $this->section('content') ?>
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('images/banner/carousel-1.gif') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-2.webp') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-3.webp') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-4.webp') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-5.webp') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-6.webp') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-7.webp') ?>" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="<?= base_url('images/banner/carousel-8.webp') ?>" class="d-block w-100">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="product-container">
    <?php include('product_view.php'); ?>
</div>

<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?= base_url('images/banner/home-1.webp') ?>" class="d-block w-100" alt="...">
        </div>
    </div>
</div>

<div class="product-container">
    <?php include('product_view.php'); ?>
</div>

<?php $this->endSection() ?>