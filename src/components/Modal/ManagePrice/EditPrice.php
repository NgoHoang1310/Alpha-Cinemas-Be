<?php
$priceId = $_GET['priceId'];
$apiGetPriceById = "http://localhost/book_movie_ticket_be/api/priceseat/getPriceSeatById?id=" . $priceId;
$responsePrice = file_get_contents($apiGetPriceById);
$dataPrice = (object)json_decode($responsePrice, true);

$apiGetTypeSeat = "http://localhost/book_movie_ticket_be/api/typeseat/get";
$responseTypeSeat = file_get_contents($apiGetTypeSeat);
$dataTypeSeat = (object)json_decode($responseTypeSeat, true);
?>

<div class="modal-header">
    <h1 class="modal-title fs-3 fw-bold" id="exampleModalLabel">Sửa giá</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="" id="form">
        <div class="row">
            <div class="col-6">
                <label for="typeSeat" class="form-label">Loại ghế</label>
                <select disabled class="form-control" id="typeSeat" required>
                    <?php
                    foreach ($dataTypeSeat->data as $typeSeat) {
                    ?>
                        <option <?php echo $dataPrice->data[0]['typeSeatId'] == $typeSeat['id'] ? "selected" : ""  ?> value="<?php echo $typeSeat['id'] ?>"><?php echo $typeSeat['typeName'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Giá ghế</label>
                <div class="col-sm-8">
                    <input value="<?php echo $dataPrice->data[0]['price']  ?>" type="text" class="form-control" id="price" required>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <div class="d-inline-block">
        <button onclick="handleUpdatePrice()" class="btn btn-success ">Lưu</button>
    </div>
</div>