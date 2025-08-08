document.addEventListener('DOMContentLoaded', function () {
    // ✅ Notyf Bildirimleri
    if (window.notyf) {
        if (window.laravelSuccessMessage) {
            window.notyf.open({
                type: 'success',
                message: window.laravelSuccessMessage,
                duration: 3000,
                dismissible: true,
                ripple: true,
                position: { x: 'top', y: 'right' }
            });
        }
        if (window.laravelErrorMessage) {
            window.notyf.open({
                type: 'error',
                message: window.laravelErrorMessage,
                duration: 3000,
                dismissible: true,
                ripple: true,
                position: { x: 'top', y: 'right' }
            });
        }
    }

    // ✅ Görsel Kırpma
    const cropImageElements = document.querySelectorAll('.crop-image');
    const modalImage = document.getElementById('modalImage');
    const cropImageButton = document.getElementById('cropImageButton');
    const cancelCropImageButton = document.getElementById('cancelCropImageButton');
    let dropifyInput = null;
    const modal = new bootstrap.Modal(document.getElementById('imageCropModal'));
    let fileName = null;
    let cropWidth = null;
    let cropHeight = null;
    let cropper;

    cropImageElements.forEach(function (cropImageElement){
        cropImageElement.addEventListener('change', function (event) {
            dropifyInput = event.target;
            cropWidth = dropifyInput.dataset.cropwidth;
            cropHeight = dropifyInput.dataset.cropheight;
            const files = event.target.files;

            if (files && files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('video/')) return;

                const reader = new FileReader();
                reader.onload = function (e) {
                    modalImage.src = e.target.result;
                    modalImage.style.display = 'block';
                    modalImage.style.width = '100%';
                    modalImage.style.maxWidth = '400px';
                    modalImage.style.maxHeight = '400px';
                    modalImage.style.height = 'auto';

                    modal.show();
                    document.getElementById('imageCropModal').addEventListener('shown.bs.modal', function () {
                        if (cropper) cropper.destroy();

                        cropper = new Cropper(modalImage, {
                            aspectRatio: cropWidth / cropHeight,
                            viewMode: 2,
                            responsive: true,
                            cropBoxResizable: false,
                            dragMode: 'move',
                            cropBoxMovable: true,
                            autoCropArea: 1,
                        });
                    });
                };
                reader.readAsDataURL(file);
                fileName = file.name;
            }
        });
    });

    cropImageButton?.addEventListener('click', function () {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({
                width: cropWidth,
                height: cropHeight
            });

            canvas.toBlob(function (blob) {
                const file = new File([blob], fileName, { type: "image/webp" });
                const $dropifyInput = $(dropifyInput);
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);

                const dropifyInstance = $dropifyInput.data('dropify');
                dropifyInstance.resetPreview();
                dropifyInstance.clearElement();
                dropifyInstance.setPreview(true, URL.createObjectURL(file));

                dropifyInput.files = dataTransfer.files;
                $dropifyInput.dropify();

                modal.hide();
            }, 'image/webp');
        }
    });

    cancelCropImageButton?.addEventListener('click', function () {
        const $dropifyInput = $(dropifyInput);
        const dropifyInstance = $dropifyInput.data('dropify');
        dropifyInstance.resetPreview();
        dropifyInstance.clearElement();
        $dropifyInput.dropify();
    });

    // ✅ Form doğrulama (mainForm)
    const submitButton = document.querySelector('#mainForm button[type="submit"]');
    submitButton?.addEventListener('click', function (event) {
        const requiredFields = document.querySelectorAll('#mainForm [required]');
        let isValid = true;

        requiredFields.forEach(field => {
            const label = field.closest('.form-group')?.querySelector('label');
            const fieldName = label ? label.innerText.trim() : 'Bu alan';
            if (!field.value.trim()) {
                isValid = false;
                window.notyf.open({
                    type: 'error',
                    message: `${fieldName} zorunludur.`,
                    duration: 3000,
                    dismissible: true,
                    ripple: true,
                    position: { x: 'top', y: 'right' }
                });
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if (!isValid) event.preventDefault();
    });

});

function checkBeforeDelete(id){
    const form = document.querySelector('.delete-item-form[data-id="' + id + '"]');

    Swal.fire({
        title: 'Emin misiniz?',
        text: "Bu işlem geri alınamaz!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Evet, Sil!',
        cancelButtonText: 'İptal',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
    }).then(function (result) {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
