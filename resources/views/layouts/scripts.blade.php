<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    function initImageUpload(previewId, dropAreaId, inputId, initialFiles = []) {
        const preview = document.getElementById(previewId);
        const dropArea = document.getElementById(dropAreaId);
        const fileInput = document.getElementById(inputId);

        // Tampilkan foto lama (jika ada)
        if (initialFiles.length > 0) {
            preview.innerHTML = "";
            initialFiles.forEach(fileUrl => addPreview(preview, fileInput, fileUrl, true));
        }

        // Klik drop area → buka file picker
        dropArea.addEventListener("click", () => fileInput.click());

        // Saat pilih file manual
        fileInput.addEventListener("change", (e) => handleFiles(e.target.files, preview, fileInput));

        // Drag & drop
        ["dragover", "dragleave", "drop"].forEach(evt => {
            dropArea.addEventListener(evt, e => e.preventDefault());
        });

        dropArea.addEventListener("dragover", () => dropArea.classList.add("bg-light"));
        dropArea.addEventListener("dragleave", () => dropArea.classList.remove("bg-light"));
        dropArea.addEventListener("drop", (e) => {
            dropArea.classList.remove("bg-light");
            handleFiles(e.dataTransfer.files, preview, fileInput);
        });
    }

    function handleFiles(files, preview, fileInput) {
        if (!files || !files.length) return;

        const dataTransfer = new DataTransfer();

        // Gabungkan file lama (kalau ada)
        Array.from(fileInput.files).forEach(f => dataTransfer.items.add(f));

        // Tambahkan file baru
        Array.from(files).forEach(file => {
            if (file.type.startsWith("image/")) {
                dataTransfer.items.add(file);
                addPreview(preview, fileInput, file);
            }
        });

        fileInput.files = dataTransfer.files;
    }

    function addPreview(preview, fileInput, fileOrUrl, isOld = false) {
        const col = document.createElement("div");
        col.className = "col-md-6 col-6 d-flex justify-content-center position-relative";

        const imgSrc = isOld ? fileOrUrl : URL.createObjectURL(fileOrUrl);
        const fileName = isOld ? fileOrUrl.split('/').pop() : fileOrUrl.name;

        col.innerHTML = `
            <div class="card shadow-sm overflow-hidden" style="max-width: 300px; position: relative;">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-1" aria-label="Close"></button>
                <img src="${imgSrc}" class="img-fluid" alt="preview">
                <div class="card-body p-2 text-center">
                    <small class="text-truncate d-block" title="${fileName}">
                        ${fileName}
                    </small>
                </div>
            </div>
        `;

        // Tombol hapus
        col.querySelector(".btn-close").addEventListener("click", () => {
            col.remove();

            if (isOld) {
                // tandai file lama dihapus
                const hidden = document.createElement("input");
                hidden.type = "hidden";
                hidden.name = `remove_${fileInput.name}[]`;
                hidden.value = fileName;
                fileInput.form.appendChild(hidden);
            } else {
                // Hapus file baru dari DataTransfer
                const dt = new DataTransfer();
                Array.from(fileInput.files).forEach(f => {
                    if (f.name !== fileOrUrl.name) dt.items.add(f);
                });
                fileInput.files = dt.files;
            }
        });

        preview.appendChild(col);
    }

</script>