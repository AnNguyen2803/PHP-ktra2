// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");
function activeLink() {
    list.forEach(item => {
        item.classList.remove("hovered");

    })
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}

document.addEventListener("DOMContentLoaded", function() {
    // Lấy ra tất cả các thẻ a
    const links = document.querySelectorAll('.ajax-link');

    // Lặp qua từng thẻ a và thêm sự kiện click
    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            // Xóa class active khỏi tất cả các thẻ a
            links.forEach(function(l) {
                l.classList.remove('hovered');
            });

            // Thêm class active cho thẻ a được click
            link.classList.add('hovered');

            // Lưu trạng thái vào Local Storage
            localStorage.setItem('activeLink', link.getAttribute('id'));
        });
    });

    // Kiểm tra xem có trạng thái được lưu trong Local Storage không
    const activeLinkId = localStorage.getItem('activeLink');
    const activeLink = document.getElementById(activeLinkId);

    if (activeLinkId) {
        if (activeLink) {
            activeLink.parentNode.classList.add('hovered');
        }
    }

    var inputs = document.querySelectorAll(".quantity-value");
        
    inputs.forEach(function(input) {
        if (parseInt(input.value) < 10) {
            Object.assign(input.style, {
                color: "#FFF",
                backgroundColor: "#FF0000"
            })

        } else {
            input.style.color = "";
        }
    });

    $(document).ready(function() {
        // Khởi tạo biến trạng thái mặc định là giảm dần
        var sortDescending = true;
    
        $('.sort-icon').click(function() {
            // Lấy giá trị của thuộc tính data-name của biểu tượng đã nhấn
            var columnName = $(this).data('name');
            
            // Sắp xếp sản phẩm và hiển thị lại
            sortProducts(columnName, sortDescending);
    
            // Đảo ngược trạng thái sắp xếp cho lần nhấn tiếp theo
            sortDescending = !sortDescending;
        });
    });
    
    function sortProducts(columnName, sortDescending) {
        // Lấy tất cả các hàng của bảng sản phẩm
        var rows = $('#ketqua').find('tr').get();
    
        // Sắp xếp các hàng dựa trên giá trị của cột đã chọn
        rows.sort(function(a, b) {
            var valueA, valueB;
    
            // Kiểm tra trường hợp là input thì thực hiện lấy ra các thẻ input
            if ($(a).find('td[data-name="' + columnName + '"] input').length > 0) {
                valueA = $(a).find('td[data-name="' + columnName + '"] input').val().trim();
                valueB = $(b).find('td[data-name="' + columnName + '"] input').val().trim();
            } else {
                valueA = $(a).find('td[data-name="' + columnName + '"]').text().trim();
                valueB = $(b).find('td[data-name="' + columnName + '"]').text().trim();
            }
    
            // Loại bỏ các kí tự không phải số và chuyển đổi thành số nguyên
            var numberA = parseInt(valueA.replace(/\D/g, ''), 10);
            var numberB = parseInt(valueB.replace(/\D/g, ''), 10);
    
            // So sánh số nguyên từ lớn đến bé hoặc từ bé đến lớn tùy thuộc vào trạng thái sắp xếp
            if (sortDescending) {
                return numberB - numberA; // Giảm dần
            } else {
                return numberA - numberB; // Tăng dần
            }
        });
    
        // Xóa các hàng hiện tại trong bảng
        $('#ketqua').empty();
    
        // Thêm các hàng đã sắp xếp vào bảng
        $.each(rows, function(index, row) {
            $('#ketqua').append(row);
        });
    }
   
});

    