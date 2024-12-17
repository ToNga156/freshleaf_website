// Lấy các phần tử
const quantityInput = document.getElementById('quantity');
const increaseButton = document.getElementById('increase');
const decreaseButton = document.getElementById('decrease');

// Tăng số lượng khi nhấn nút "+"
increaseButton.addEventListener('click', function() {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue < quantityInput.max) {
        quantityInput.value = currentValue + 1;
    }
});

// Giảm số lượng khi nhấn nút "-"
decreaseButton.addEventListener('click', function() {
    let currentValue = parseInt(quantityInput.value);
    if (currentValue > quantityInput.min) {
        quantityInput.value = currentValue - 1;
    }
});
