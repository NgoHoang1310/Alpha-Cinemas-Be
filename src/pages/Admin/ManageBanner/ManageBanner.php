<?php
include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Header/AdminHeader.php");

$apiBanner = 'http://localhost/book_movie_ticket_be/api/banner/get';
$responseBanner = file_get_contents($apiBanner);
$dataBanner = (object)json_decode($responseBanner, true);


?>
<div class="manage-banner-container">
    <div class="row clear">
        <div class="col-2 sidebar">
            <?php
            include("/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/SideBar/SideBar.php");
            ?>
        </div>
        <div class="col-10 manage-banner-content">
            <h4 class="mt-3 mb-3 fw-bold"><i class="fa-solid fa-image me-3"></i>Hỉnh ảnh xem trước</h4>
            <div class="slider rounded">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                        if (($dataBanner->code === 0) && !empty($dataBanner->data)) {
                            for ($i = 0; $i < count($dataBanner->data); $i++) {
                        ?>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="
                        <?php echo $i ?>" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <?php
                            }
                        }

                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        if (($dataBanner->code === 0) && !empty($dataBanner->data)) {
                            foreach ($dataBanner->data as $banner) {
                        ?>
                                <div class="carousel-item <?php echo ($banner['id'] == 10) ? "active" : "" ?>">
                                    <img loading="lazy" src="<?php print_r($banner['thumbPath']) ?>" class="d-block w-100" alt="...">
                                </div>
                        <?php

                            }
                        }
                        ?>
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
            </div>
            <div class="btn-function d-inline-block">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewBanner"><i class="fas fa-plus me-3"></i>Thêm mới</button>
            </div>
            <table class="table table-striped text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dataBanner->data as $banner) {
                    ?>
                        <tr data-banner-id="<?php echo $banner['id'] ?>">
                            <th scope="row"><?php echo $banner['id']  ?></th>
                            <td>
                                <div class="preview-banner rounded" style="background-image: url('<?php echo $banner['thumbPath'] ?> ');"></div>
                            </td>
                            <td>
                                <button onclick="handleGetCurrentBannerId(this)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBanner"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="addNewBanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="addNewBanner-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageBanner/AddBanner.php' ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteBanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div id="deleteBanner-modal" class="modal-content p-3">
                <?php include '/Applications/XAMPP/xamppfiles/htdocs/Book-movie-tickets/src/components/Modal/ManageBanner/DeleteBanner.php' ?>
            </div>
        </div>
    </div>
</div>