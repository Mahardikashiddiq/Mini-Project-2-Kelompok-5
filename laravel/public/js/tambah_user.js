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

    // Handle form submission
    document.getElementById('saveUserBtn').addEventListener('click', function(e) {
        const form = document.getElementById('addUserForm');
    
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
            form.classList.add('was-validated');
        } else {
            e.preventDefault(); // cegah default klik tombol
            form.classList.add('was-validated');
    
            // Kirim form manual via submit setelah valid
            form.submit();
        }
    });
})();

document.getElementById('editUserForm').addEventListener('submit', function (e) {
    e.preventDefault();
    console.log('Form Submitted');

    const userId = document.getElementById('editUserId').value;

    const formData = new FormData(this);

    formData.append('_method', 'PUT');

    console.log('Sending PUT to:', `/user/${userId}`);
    fetch(`/user/${userId}`, {
        method: 'POST', // gunakan POST dengan _method=PUT jika HTML form biasa
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            Swal.fire('Berhasil!', 'Pengguna diperbarui.', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('editUserModal'));
            modal.hide();
            setTimeout(() => location.reload(), 1000); // Refresh untuk lihat perubahan
        } else {
            Swal.fire('Gagal!', 'Gagal memperbarui data.', 'error');
        }
    });
    
});



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

document.querySelectorAll('.action-btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        
        // Ambil data dari attribute tombol
        const userId = this.getAttribute('data-id');
        const userName = this.getAttribute('data-nama') || '';
        const userEmail = this.getAttribute('data-email') || '';
        const userAddress = this.getAttribute('data-address') || '';
        const userPhone = this.getAttribute('data-phone') || '';
        const userBio = this.getAttribute('data-bio') || '';

        // Isi form modal
        document.getElementById('editUserId').value = userId;
        document.getElementById('editNama').value = userName;
        document.getElementById('editEmail').value = userEmail;
        document.getElementById('editAddress').value = userAddress;
        document.getElementById('editPhone').value = userPhone;
        document.getElementById('editBio').value = userBio;
        document.getElementById('editPassword').value = '';

        // Tampilkan modal
        const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
        modal.show();
    });
});



document.querySelectorAll('.action-btn-delete').forEach(button => {
    button.addEventListener('click', function() {
        const userId = this.getAttribute('data-id');
        const row = this.closest('tr');

        Swal.fire({
            title: 'Hapus Pengguna?',
            text: "Data tidak bisa dikembalikan setelah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f44336',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/user/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        row.remove(); // hapus baris dari tabel
                        Swal.fire('Terhapus!', 'Pengguna telah dihapus.', 'success');
                    } else {
                        Swal.fire('Gagal!', 'Gagal menghapus pengguna.', 'error');
                    }
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