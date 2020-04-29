<template>
    <a class="reverse" :href="`mailto:${emailHash}`">{{ emailHash }}</a>
</template>

<script>
    export default {
        name: "HideEmail",
        props: {
            to: {
                require: true,
                type: String
            }
        },
        computed: {
            emailHash () {
                return this.to.split('').reverse().join("")
            }
        }
    }
</script>

<style scoped>
    a.reverse {
        unicode-bidi: bidi-override;
        direction: rtl;
    }
</style>
