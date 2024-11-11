<!-- Custom File Upload with Inline Preview and Remove Button -->
<div id="uploadContainer" class="relative flex items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-zinc-500 hover:bg-gray-50 overflow-hidden">
    <!-- Hidden File Input -->
    <input id="logo" type="file" name="logo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" required onchange="showPreview(event)">

    <!-- Default Content (Icon and Text) -->
    <div id="defaultContent" class="text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18M13 8v4M17 4l-4 4-4-4"></path>
        </svg>
        <p class="mt-2 text-sm text-gray-600">
            Click to upload or drag and drop
        </p>
    </div>

    <!-- Preview Image with Overlay -->
    <div id="previewContainer" class="absolute inset-0 hidden">
        <img id="previewImage" src="#" alt="Logo Preview" class="h-full w-full object-cover rounded-lg">
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center rounded-lg">
            <button type="button" onclick="removePreview()" class="text-white bg-gray-700 bg-opacity-60 hover:bg-opacity-80 rounded-full p-2 focus:outline-none transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</div>


<script>
    function showPreview(event) {
        const [file] = event.target.files;
        if (file) {
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');
            const defaultContent = document.getElementById('defaultContent');

            previewImage.src = URL.createObjectURL(file);
            previewContainer.classList.remove('hidden');
            defaultContent.classList.add('hidden');
        }
    }

    function removePreview() {
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        const defaultContent = document.getElementById('defaultContent');

        // Clear the file input and reset preview
        document.getElementById('logo').value = "";
        previewImage.src = "#";
        previewContainer.classList.add('hidden');
        defaultContent.classList.remove('hidden');
    }
</script>
