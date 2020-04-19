<template>
    <div class="form__wrap">
        <textarea :name="name" :id="name" cols="30" rows="6" class="form__item resize_textarea" @input="$emit('input', $event.target.value); resize($event)" :value="value"></textarea>
    </div>
</template>

<script>
    export default {
        name: "ResizeTextarea",
        props: {
            name: {
                required: true,
                type: String
            },
            value: {
                required: false,
            }
        },
        methods: {
            resize (e) {
                e.target.style.height = 'auto'
                e.target.style.height = `${e.target.scrollHeight}px`
            }
        }
    }
</script>

