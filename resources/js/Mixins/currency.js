

export default {
    filters: {
        currency(data) {
            return parseInt(data).toFixed(2)
        }
    }
}
