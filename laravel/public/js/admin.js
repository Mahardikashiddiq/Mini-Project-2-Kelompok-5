// SIDEBAR
const menuItems = document.querySelectorAll('.menu-item');
const notificationsPopup = document.querySelector('.notifications-popup');
const notificationsItem = document.getElementById('notifications'); // Ambil menu "notifications"

// Fungsi untuk menghapus class "active" dari semua menu, kecuali menu "notifications"
const changeActiveItem = () => {
    menuItems.forEach(item => {
        if (item.id !== 'notifications') { // Jangan hapus "active" dari notifications
            item.classList.remove('active');
        }
    });
};

menuItems.forEach(item => {
    item.addEventListener('click', () => {
        if (item.id === 'notifications') {
            // Toggle tampilan notifikasi
            if (notificationsPopup.style.display === 'block') {
                notificationsPopup.style.display = 'none';
                notificationsItem.classList.remove('active'); // Hapus active dari notifications jika ditutup
            } else {
                notificationsPopup.style.display = 'block';
                notificationsItem.classList.add('active'); // Tambahkan active ke notifications jika dibuka
            }
        } else {
            // Jika menu lain diklik, update sidebar yang aktif
            changeActiveItem();
            item.classList.add('active');
            notificationsPopup.style.display = 'none'; // Sembunyikan notifikasi jika menu lain diklik
            notificationsItem.classList.remove('active'); // Pastikan notifications tidak aktif saat menu lain diklik
        }
    });
});

// Category pada dashboard
const categories = document.querySelectorAll('.right .all .category h6');

categories.forEach(category => {
    category.addEventListener('click', () => {
        // Menghapus kelas 'active' dari semua h6
        categories.forEach(item => item.classList.remove('active'));

        // Menambahkan kelas 'active' ke elemen yang diklik
        category.classList.add('active');
    });
});


// Efek Cahaya
document.querySelectorAll('.template').forEach(template => {
    template.addEventListener('mouseenter', function() {
        this.style.boxShadow = '0 0 30px rgba(16, 47, 90, 0.8)'; // Warna #102F5A dalam RGBA
        this.style.transform = 'scale(1.05)'; // Sedikit membesar untuk efek dramatis
    });

    template.addEventListener('mouseleave', function() {
        this.style.boxShadow = 'none';
        this.style.transform = 'scale(1)';
    });
});

// ====================================================== TRANSACTION ================================================================

// Contoh data transaksi (dalam aplikasi nyata, ini akan berasal dari API)
const transactionsData = [
    {
        id: "TRX-10024568",
        customer: {
            id: "CUST-1254",
            name: "Anisa",
            email: "johndoe@example.com",
            phone: "+1234567890"
        },
        date: new Date(2025, 2, 20), // March 20, 2025
        amount: 155.99,
        paymentMethod: "Credit Card",
        card: {
            type: "Visa",
            lastFour: "4242"
        },
        status: "paid",
        items: [
            { name: "Product A", quantity: 2, price: 49.99 },
            { name: "Product B", quantity: 1, price: 59.99 }
        ]
    },
    {
        id: "TRX-10024567",
        customer: {
            id: "CUST-5632",
            name: "Dian",
            email: "janesmith@example.com",
            phone: "+1987654321"
        },
        date: new Date(2025, 2, 20), // March 20, 2025
        amount: 89.95,
        paymentMethod: "Bank Transfer",
        bank: {
            name: "Bank of America",
            reference: "REF-123456"
        },
        status: "pending",
        items: [
            { name: "Product C", quantity: 1, price: 89.95 }
        ]
    },
    {
        id: "TRX-10024566",
        customer: {
            id: "CUST-9876",
            name: "Mahardika",
            email: "robert@example.com",
            phone: "+1122334455"
        },
        date: new Date(2025, 2, 19), // March 19, 2025
        amount: 245.50,
        paymentMethod: "E-Wallet",
        wallet: {
            provider: "PayPal",
            email: "robert@example.com"
        },
        status: "paid",
        items: [
            { name: "Product D", quantity: 1, price: 199.50 },
            { name: "Product E", quantity: 1, price: 46.00 }
        ]
    },
    {
        id: "TRX-10024565",
        customer: {
            id: "CUST-5423",
            name: "Riyan",
            email: "michael@example.com",
            phone: "+1564738291"
        },
        date: new Date(2025, 2, 19), // March 19, 2025
        amount: 124.75,
        paymentMethod: "Credit Card",
        card: {
            type: "Mastercard",
            lastFour: "9876"
        },
        status: "failed",
        items: [
            { name: "Product F", quantity: 1, price: 124.75 }
        ]
    },
];

