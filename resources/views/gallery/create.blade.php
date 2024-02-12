@extends('layouts.bootstrap5')

@section('content')
    <style>
        .dropzone {
            border: 2px dashed #a9d1f4;
            border-radius: 8px;
            min-height: 150px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            position: relative;
            max-width: 100%;
            /* Set the maximum width for the dropzone */
        }

        .dz-message {
            margin: 15px 0;
        }

        .image-preview {
            position: relative;
            display: inline-block;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
            /* Set the width of each image preview */
            box-sizing: border-box;
        }

        .image-preview img {
            max-width: 100%;
            height: auto;
            display: block;
            border: 0;
            border-radius: 0;
        }

        .image-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #007bff;
        }

        .remove-button {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            background: #ff0000;
            border: none;
            width: 25px;
            /* Set a fixed width for the button */
            height: 25px;
            /* Set a fixed height for the button */
            border-radius: 50%;
            outline: none;
            font-size: 14px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <div class="container mt-5 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Gallery Image Uploader</h5>
                <form action="{{ url('gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="dropzone" id="custom-dropzone">
                        <div class="dz-message">
                            <i class="fa-solid fa-upload fa-3x text-info mb-2"></i>
                            <h3 class="text-info">Drag and drop your images here or click to select files</h3>
                        </div>
                        <input type="file" id="file-input" name="image_path[]" multiple style="display:none;">
                        <div id="image-previews"></div>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let dropzone = document.getElementById('custom-dropzone');
            let fileInput = document.getElementById('file-input');
            let imagePreviews = document.getElementById('image-previews');
            let dzMessage = document.querySelector('.dz-message');

            dropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropzone.classList.add('bg-info');
            });

            dropzone.addEventListener('dragleave', function() {
                dropzone.classList.remove('bg-info');
            });

            dropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropzone.classList.remove('bg-info');

                let files = e.dataTransfer.files;
                handleFileUpload(files);
                hideDzMessage();
            });

            dropzone.addEventListener('click', function() {
                fileInput.click();
            });

            fileInput.addEventListener('change', function() {
                let files = fileInput.files;
                handleFileUpload(files);
                hideDzMessage();
            });

            function hideDzMessage() {
                dzMessage.style.display = 'none';
            }

            function handleFileUpload(files) {
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        // Create image preview
                        let preview = document.createElement('div');
                        preview.className = 'image-preview';

                        // Create remove button
                        let removeButton = document.createElement('button');
                        removeButton.className = 'remove-button';
                        removeButton.innerHTML = 'X';
                        removeButton.onclick = function(event) {
                            removeImage(event, preview);
                        };

                        // Create image tag
                        let image = document.createElement('img');
                        image.src = e.target.result;
                        image.alt = 'Image';

                        // Create file size tag
                        let fileSizeTag = document.createElement('div');
                        fileSizeTag.className = 'file-size';
                        fileSizeTag.textContent = formatBytes(file.size);

                        // Create tags container
                        let tagsContainer = document.createElement('div');
                        tagsContainer.className = 'tags-container';

                        // Create progress bar
                        let progressBar = document.createElement('div');
                        progressBar.className = 'image-progress';

                        // Append elements to the preview div
                        preview.appendChild(removeButton);
                        preview.appendChild(image);
                        preview.appendChild(fileSizeTag);
                        preview.appendChild(tagsContainer);
                        preview.appendChild(progressBar);

                        // Append the preview div to the image previews container
                        imagePreviews.appendChild(preview);

                        // Perform file upload (you can use AJAX to send the file to the server)
                        // Update the progress bar during the upload process
                        // For simplicity, we'll simulate a delay with setTimeout
                        simulateUpload(file, progressBar);
                        updateTagsContainer(tagsContainer);
                    };

                    reader.readAsDataURL(file);
                }
            }

            function updateTagsContainer(tagsContainer) {
                // Get the tags from Bootstrap Tags Input
                let tagsValue = tagsInput.tagsinput('items');

                // Create tag elements and append to the container
                tagsValue.forEach(tag => {
                    let tagElement = document.createElement('span');
                    tagElement.className = 'badge bg-primary me-1';
                    tagElement.textContent = tag;
                    tagsContainer.appendChild(tagElement);
                });
            }


            function handleTagInput(event, inputTag) {
                // Check if the pressed key is the space key
                // if (event.key === ' ' || event.key === 'Spacebar') {
                //     // Prevent the default space key behavior (e.g., adding a space to the input)
                //     event.preventDefault();

                //     // Get the current input value
                //     let inputValue = inputTag.value.trim();

                //     // Check if the input value is not empty
                //     if (inputValue !== '') {
                //         // Create a new tag element
                //         let tagElement = document.createElement('span');
                //         tagElement.className = 'badge bg-primary me-1';
                //         tagElement.textContent = inputValue;

                //         // Append the tag element to the container (e.g., under the input)
                //         inputTag.insertAdjacentElement('beforebegin', tagElement);

                //         // Clear the input value
                //         inputTag.value = '';

                //         // Adjust the margin-top to move tags up
                //         tagElement.style.marginTop = '-20px';

                //         updateHiddenTagsInput();
                //     }
                // }
            }

            function updateHiddenTagsInput() {
                let tagElements = document.querySelectorAll('.badge.bg-primary');
                let tagsValue = Array.from(tagElements).map(tag => tag.textContent).join(',');
                tagsInput.value = tagsValue;
            }

            // Function to format file size in bytes
            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }

            function removeImage(event, imagePreview) {
                imagePreview.parentElement.removeChild(imagePreview);
                // Stop the click event propagation to prevent triggering the input file
                event.stopPropagation();
            }

            function simulateUpload(file, progressBar) {
                let progress = 0;
                let interval = setInterval(function() {
                    progress += 10;
                    progressBar.style.width = progress + '%';

                    if (progress >= 100) {
                        clearInterval(interval);
                        progressBar.style.width = '100%';
                        // Optional: Hide or remove the progress bar after the upload is complete
                        setTimeout(function() {
                            progressBar.parentElement.removeChild(progressBar);
                        }, 1000);
                    }
                }, 500);
            }

        });
    </script>
@endsection
