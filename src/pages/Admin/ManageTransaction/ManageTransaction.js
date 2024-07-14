let transactionId = "";

let handleGetCurrentTransactionId = (element) => {
    transactionId = element.parentNode.parentNode.getAttribute('data-transaction-id');
}


// const handleGetTransactionById = (element) => {
//     handleGetCurrentTransactionId(element);
//     httpRequest("GET", `http://localhost/Book-movie-tickets/src/components/Modal/ManageUser/EditUser.php?userId=${userId}`, "#editUser-modal")
// }



const handleDeleteTransaction = () => {
    let formData = new FormData();
    formData.append('id', transactionId);
    let api = "http://localhost/book_movie_ticket_be/api/invoice/delete";

    fetch(api, {
        method: 'POST',
        body: formData  // Chuyển đổi dữ liệu thành chuỗi JSON nếu cần
    })
        .then(res => res.json())
        .then(res => {
            if (res.code == 0) {
                setTimeout(() => {
                    location.reload();
                }, 500)
            }
        })
}
