<script>
    const header = document.querySelector("header");
    const headerDiv = document.querySelector("#header");
    window.onscroll = function() {
        if (window.pageYOffset > header.scrollTop + 200) {
            header.classList.add("stuck");
        } else {
            header.classList.remove("stuck");
        }
    }
    const listImage = document.querySelectorAll(".preview-thumbnail li a img");
    const imageDetail = document.querySelector('.preview-pic .tab-pane.active img');
    listImage.forEach((e) => {
        e.onclick = function() {
            imageDetail.src = e.src;
        }
    })
    const toast = document.querySelector('.position-fixed.translate-middle-x-md');
    if (toast) {
        setTimeout(() => {
            toast.style.display = "none";
        }, 1600);
    }

    const userLogout = document.querySelector('.users-logout');
    const logout = document.querySelector('.logout');

    userLogout.onmouseover = function() {
        logout.style.display = "block";
    }
    userLogout.onmouseout = function() {
        logout.style.display = "none";
    }

    function confirmDelete(deUrl) {
        if (confirm("Xác nhận xóa đơn hàng")) {
            document.location = deUrl;
        }
    }
</script>