// Elemen DOM
const transactionTableBody = document.getElementById('transactionTableBody');
const searchInput = document.querySelector('.filter-input');
const statusFilter = document.querySelectorAll('.filter-select')[0];
const paymentMethodFilter = document.querySelectorAll('.filter-select')[1];
const fromDateFilter = document.querySelectorAll('.filter-input')[1];
const toDateFilter = document.querySelectorAll('.filter-input')[2];
const applyFilterBtn = document.querySelector('.filter-section .btn-primary');
const refreshBtn = document.getElementById('refreshBtn');
const exportBtn = document.getElementById('exportBtn');


// Inisialisasi modal detail transaksi
const transactionModal = document.getElementById('transactionModal');
const transactionDetailsBody = document.getElementById('transactionDetailsBody');
const closeModalBtn = document.getElementById('closeModalBtn');
const updateStatusBtn = document.getElementById('updateStatusBtn');
const closeModalButtons = document.querySelectorAll('.close-modal');


// Inisialisasi modal status pembaruan
const updateStatusModal = document.getElementById('updateStatusModal');
const updateTransactionId = document.getElementById('updateTransactionId');
const currentStatus = document.getElementById('currentStatus');
const newStatus = document.getElementById('newStatus');
const updateReason = document.getElementById('updateReason');
const cancelUpdateBtn = document.getElementById('cancelUpdateBtn');
const confirmUpdateBtn = document.getElementById('confirmUpdateBtn');

// Filter transaksi
let filters = {
    search: '',
    status: '',
    paymentMethod: '',
    fromDate: null,
    toDate: null
};

function formatDate(date) {
    return date.toISOString().split('T')[0];
}

function formatDateForDisplay(date) {
    return date.toLocaleDateString('id-ID', { 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric' 
    });
}

function formatCurrency(amount) {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD'
    }).format(amount);
}

function renderTransactions(transactions) {
    transactionTableBody.innerHTML = '';
    
    if (transactions.length === 0) {
        const emptyRow = document.createElement('tr');
        emptyRow.innerHTML = `<td colspan="7" class="text-center">No transactions found</td>`;
        transactionTableBody.appendChild(emptyRow);
        return;
    }

    transactions.forEach(transaction => {
        const row = document.createElement('tr');

        if (transaction.status === 'pending') {
            row.classList.add('pending-row');
        } else if (transaction.status === 'failed') {
            row.classList.add('failed-row');
        }
        
        row.innerHTML = `
            <td>${transaction.id}</td>
            <td>${transaction.customer.name}</td>
            <td>${formatDateForDisplay(transaction.date)}</td>
            <td>${formatCurrency(transaction.amount)}</td>
            <td>${transaction.paymentMethod}</td>
            <td>
                <span class="status-badge status-${transaction.status}">
                    ${transaction.status}
                </span>
            </td>
            <td>
                <button class="action-btn view-btn" data-id="${transaction.id}">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="action-btn edit-btn" data-id="${transaction.id}">
                    <i class="fas fa-edit"></i>
                </button>
            </td>
        `;
        
        transactionTableBody.appendChild(row);
    });

    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', () => openTransactionModal(btn.dataset.id));
    });

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => openUpdateStatusModal(btn.dataset.id));
    });
}

// Filter transaksi berdasarkan filter saat ini
function filterTransactions() {
    let filteredTransactions = [...transactionsData];

    if (filters.search) {
        const searchTerm = filters.search.toLowerCase();
        filteredTransactions = filteredTransactions.filter(transaction => 
            transaction.id.toLowerCase().includes(searchTerm) || 
            transaction.customer.name.toLowerCase().includes(searchTerm) ||
            transaction.customer.email.toLowerCase().includes(searchTerm)
        );
    }

    if (filters.status) {
        filteredTransactions = filteredTransactions.filter(transaction => 
            transaction.status === filters.status
        );
    }

    if (filters.paymentMethod) {
        let paymentMethod = '';
        
        switch (filters.paymentMethod) {
            case 'credit_card':
                paymentMethod = 'Credit Card';
                break;
            case 'bank_transfer':
                paymentMethod = 'Bank Transfer';
                break;
            case 'e-wallet':
                paymentMethod = 'E-Wallet';
                break;
        }
        
        filteredTransactions = filteredTransactions.filter(transaction => 
            transaction.paymentMethod === paymentMethod
        );
    }

    if (filters.fromDate) {
        const fromDate = new Date(filters.fromDate);
        fromDate.setHours(0, 0, 0, 0);
        filteredTransactions = filteredTransactions.filter(transaction => 
            transaction.date >= fromDate
        );
    }

    if (filters.toDate) {
        const toDate = new Date(filters.toDate);
        toDate.setHours(23, 59, 59, 999);
        filteredTransactions = filteredTransactions.filter(transaction => 
            transaction.date <= toDate
        );
    }

    return filteredTransactions;
}

