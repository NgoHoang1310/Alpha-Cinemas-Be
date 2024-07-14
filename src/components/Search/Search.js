let debounceTimeout;

const handleSearch = async (element, table, path) => {
    clearTimeout(debounceTimeout); // Xóa bỏ timeout trước đó (nếu có)
    debounceTimeout = setTimeout(() => {
        httpRequest("GET", `http://localhost/Book-movie-tickets/src/pages/Admin/${path}?t=${table}&q=${element.value}`, "#table")
    }, 500); // Thời gian trì hoãn debounce, trong ví dụ này là 500ms
}

