// Global variables
let selectedGalleryType = '';

// Gallery type selection
function selectGalleryType(type) {
    selectedGalleryType = type;
    
    // Update UI
    document.querySelectorAll('.type-option').forEach(option => {
        option.classList.remove('active');
    });
    document.getElementById(type + '-option').classList.add('active');
    
    // Show/hide form sections
    document.querySelectorAll('.form-section').forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(type + '-form-section').classList.add('active');
}

// Image preview function
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Validate file type
        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
        if (!allowedTypes.includes(file.type)) {
            ProductAlert('Only JPG, PNG, and WEBP files are allowed.');
            input.value = '';
            return;
        }
        
        // Validate file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            ProductAlert('File size must be less than 5MB.');
            input.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <div class="text-center">
                    <img src="${e.target.result}" alt="Preview" class="img-fluid" style="max-height: 200px; border-radius: 5px;">
                    <p class="mt-2 text-muted">${file.name}</p>
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
}

// Video preview function
function previewVideo() {
    const videoCode = document.getElementById('VideoCode').value.trim();
    const preview = document.getElementById('video-preview');
    
    if (!videoCode) {
        preview.innerHTML = '';
        return;
    }

    // Extract YouTube video ID
    const videoId = extractYouTubeId(videoCode);

    if (videoId) {
        // Preserve query string (like ?si=xxx)
        let queryString = '';
        if (videoCode.includes('?')) {
            queryString = videoCode.substring(videoCode.indexOf('?'));
        }

        const embedUrl = `https://www.youtube.com/embed/${videoId}${queryString}`;

        preview.innerHTML = `
            <iframe width="100%" height="236px"
                src="${embedUrl}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
            </iframe>
        `;
    } else {
        preview.innerHTML = '<p class="text-danger">Unable to extract video ID. Please check the URL/code.</p>';
    }
}
// Extract YouTube video ID from various formats
function extractYouTubeId(url) {
    const patterns = [
        /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/,
        /youtube\.com\/embed\/([^"&?\/\s]{11})/,
        /youtube\.com\/v\/([^"&?\/\s]{11})/,
        /youtu\.be\/([^"&?\/\s]{11})/
    ];
    
    for (let pattern of patterns) {
        const match = url.match(pattern);
        if (match) {
            return match[1];
        }
    }
    
    return null;
}

// Add Gallery Image
function AddGalleryImage() {
    const title = document.getElementById('ImageTitle').value.trim();
    const imageFile = document.getElementById('GalleryImage').files[0];
    
    if (!title) {
        ProductAlert('Please enter image title');
        return false;
    }
    
    if (!imageFile) {
        ProductAlert('Please select an image file');
        return false;
    }
    
    const formData = new FormData(document.getElementById('gallery_image_form'));
    
    $.ajax({
        url: 'action/gallery-unified-action.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const result = JSON.parse(response);
            ProductAlert(result.message);
            
            if (!result.error) {
                setTimeout(() => {
                    window.location.href = 'view-all-gallery-list.php';
                }, 1500);
            }
        },
        error: function() {
            ProductAlert('An error occurred. Please try again.');
        }
    });
}

// Add Gallery Video
function AddGalleryVideo() {
    const title = document.getElementById('VideoTitle').value.trim();
    const videoCode = document.getElementById('VideoCode').value.trim();
    
    if (!title) {
        ProductAlert('Please enter video title');
        return false;
    }
    
    if (!videoCode) {
        ProductAlert('Please enter YouTube URL or embed code');
        return false;
    }
    
    // Validate YouTube URL/code
    // const videoId = extractYouTubeId(videoCode);
    // if (!videoId) {
    //     ProductAlert('Please enter a valid YouTube URL or embed code');
    //     return false;
    // }
    
    const formData = new FormData(document.getElementById('gallery_video_form'));
    
    $.ajax({
        url: 'action/gallery-unified-action.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const result = JSON.parse(response);
            ProductAlert(result.message);
            
            if (!result.error) {
                setTimeout(() => {
                    window.location.href = 'view-all-gallery-list.php';
                }, 1500);
            }
        },
        error: function() {
            ProductAlert('An error occurred. Please try again.');
        }
    });
}

// Update Gallery Image
function UpdateGalleryImage() {
    const title = document.getElementById('ImageTitle').value.trim();
    
    if (!title) {
        ProductAlert('Please enter image title');
        return false;
    }
    
    const formData = new FormData(document.getElementById('gallery_image_form'));
    
    $.ajax({
        url: 'action/gallery-unified-action.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const result = JSON.parse(response);
            ProductAlert(result.message);
            
            if (!result.error) {
                setTimeout(() => {
                    window.location.href = 'view-all-gallery-list.php';
                }, 1500);
            }
        },
        error: function() {
            ProductAlert('An error occurred. Please try again.');
        }
    });
}

// Update Gallery Video
function UpdateGalleryVideo() {
    const title = document.getElementById('VideoTitle').value.trim();
    const videoCode = document.getElementById('VideoCode').value.trim();
    
    if (!title) {
        ProductAlert('Please enter video title');
        return false;
    }
    
    if (!videoCode) {
        ProductAlert('Please enter YouTube URL or embed code');
        return false;
    }
    
    // Validate YouTube URL/code
    const videoId = extractYouTubeId(videoCode);
    if (!videoId) {
        ProductAlert('Please enter a valid YouTube URL or embed code');
        return false;
    }
    
    const formData = new FormData(document.getElementById('gallery_video_form'));
    
    $.ajax({
        url: 'action/gallery-unified-action.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            const result = JSON.parse(response);
            ProductAlert(result.message);
            
            if (!result.error) {
                setTimeout(() => {
                    window.location.href = 'view-all-gallery-list.php';
                }, 1500);
            }
        },
        error: function() {
            ProductAlert('An error occurred. Please try again.');
        }
    });
}

// DataTables initialization for gallery list
$(document).ready(function() {
    // Images DataTable
    if ($('#all_gallery_images').length) {
        // Destroy existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#all_gallery_images')) {
            $('#all_gallery_images').DataTable().destroy();
        }
        
        $('#all_gallery_images').DataTable({
            processing: true,
            serverSide: true,
            ajax: '../api/gallery/get_images.php',
            columns: [
                { data: 'id', render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: 'image', render: function(data) {
                    return data ? `<img src="../uploads/${data}" width="100" class="rounded">` : 'No Image';
                }},
                { data: 'title' },
                { data: 'action' }
            ],
            order: [[0, 'desc']],
            responsive: false,
            autoWidth: false,
            scrollX: false,
            columnDefs: [
                { width: "8%", targets: 0 },
                { width: "20%", targets: 1 },
                { width: "50%", targets: 2 },
                { width: "22%", targets: 3 }
            ],
            error: function(xhr, error, thrown) {
                console.error('DataTable error:', error, thrown);
                ProductAlert('Error loading gallery images. Please refresh the page.');
            }
        });
    }

    // Videos DataTable
    if ($('#all_gallery_videos').length) {
        // Destroy existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#all_gallery_videos')) {
            $('#all_gallery_videos').DataTable().destroy();
        }
        
        $('#all_gallery_videos').DataTable({
            processing: true,
            serverSide: true,
            ajax: '../api/gallery/get_videos.php',
            columns: [
                { data: 'id', render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }},
                { data: 'thumbnail', render: function(data, type, row) {
                    return data ? `<img src="${data}" width="100" class="rounded">` : 'No Thumbnail';
                }},
                { data: 'title' },
                { data: 'action' }
            ],
            order: [[0, 'desc']],
            responsive: false,
            autoWidth: false,
            scrollX: false,
            columnDefs: [
                { width: "8%", targets: 0 },
                { width: "20%", targets: 1 },
                { width: "50%", targets: 2 },
                { width: "22%", targets: 3 }
            ],
            error: function(xhr, error, thrown) {
                console.error('DataTable error:', error, thrown);
                ProductAlert('Error loading gallery videos. Please refresh the page.');
            }
        });
    }
});

// Delete functions
function DeleteGalleryImage(imageId) {
    alertify.confirm(
        'Delete Gallery Image',
        'Do you really want to delete this image?',
        function() {
            $.post('action/delete-gallery-image.php', { ID: imageId }, function(response) {
                const result = JSON.parse(response);
                ProductAlert(result.message);
                if (!result.error) {
                    setTimeout(() => location.reload(), 1500);
                }
            });
        },
        function() {
            alertify.error('Deletion Cancelled');
        }
    );
}

function DeleteGalleryVideo(videoId) {
    alertify.confirm(
        'Delete Gallery Video',
        'Do you really want to delete this video?',
        function() {
            $.post('action/delete-gallery-video.php', { ID: videoId }, function(response) {
                const result = JSON.parse(response);
                ProductAlert(result.message);
                if (!result.error) {
                    setTimeout(() => location.reload(), 1500);
                }
            });
        },
        function() {
            alertify.error('Deletion Cancelled');
        }
    );
}