// Menerapkan filter dan render transaksi
function applyFilters() {
    const filteredTransactions = filterTransactions();
    renderTransactions(filteredTransactions);

    document.querySelector('.section-title').textContent = 
        `Transaction List (${filteredTransactions.length} of ${transactionsData.length})`;
}

function findTransactionById(id) {
    return transactionsData.find(transaction => transaction.id === id);
}

function openTransactionModal(transactionId) {
    const transaction = findTransactionById(transactionId);
    
    if (!transaction) return;
    
    transactionDetailsBody.innerHTML = `
        <div class="transaction-details">
            <div class="detail-item">
                <div class="detail-label">Transaction ID</div>
                <div class="detail-value">${transaction.id}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Date</div>
                <div class="detail-value">${formatDateForDisplay(transaction.date)}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Status</div>
                <div class="detail-value">
                    <span class="status-badge status-${transaction.status}">${transaction.status}</span>
                </div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Amount</div>
                <div class="detail-value">${formatCurrency(transaction.amount)}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Customer</div>
                <div class="detail-value">${transaction.customer.name}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Email</div>
                <div class="detail-value">${transaction.customer.email}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Phone</div>
                <div class="detail-value">${transaction.customer.phone}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Payment Method</div>
                <div class="detail-value">${transaction.paymentMethod}</div>
            </div>
        </div>
        
        <h4 style="margin-top: 20px;">Items</h4>
        <table class="transactions-table" style="margin-top: 10px;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                ${transaction.items.map(item => `
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.quantity}</td>
                        <td>${formatCurrency(item.price)}</td>
                        <td>${formatCurrency(item.price * item.quantity)}</td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;
    
    transactionModal.style.display = 'flex';
}

// Buka modal status pembaruan
function openUpdateStatusModal(transactionId) {
    const transaction = findTransactionById(transactionId);
    
    if (!transaction) return;
    
    updateTransactionId.value = transaction.id;
    currentStatus.value = transaction.status;
    newStatus.value = transaction.status;
    updateReason.value = '';
    
    updateStatusModal.style.display = 'flex';
}

function closeModals() {
    transactionModal.style.display = 'none';
    updateStatusModal.style.display = 'none';
}

function confirmStatusUpdate() {
    const transactionId = updateTransactionId.value;
    const selectedStatus = newStatus.value;
    const transaction = findTransactionById(transactionId);
    
    if (!transaction) return;

    transaction.status = selectedStatus;
    closeModals();
    applyFilters();
    alert(`Transaction ${transactionId} status updated to ${selectedStatus}`);
}

function setupEventListeners() {
    searchInput.addEventListener('input', () => {
        filters.search = searchInput.value.trim();
    });
    
    applyFilterBtn.addEventListener('click', () => {
        filters.status = statusFilter.value;
        filters.paymentMethod = paymentMethodFilter.value;
        filters.fromDate = fromDateFilter.value ? fromDateFilter.value : null;
        filters.toDate = toDateFilter.value ? toDateFilter.value : null;
        applyFilters();
    });
    
    refreshBtn.addEventListener('click', () => {
        searchInput.value = '';
        statusFilter.value = '';
        paymentMethodFilter.value = '';
        fromDateFilter.value = '';
        toDateFilter.value = '';
        
        filters = {
            search: '',
            status: '',
            paymentMethod: '',
            fromDate: null,
            toDate: null
        };
        
        applyFilters();
    });
    
    exportBtn.addEventListener('click', () => {
        alert('Export functionality would be implemented here');
    });
    
    closeModalButtons.forEach(btn => {
        btn.addEventListener('click', closeModals);
    });
    
    closeModalBtn.addEventListener('click', closeModals);
    updateStatusBtn.addEventListener('click', () => {
        const transactionId = transactionDetailsBody.querySelector('.detail-value').textContent;
        closeModals();
        openUpdateStatusModal(transactionId);
    });
    
    cancelUpdateBtn.addEventListener('click', closeModals);
    confirmUpdateBtn.addEventListener('click', confirmStatusUpdate);
    window.addEventListener('click', (e) => {
        if (e.target === transactionModal || e.target === updateStatusModal) {
            closeModals();
        }
    });

    const today = new Date();
    const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
    fromDateFilter.value = formatDate(firstDay);
    toDateFilter.value = formatDate(today);
}

function initPage() {
    setupEventListeners();
    renderTransactions(transactionsData);
}

document.addEventListener('DOMContentLoaded', initPage);
