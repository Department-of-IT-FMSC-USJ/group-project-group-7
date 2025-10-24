

// Auto-hide messages after 5 seconds
setTimeout(function() {
    var messages = document.querySelectorAll('.success, .error');
    messages.forEach(function(msg) {
        msg.style.display = 'none';
    });
}, 5000);

// Quantity validation
document.addEventListener('DOMContentLoaded', function() {
    var numberInputs = document.querySelectorAll('input[type="number"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            if (this.value < 0) this.value = 0;
        });
    });
});