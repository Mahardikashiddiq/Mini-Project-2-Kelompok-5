// Initialize DataTable
$(document).ready(function() {
    $('#usersTable').DataTable({
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ entri",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
            infoFiltered: "(disaring dari _MAX_ total entri)",
            zeroRecords: "Tidak ada data yang cocok",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        },
        responsive: true,
        columnDefs: [
            { orderable: false, targets: 5 }
        ]
    });
});

// Sidebar Toggle
document.getElementById('sidebarToggle').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('expanded');
});

// Responsive Sidebar for Mobile
window.addEventListener('resize', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    
    if (window.innerWidth < 992) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
    } else {
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('expanded');
    }
});

// Toggle permissions section based on role
document.getElementById('role').addEventListener('change', function() {
    const permissionsSection = document.getElementById('permissionsSection');
    if (this.value === 'admin') {
        permissionsSection.style.display = 'block';
    } else {
        permissionsSection.style.display = 'none';
    }
});

// Avatar preview
document.getElementById('avatarUpload').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewAvatar').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// Form validation
(() => {
    'use strict';
    
    const form = document.getElementById('addUserForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    
    // Check if passwords match
    confirmPassword.addEventListener('input', function() {
        if (this.value !== password.value) {
            this.setCustomValidity('Password tidak cocok');
        } else {
            this.setCustomValidity('');
        }
    });
    
    // Handle form submission
    document.getElementById('saveUserBtn').addEventListener('click', function() {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
        } else {
            // Simulate successful form submission
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
            
            // Show success message
            Swal.fire({
                icon: 'success',
                title: 'Pengguna Berhasil Ditambahkan!',
                text: 'Pengguna baru telah berhasil ditambahkan ke sistem.',
                confirmButtonColor: '#4361ee'
            }).then((result) => {
                // Refresh the table (in a real application, you would add the user to the table)
                refreshUserTable();
            });
        }
    });
})();

// Initialize charts
document.addEventListener('DOMContentLoaded', function() {
    // User Growth Chart
    const growthCtx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(growthCtx, {
        type: 'line',
        data: {
            labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
            datasets: [
                {
                    label: 'Total Pengguna',
                    data: [7200, 7450, 7680, 7850, 8100, 8249],
                    borderColor: '#4361ee',
                    backgroundColor: 'rgba(67, 97, 238, 0.1)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Pengguna Baru',
                    data: [125, 250, 230, 170, 250, 142],
                    borderColor: '#ff9800',
                    borderDash: [5, 5],
                    tension: 0.3,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                    grid: {
                        display: true,
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    }
                }
            }
        }
    });
    
    // User Distribution Chart
    const distributionCtx = document.getElementById('userDistributionChart').getContext('2d');
    const userDistributionChart = new Chart(distributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Pelanggan', 'Penjual', 'Admin'],
            datasets: [{
                data: [65, 32, 3],
                backgroundColor: [
                    '#03a9f4',
                    '#4caf50',
                    '#f44336'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});

// Action buttons functionality
const viewButtons = document.querySelectorAll('.action-btn-view');
const editButtons = document.querySelectorAll('.action-btn-edit');
const deleteButtons = document.querySelectorAll('.action-btn-delete');

viewButtons.forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const userName = row.querySelector('.user-name').textContent;
        
        Swal.fire({
            title: 'Detail Pengguna',
            html: `<div class="text-start">
                <div class="d-flex justify-content-center mb-3">
                    <img src="${row.querySelector('.user-avatar').src}" class="rounded-circle" width="100" height="100">
                </div>
                <p><strong>Nama:</strong> ${userName}</p>
                <p><strong>Email:</strong> ${row.querySelector('.user-email').textContent}</p>
                <p><strong>Role:</strong> ${row.querySelector('.role-badge').textContent.trim()}</p>
                <p><strong>Status:</strong> ${row.cells[2].textContent.trim()}</p>
                <p><strong>Tanggal Bergabung:</strong> ${row.cells[3].textContent}</p>
                <p><strong>Jumlah Produk:</strong> ${row.cells[4].textContent}</p>
            </div>`,
            confirmButtonColor: '#4361ee'
        });
    });
});

editButtons.forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const userName = row.querySelector('.user-name').textContent;
        
        Swal.fire({
            title: `Edit Pengguna: ${userName}`,
            text: 'Fitur edit pengguna akan ditampilkan di sini.',
            icon: 'info',
            confirmButtonColor: '#4361ee'
        });
    });
});

deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        const row = this.closest('tr');
        const userName = row.querySelector('.user-name').textContent;
        
        Swal.fire({
            title: 'Hapus Pengguna?',
            text: `Anda yakin ingin menghapus pengguna "${userName}"? Tindakan ini tidak dapat dibatalkan.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f44336',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Simulate deletion
                row.classList.add('animate__animated', 'animate__fadeOut');
                setTimeout(() => {
                    row.remove();
                }, 500);
                
                Swal.fire({
                    title: 'Terhapus!',
                    text: `Pengguna "${userName}" telah dihapus.`,
                    icon: 'success',
                    confirmButtonColor: '#4361ee'
                });
            }
        });
    });
});

// Simulate adding a new user to the table
function refreshUserTable() {
    const table = $('#usersTable').DataTable();
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const role = document.getElementById('role').value;
    const fullName = `${firstName} ${lastName}`;
    
    // Get today's date in format DD MMM YYYY
    const today = new Date();
    const options = { day: '2-digit', month: 'short', year: 'numeric' };
    const dateStr = today.toLocaleDateString('id-ID', options);
    
    // Determine role badge class and icon
    let roleBadgeClass, roleIcon, roleText;
    switch(role) {
        case 'admin':
            roleBadgeClass = 'role-admin';
            roleIcon = 'shield-alt';
            roleText = 'Admin';
            break;
        case 'seller':
            roleBadgeClass = 'role-seller';
            roleIcon = 'store';
            roleText = 'Penjual';
            break;
        default:
            roleBadgeClass = 'role-customer';
            roleIcon = 'user';
            roleText = 'Pelanggan';
    }
    
    // Create new row
    const newRow = table.row.add([
        `<div class="user-info">
            <img src="${document.getElementById('previewAvatar').src}" alt="User" class="user-avatar">
            <div>
                <h6 class="user-name">${fullName}</h6>
                <p class="user-email">${email}</p>
            </div>
        </div>`,
        `<span class="role-badge ${roleBadgeClass}"><i class="fas fa-${roleIcon} me-1"></i> ${roleText}</span>`,
        `<span class="status-indicator status-active"></span> Aktif`,
        dateStr,
        '0',
        `<div class="table-actions">
            <button class="action-btn action-btn-view" title="Lihat Detail">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-btn action-btn-edit" title="Edit Pengguna">
                <i class="fas fa-edit"></i>
            </button>
            <button class="action-btn action-btn-delete" title="Hapus Pengguna">
                <i class="fas fa-trash"></i>
            </button>
        </div>`
    ]).draw(false).node();
    
    // Add highlight effect to new row
    $(newRow).addClass('animate__animated animate__fadeIn');
    
    // Reset form
    document.getElementById('addUserForm').reset();
    document.getElementById('previewAvatar').src = 'https://via.placeholder.com/150x150/e0e0e0/9e9e9e?text=User';
}