// SIDEBAR
const menuItems = document.querySelectorAll('.menu-item');

// Remove active class from all menu items
const changeActiveItem = () => {
    menuItems.forEach(item => {
        item.classList.remove('active');
    });
};

// Handle sidebar menu item clicks
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        changeActiveItem();
        item.classList.add('active');
        
        // Handle notifications popup
        if(item.id != 'notifications'){
            document.querySelector('.notifications-popup').style.display = 'none';
        } else{
            document.querySelector('.notifications-popup').style.display = 'block';
        }
    });
});

// Add interaction to product elements
document.addEventListener('DOMContentLoaded', function() {
    // Handle Add to Cart buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart button');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Get product details from the parent product div
            const productElement = this.closest('.product');
            const productName = productElement.querySelector('.info h3').textContent;
            const productPrice = productElement.querySelector('.price h3').textContent;
            
            // Show a simple confirmation
            alert(`Added ${productName} (${productPrice}) to your cart!`);
        });
    });

    // Handle like buttons
    const likeButtons = document.querySelectorAll('.interaction-btn span:first-child');
    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Toggle liked state (could be enhanced with actual like functionality)
            this.classList.toggle('liked');
        });
    });

    // Handle bookmark buttons
    const bookmarkButtons = document.querySelectorAll('.bookmark span');
    bookmarkButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Toggle bookmarked state
            this.classList.toggle('bookmarked');
            alert('Added to your wishlist!');
        });
    });
    
    // Handle share buttons
    const shareButtons = document.querySelectorAll('.interaction-btn span:nth-child(3)');
    shareButtons.forEach(button => {
        button.addEventListener('click', function() {
            alert('Share this product with your friends!');
        });
    });
    
    // Handle cart removal
    const removeButtons = document.querySelectorAll('.remove-item');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const orderItem = this.parentElement;
            orderItem.style.animation = 'fadeOut 0.3s forwards';
            
            // Remove after animation completes
            setTimeout(() => {
                orderItem.remove();
                updateCartTotal();
            }, 300);
        });
    });
    
    // Handle category tabs
    const categoryTabs = document.querySelectorAll('.category h6');
    categoryTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            document.querySelectorAll('.category h6').forEach(t => {
                t.classList.remove('active');
            });
            
            // Add active class to clicked tab
            this.classList.add('active');
        });
    });
    
    // Handle checkout button
    const checkoutButton = document.querySelector('.order-total button');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            alert('Proceeding to checkout!');
        });
    }
    
    // Handle product category clicks
    const templateCategories = document.querySelectorAll('.templates .template');
    templateCategories.forEach(category => {
        category.addEventListener('click', function() {
            const categoryName = this.querySelector('.logo').textContent;
            alert(`Browsing ${categoryName} category`);
        });
    });
});

// Helper function to update cart total
function updateCartTotal() {
    // This would calculate the new total based on remaining items
    // For now we'll just show a message
    console.log('Cart updated');
}

// Add a simple animation effect when the page loads
window.addEventListener('load', function() {
    // Fade in products with a slight delay between each
    const products = document.querySelectorAll('.product');
    products.forEach((product, index) => {
        setTimeout(() => {
            product.style.opacity = '1';
        }, 100 * index);
    });
});

// Add CSS for animations
const styleSheet = document.createElement('style');
styleSheet.textContent = `
    @keyframes fadeOut {
        from { opacity: 1; transform: translateX(0); }
        to { opacity: 0; transform: translateX(-20px); }
    }
    
    .product {
        opacity: 0;
        transition: opacity 0.5s ease;
    }
    
    .interaction-btn span.liked img {
        filter: hue-rotate(280deg);
    }
    
    .bookmark span.bookmarked img {
        filter: hue-rotate(200deg);
    }
`;
document.head.appendChild(styleSheet);