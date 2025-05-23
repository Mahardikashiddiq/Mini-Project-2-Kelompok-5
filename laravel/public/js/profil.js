// Enable tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
            
    // Edit Profile Modal
    const editProfileBtn = document.querySelector('.btn-primary');
    editProfileBtn.addEventListener('click', function() {
        showEditProfileModal();
    });
            
    // Add animations to product cards
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.1)';
        });
                
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.05)';
        });
    });

    function showEditProfileModal() {
        // Create modal dynamically
        const modalHTML = `
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editProfileForm">
                            <div class="text-center mb-4">
                                <img src="${document.getElementById('profileAvatar').src}" alt="Profile Picture" class="rounded-circle" width="100" height="100">
                                <div class="mt-2">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Ubah Foto</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="profileNameInput" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="profileNameInput" value="${document.getElementById('profileName').textContent}">
                            </div>
                            <div class="mb-3">
                                <label for="profileLocationInput" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="profileLocationInput" value="Jakarta, Indonesia">
                            </div>
                            <div class="mb-3">
                                <label for="profileBioInput" class="form-label">Bio</label>
                                <textarea class="form-control" id="profileBioInput" rows="3">${document.getElementById('profileBio').textContent}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="profileEmailInput" class="form-label">Email</label>
                                <input type="email" class="form-control" id="profileEmailInput" value="ahmad.zakaria@email.com">
                            </div>
                            <div class="mb-3">
                                <label for="profilePhoneInput" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="profilePhoneInput" value="+62 812 3456 7890">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="saveProfile()">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
        </div>
    `;
        // Append modal to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);
            
        // Show modal
        const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
        editProfileModal.show();
    
        // Remove modal from DOM after it's hidden
        document.getElementById('editProfileModal').addEventListener('hidden.bs.modal', function() {
            this.remove();
        });
    }

    function showNotification(message) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 m-3';
        notification.setAttribute('role', 'alert');
        notification.setAttribute('aria-live', 'assertive');
        notification.setAttribute('aria-atomic', 'true');
        
        notification.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-check-circle me-2"></i> ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        `;
        
        // Append to body
        document.body.appendChild(notification);
        
        // Show notification
        const toast = new bootstrap.Toast(notification, { delay: 3000 });
        toast.show();
        
        // Remove from DOM after hidden
        notification.addEventListener('hidden.bs.toast', function() {
            this.remove();
        });
    }

       // Initialize AOS
       AOS.init({
        duration: 800,
        once: true
    });

    // Enable tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Handle profile image upload preview
    document.getElementById('profileImageInput').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('previewProfileImage').src = e.target.result;
            }
            
            reader.readAsDataURL(file);
        }
    });

    // Handle profile image upload from navbar button
    document.getElementById('profile-pic-input').addEventListener('change', function(e) {
        if (e.target.files.length > 0) {
            const file = e.target.files[0];
            const reader = new FileReader();
            
            reader.onload = function(e) {
                document.getElementById('profileAvatar').src = e.target.result;
                // Also update the preview in the edit modal if it's open
                const previewImg = document.getElementById('previewProfileImage');
                if (previewImg) {
                    previewImg.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(file);
            
            // Show success notification
            Swal.fire({
                title: 'Sukses!',
                text: 'Foto profil berhasil diperbarui',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});

// Save profile changes
function saveProfile() {
    const form = document.getElementById('editProfileForm');
    const formData = new FormData(form);

    const fileInput = document.getElementById('profileImageInput');
    if (fileInput.files.length > 0) {
        formData.append('profile_picture', fileInput.files[0]);
    }

    fetch('/profil', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            alert("Profil berhasil diperbarui!");
            location.reload();
        } else {
            console.log(result.errors);
            alert("Gagal update profil: " + (result.message || 'Terjadi kesalahan.'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Terjadi kesalahan saat mengirim data.");
    });
}

// Submit new product
function submitProduct() {
    // Here would typically be form validation and AJAX submission
    // For demo, we'll just show a success message
    
    Swal.fire({
        title: 'Memproses...',
        html: 'Mohon tunggu sebentar.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Simulate server processing
    setTimeout(() => {
        Swal.fire({
            title: 'Sukses!',
            text: 'Produk baru berhasil ditambahkan',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addProductModal'));
            modal.hide();
            
            // Reset form
            document.getElementById('addProductForm').reset();
            document.getElementById('preview-container').innerHTML = '';
            document.getElementById('file-preview').innerHTML = '';
        });
    }, 2000);
}
        