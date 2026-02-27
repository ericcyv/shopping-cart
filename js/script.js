// ============================================
// Shopping Cart - JavaScript
// ============================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile Menu Toggle
    const menuBtn = document.getElementById('menu-btn');
    const navbar = document.getElementById('navbar');
    
    if (menuBtn && navbar) {
        menuBtn.addEventListener('click', function() {
            navbar.classList.toggle('active');
            
            // Toggle icon
            if (navbar.classList.contains('active')) {
                menuBtn.classList.remove('fa-bars');
                menuBtn.classList.add('fa-times');
            } else {
                menuBtn.classList.remove('fa-times');
                menuBtn.classList.add('fa-bars');
            }
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!menuBtn.contains(e.target) && !navbar.contains(e.target)) {
                navbar.classList.remove('active');
                menuBtn.classList.remove('fa-times');
                menuBtn.classList.add('fa-bars');
            }
        });
    }
    
    // Auto-hide messages after 5 seconds
    const messages = document.querySelectorAll('.display_message');
    messages.forEach(function(msg) {
        setTimeout(function() {
            msg.style.opacity = '0';
            msg.style.transform = 'translateY(-10px)';
            setTimeout(function() {
                msg.style.display = 'none';
            }, 300);
        }, 5000);
    });
    
    // Add to cart animation
    const cartBtns = document.querySelectorAll('.cart_btn');
    cartBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            btn.value = 'Adding...';
            btn.style.opacity = '0.7';
        });
    });
    
    // Quantity input validation
    const quantityInputs = document.querySelectorAll('.quantity_box input[type="number"]');
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            if (this.value < 1) {
                this.value = 1;
            }
        });
    });
    
});
