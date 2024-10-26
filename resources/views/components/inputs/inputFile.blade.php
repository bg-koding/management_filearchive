<div class="input-file-upload">
    <div class="previewFiles"></div>
    <div class="box-input" id="drop-area">
        <div class="icons">
            <i class="bi bi-file-earmark-arrow-up"></i>
            <span>Drag & Drop File here</span>
        </div>
        <input type="file" name="{{ $name  }}" id="inputFile">
    </div>
    <div class="progress-box-bar">
        <span class="progress"></span>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $('#inputFile').on('change', function (event) {
            const files = event.target.files;
            previewFiles(files); // Panggil fungsi previewFiles
            animateProgressBar(); // Panggil fungsi untuk animasi progress bar
        });

        const dropArea = $('#drop-area');

        dropArea.on('dragover', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).addClass('dragging');
        });

        dropArea.on('dragleave', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).removeClass('dragging');
        });

        dropArea.on('drop', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).removeClass('dragging');

            const files = event.originalEvent.dataTransfer.files;
            previewFiles(files); // Panggil fungsi previewFiles
            animateProgressBar(); // Panggil fungsi untuk animasi progress bar
        });

        function previewFiles(files) {
            const previewContainer = $('.previewFiles');
            previewContainer.empty(); // Kosongkan pratinjau sebelumnya

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                // Tampilkan pratinjau untuk gambar
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = $('<img>').attr('src', e.target.result).addClass('preview-image');
                        previewContainer.append(img);
                    };
                    reader.readAsDataURL(file);
                } else if (file && file.type === 'application/pdf') {
                    const link = $('<a>').attr('href', URL.createObjectURL(file))
                                         .attr('target', '_blank')
                                         .text(file.name)
                                         .addClass('pdf-link');
                    previewContainer.append(link);
                }
            }
        }

        function animateProgressBar() {
            const progressBar = $('.progress');
            let width = 0;

            // Reset progress bar
            progressBar.css('width', '0%');

            const interval = setInterval(function () {
                if (width >= 100) {
                    clearInterval(interval); // Hentikan animasi jika mencapai 100%
                } else {
                    width++;
                    progressBar.css('width', width + '%'); // Perbarui lebar progress bar
                }
            }, 50); // Ubah kecepatan animasi sesuai kebutuhan
        }
    });
    </script>
@endpush
