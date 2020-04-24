export const Modal = {
    install (Vue) {
        this.event = new Vue()
        Vue.prototype.$modal = {
            show (modal, params = {}) {
                Modal.event.$emit('show', modal, params)
            },
            $event: this.event
        }
    }
}
