const handleSelectTheater = (element) => {
    let theater = element.value;
    document.cookie = "currentTheater=" + JSON.stringify({ theater }) + "; expires=" + new Date(new Date().getTime() + 3600 * 1000).toUTCString() + "; path=/";
    setTimeout(() => {
        location.reload();
    }, 200)
}

const handleLogOut = () => {
    document.cookie = "userData=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    setTimeout(() => {
        location.reload();
    }, 200)
}
