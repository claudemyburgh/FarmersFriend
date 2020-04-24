<template>
	<div class="toaster__footer">
        <div class="wrapper">
            <div v-if="visible"  class="row  flex justify--center mb-5">
                <div class="md-col-6">
                    <div class="toaster flex justify--between">
                        <div class="toaster__close"  @click.prevent="visible = !visible" >&times;</div>
                        <slot name="message" :params="params"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Toaster",
        data() {
            return {
                visible: false,
                params: {}
            }
        },
        beforeMount() {
            this.$toaster.$events.$on('show', (model, params) => {
                if (this.message !== modal) return
                this.params = params
            })
        },
        methods: {
            setVisible() {
                this.visible = true
            },
            setHidden() {
                this.visible = false
            }
        },
        mounted() {
            document.addEventListener('keydown', (e) => {
                if(this.visible &&  e.keyCode === 27 ) {
                    this.setHidden()
                }
            })
        }
    }
</script>

