export const Toaster = {
    install (Vue) {
        this.event = new Vue();
        Vue.prototype.$toaster = {
            show(toaster, params = {}) {
                Toaster.events.$emit('show', toaster, params)
            },
            $event: this.event
        }
    }


}
