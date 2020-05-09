<template>
    <div class="panel shadow--2">
        <div class="panel__body">
            <div ref="dropzone" class="dropzone"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DropZone",
        props: ['object', 'upload', 'delete', 'remove'],
        data() {
            return {
                datalist: null
            }
        },
        methods: {
            dropzone() {
                var dropzone = new Dropzone(".dropzone", {
                    url: `${this.upload}`,
                    headers: {
                        'x-csrf-token': window.token.content,
                    },
                    createImageThumbnails: true,
                    addRemoveLinks: true,
                    acceptedFiles: 'image/jpeg,image/jpg,image/png,image/webp',
                    maxFiles: 12,
                })

                dropzone.on('success', function(photo, response) {
                    photo.id = response.id

                })

                if (this.object.length) {
                    this.object.forEach(function(element, index) {
                        var mock = {id: element.id, name: element.name, size: element.size, order_column: element.order_column};
                        dropzone.emit('addedfile', mock);
                        var file = element.file_name
                        // dropzone.emit('thumbnail', mock, `${appurl}/storage/${element.id}/conversions/${file.replace(/(\.[\w\d_-]+)$/i, '-thumb$1')}`);
                        dropzone.emit('thumbnail', mock, `/storage/${element.id}/conversions/${file.replace(/(\.[\w\d_-]+)/, '-thumb.jpg')}`);
                    })
                }

                dropzone.on('removedfile', (photo) => {
                    return axios.delete(`${this.remove}/${photo.id}`).catch(function (error) {
                        dropzone.emit('addedfile', {
                            id: photo.id,
                            name: photo.name,
                            size: photo.size
                        })
                    })
                })

                dropzone.on('error', function(file) {
                    dropzone.removefile(file);
                });
            }
        },
        mounted() {
            this.dropzone()
        }

    }
</script>

