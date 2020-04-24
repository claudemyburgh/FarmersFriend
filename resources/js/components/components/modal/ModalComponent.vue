<template>
    <transition name="bounce">
        <div v-if="visible"  class="modal__overlay">
            <div class="modal">
                <div class="modal__close" @click.prevent="visible = !visible" ></div>
                <div class="modal__header">
                    <slot name="header"/>
                </div>
                <div class="modal__body">
                    <slot name="body" :params="params" />
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        name: "ModalComponent",
        data() {
            return {
                visible: false,
                params: {}
            }
        },
        props: {
            name: {
                required: true,
                type: String
            },
            timer: {
                require: false,
                type: Number
            }
        },
        methods: {
            autoCloseWindow () {
                setTimeout( () => {
                    this.setHidden()
                }, this.timer )
            },
            setVisible() {
                this.visible = true
            },
            setHidden() {
                this.visible = false
            }

        },
        beforeMount() {
            this.$modal.$event.$on('show', (modal, params) =>{

                // if (!this.$listeners['is-visible']) {
                //     this.setVisible()
                // }

                if (this.name !== modal) return
                    this.params = params

                if (this.timer) {
                    this.autoCloseWindow()
                }

                if (!this.$listeners['before-open']) {
                    this.setVisible()
                    return
                }

                this.$emit('before-open', () => {
                    this.setVisible()
                })

            })
        },
        mounted() {
            document.addEventListener('keydown', (e) => {
                if(this.visible &&  e.keyCode === 27 ) {
                    this.visible = false
                }
            })
        }
    }
</script>

